<?php

declare(strict_types=1);

namespace App\Models;

abstract class Animal implements Being
{
    abstract public function move(): string;
}
