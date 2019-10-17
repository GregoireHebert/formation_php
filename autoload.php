<?php

declare(strict_types=1);

spl_autoload_register(function ($name): void {
    $name = explode('\\', $name);

    unset($name[0]);

    $name = implode('/', $name);

    include $name.'.php';
});
