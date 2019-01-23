<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route(name="Product", path="/products", methods={"POST"})
 */
class PostProduct
{
    public function __invoke(ValidatorInterface $validator, Request $request, RegistryInterface $registry)
    {
        $product = new Product();
        $product->name = 'easybreath';
        $product->description = 'ce produit est trop cool';
        $product->price = 19.99;

        $manager = $registry->getEntityManager();
        $categoryRepository = $manager->getRepository(Category::class);
        $category = $categoryRepository->findOneBy(['name' => 'Masques']);

        if (!$category instanceof Category) {
            $category = new Category();
            $category->name = 'Masques';
        }

        $product->addCategory($category);

        $violations = $validator->validate($product);

        if (0 !== $violations->count()) {
            throw new \RuntimeException('product is not valid');
        }

        $manager->persist($product);
        $manager->flush();

        return new Response('');
    }
}
