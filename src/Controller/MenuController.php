<?php

declare(strict_types=1);

namespace App\Controller;

use App\Menu\Menu;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="menu", path="/menus")
 */
class MenuController
{
    public function __invoke(Menu $menu)
    {
        return new JsonResponse($menu->getLinks());
    }
}
