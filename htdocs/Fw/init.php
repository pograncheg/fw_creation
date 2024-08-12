<?php

Define('CORE', true);
use \Fw\Core\InstanceContainer;
use \Fw\Core\Application;
// spl_autoload_register(function ($class) {

//     $prefix = 'Fw\\Core\\';

//     $base_dir = __DIR__ . '/Core/';

//     $len = strlen($prefix);
//     if (strncmp($prefix, $class, $len) !== 0) {
//         return;
//     }
    
//     $relative_class = substr($class, $len);
//     echo $relative_class . '<br>';
//     $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

//     if (file_exists($file)) {
//         require $file;
//     }
// });
// require 'Fw/Core/InstanceContainer.php';
// require 'Fw/Core/Application.php';
// echo __DIR__;

spl_autoload_register(function ($class) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

session_start();

$app = InstanceContainer::getInstance(Application::class);