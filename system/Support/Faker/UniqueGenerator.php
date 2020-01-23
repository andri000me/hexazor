<?php

namespace System\Support\Faker;

defined('DS') or exit('No direct script access allowed.');

use OverflowException;

class UniqueGenerator
{
    protected $generator;
    protected $maxRetries;
    protected $uniques = [];


    public function __construct(Generator $generator, $maxRetries = 10000)
    {
        $this->generator = $generator;
        $this->maxRetries = $maxRetries;
    }


    public function __get($attribute)
    {
        return $this->__call($attribute, []);
    }


    public function __call($name, $arguments)
    {
        if (!isset($this->uniques[$name])) {
            $this->uniques[$name] = [];
        }
        
        $retry = 0;
        
        do {
            $result = call_user_func_array([$this->generator, $name], $arguments);
            $retry++;
            
            if ($retry > $this->maxRetries) {
                throw new OverflowException(
                    "Maximum retries of {$this->maxRetries} reached without finding a unique value"
                );
            }
        } while (array_key_exists(serialize($result), $this->uniques[$name]));
        
        $this->uniques[$name][serialize($result)] = null;

        return $result;
    }
}
