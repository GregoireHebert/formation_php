<?php

declare(strict_types=1);

namespace App\Models;

abstract class AbstractBeing implements Being
{
    protected static $globalSteps = 0;

    protected function addStep(): void
    {
        self::$globalSteps++;
    }

    abstract public function move(): string;

    public static function getGlobalSteps(): int
    {
        return self::$globalSteps;
    }
}
