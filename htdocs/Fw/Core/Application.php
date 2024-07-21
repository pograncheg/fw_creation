<?php
namespace Fw\Core;

final class Application
{
    private $pager = null;
    private static $instance = null;
    private $template = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            echo 'Класс еще не создан' . '<br>';
            self::$instance = new self;
        }
        return self::$instance;
    }

}