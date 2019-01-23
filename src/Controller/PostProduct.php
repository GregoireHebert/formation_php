<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Manager\ProductManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="Product", path="/products", methods={"POST"})
 */
class PostProduct
{
    public function __invoke(ProductManager $productManager)
    {
        $product = new Product();
        $product->name = 'easybreath';
        $product->description = 'ce produit est trop cool';
        $product->price = 19.99;

        $productManager->create($product);

        return new Response('');
    }
}
