<?php

declare(strict_types=1);

namespace App\Menu;

interface LinkInterface
{
    public function getPath(): string;
    public function getLabel(): string;
    public function getTarget(): string;
}
