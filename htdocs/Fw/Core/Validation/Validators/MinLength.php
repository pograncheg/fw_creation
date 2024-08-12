<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class MinLength extends Validator
{
    public function validate($value):bool
    {
        return mb_strlen($value) >= $this->rule;
    }
}
