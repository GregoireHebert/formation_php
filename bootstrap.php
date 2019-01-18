<?php

declare(strict_types=1);

function my_autoloader($class) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

