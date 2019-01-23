<?php

declare(strict_types=1);

namespace App\DependencyInjection\CompilerPass;

use App\Menu\Menu;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MenuPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $ids = $container->findTaggedServiceIds('menu.link');

        $menuDefinition = $container->findDefinition(Menu::class);
        dd($ids);
        foreach ($ids as $id => $tags) {

            $menuDefinition->addMethodCall('addLink', [new Reference($id)]);
        }
    }
}
