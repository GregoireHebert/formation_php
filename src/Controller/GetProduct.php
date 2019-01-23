<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="getProduct", path="/products/{id}", methods={"GET"})
 */
class GetProduct
{
    public function __invoke(Request $request, RegistryInterface $registry)
    {
        $productId = $request->attributes->get('id');
        dump($productId);

        $manager = $registry->getEntityManagerForClass(Product::class);
        $repository = $manager->getRepository(Product::class);
        $product = $repository->find($productId);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException();
        }

        return new JsonResponse($product);
    }
}
