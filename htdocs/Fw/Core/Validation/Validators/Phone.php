<?php

namespace Fw\Core\Validation\Validators;

class Phone extends RegExp
{
    function __construct()
    {
        $this->rule = '(^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$)';
    }

}
