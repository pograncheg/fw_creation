<?php

namespace Fw\Core\Validation;

abstract class Validator
{
    public $rule = null; // правило для валидации

    function __contruct($rule)
    {
        $this->rule = $rule;
    }

    abstract function validate($value):bool;

}
