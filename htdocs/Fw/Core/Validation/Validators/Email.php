<?php

namespace Fw\Core\Validation\Validators;

class Email extends RegExp
{
    function __construct()
    {
        $this->rule = '([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)';
    }

}
