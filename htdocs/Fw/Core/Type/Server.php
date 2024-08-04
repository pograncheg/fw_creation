<?php
namespace Fw\Core\Type;

class Server extends Dictionary
{
    public static function getObj() : self
    {
        return new self($_SERVER, true);
    }
}