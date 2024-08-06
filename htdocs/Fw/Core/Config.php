<?php
namespace Fw\Core;

class Config
{
    private array $configs = [];

    public function __construct()
    {
        $this->configs = include_once('./Fw/config.php');
    }

    public static function getObj() : self
    {
        return new self;
    }

    public function get(string $path)
    {
        $config = explode('/', $path);
        $param = $this->configs;
        for ($i = 0; $i < count($config); $i++) {
            $param = $param[$config[$i]];
        }
        return $param;
    }
}