<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="putProduct", path="/products/{id}", methods={"PUT"})
 */
class PutProduct
{
    public function __invoke(Product $product, RegistryInterface $registry)
    {
        $manager = $registry->getEntityManagerForClass(Product::class);

        $product->price += 1.0;
        $manager->flush();

        return new Response();
    }
}
