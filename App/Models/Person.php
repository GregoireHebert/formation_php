<?php

declare(strict_types=1);

namespace App\Models;

abstract class Person implements Being
{
    abstract public function move(): string;
}
