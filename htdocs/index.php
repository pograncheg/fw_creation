<?php

require_once './Fw/init.php';

$url = $_SERVER['REQUEST_URI'];
echo $url . '<br>';

preg_match('#^/news/#', $url, $matches);
print_r($matches);

// $a = new Fw\Core\Config;
// $b = Fw\Core\Application::getInstance();
// $c = Fw\Core\Application::getInstance();
// $route = new \Fw\Core\Route;
// $path = include_once('./Fw/config.php');
// print_r($path);
// $route->doRoute($url);

// echo ($a->get('db/login'));
// include_once ('./handlers/test1.php');
// print_r($config);
// echo __DIR__;

