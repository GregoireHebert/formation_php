<?php

declare(strict_types=1);

namespace App\Course\Menu;

use App\Menu\LinkInterface;

class Baskets implements LinkInterface
{
    public function getPath(): string
    {
        return '/course/basket';
    }

    public function getLabel(): string
    {
        return 'Tapis Hydrofuge';
    }

    public function getTarget(): string
    {
        return '_blank';
    }
}
