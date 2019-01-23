<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="removeProduct", path="/products/{id}", methods={"DELETE"})
 */
class RemoveProduct
{
    public function __invoke(Product $product, RegistryInterface $registry)
    {
        $manager = $registry->getEntityManagerForClass(Product::class);
        $manager->remove($product);
        $manager->flush();

        return new Response();
    }
}
