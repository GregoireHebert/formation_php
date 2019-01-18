<?php

declare(strict_types=1);

namespace App\Models;

interface Being
{
    public function move(): string;
    public static function getGlobalSteps(): int;
    public function getSelfSteps(): int;
}
