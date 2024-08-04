<?php
namespace Fw\Core\Type;

class Session extends Dictionary
{
    public static function getObj() : self
    {
        return new self($_SESSION, false);
    }
}