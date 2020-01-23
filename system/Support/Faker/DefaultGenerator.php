<?php

namespace System\Support\Faker;

defined('DS') or exit('No direct script access allowed.');

class DefaultGenerator
{
    protected $default;

    
    public function __construct($default = null)
    {
        $this->default = $default;
    }


    public function __get($attribute)
    {
        return $this->default;
    }


    public function __call($method, $attributes)
    {
        return $this->default;
    }
}
