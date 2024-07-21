<?php
namespace Fw\Core;

class Config
{
    private array $configs = [];

    public function __construct()
    {
        $this->configs = include_once('./Fw/config.php');
    }

    public function get(string $path) 
    {
        $config = explode('/', $path);
        $configName = $config[0];
        $param = $config[1];
        return $this->configs[$configName][$param];
    }
}