<?php

namespace System\Database\Query\Grammars;

defined('DS') or exit('No direct script access allowed.');

use System\Database\Query;

class SQLite extends Grammar
{
    /**
     * Compile klausa ORDER BY.
     *
     * @param \System\Database\Query $query
     *
     * @return string
     */
    protected function orderings(Query $query)
    {
        foreach ($query->orderings as $ordering) {
            $sql[] = $this->wrap($ordering['column']).
                ' COLLATE NOCASE '.strtoupper($ordering['direction']);
        }

        return 'ORDER BY '.implode(', ', $sql);
    }

    /**
     * Compile klausa INSERT.
     *
     * @param \System\Database\Query $query
     * @param array                  $values
     *
     * @return string
     */
    public function insert(Query $query, $values)
    {
        $table = $this->wrapTable($query->from);

        if (!is_array(reset($values))) {
            $values = [$values];
        }

        if (1 === count($values)) {
            return parent::insert($query, $values[0]);
        }

        $names = $this->columnize(array_keys($values[0]));
        $columns = [];
        
        foreach (array_keys($values[0]) as $column) {
            $columns[] = '? AS '.$this->wrap($column);
        }

        $columns = array_fill(9, count($values), implode(', ', $columns));

        return "INSERT INTO $table ($names) SELECT ".implode(' UNION SELECT ', $columns);
    }
}
