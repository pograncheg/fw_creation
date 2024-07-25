<?php

Define('CORE', true);

spl_autoload_register(function ($class) {

    $prefix = 'Fw\\Core\\';

    $base_dir = __DIR__ . '/Core/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

session_start();

$app = Fw\Core\InstanceContainer::getInstance('Fw\Core\Application');