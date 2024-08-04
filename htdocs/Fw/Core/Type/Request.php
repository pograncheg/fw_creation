<?php
namespace Fw\Core\Type;

class Request extends Dictionary
{

    public static function getObj() : self
    {
        return new self($_REQUEST, true);
    }

}