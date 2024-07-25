<?php

namespace Fw\Core;

class InstanceContainer
{
    private static array $instances = [];

    public static function getInstance(string $className) : object
    {
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = $className::get();
        }
        return self::$instances[$className];
    }
}