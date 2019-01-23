<?php

declare(strict_types=1);

namespace App\AquaPoney\Menu;

use App\Menu\LinkInterface;

class TapisHydrofuge implements LinkInterface
{
    public function getPath(): string
    {
        return '/equitation/tapis?type=hydrofuge';
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
