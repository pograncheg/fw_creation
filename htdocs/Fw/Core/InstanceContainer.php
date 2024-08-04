<?php

namespace Fw\Core;

class InstanceContainer
{
    private static array $instances = [];

    public static function getInstance(string $className) : object
    {
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = $className::getObj();
        }
        return self::$instances[$className];
    }
}