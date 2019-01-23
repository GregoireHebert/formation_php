<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductManager
{
    private $registry;
    private $validator;

    public function __construct(RegistryInterface $registry, ValidatorInterface $validator)
    {
        $this->registry = $registry;
        $this->validator = $validator;
    }

    public function create(Product $product)
    {
        $manager = $this->registry->getEntityManager();
        $categoryRepository = $manager->getRepository(Category::class);
        $category = $categoryRepository->findOneBy(['name' => 'Masques']);

        if (!$category instanceof Category) {
            $category = new Category();
            $category->name = 'Masques';
        }

        $product->addCategory($category);

        $violations = $this->validator->validate($product);

        if (0 !== $violations->count()) {
            throw new \RuntimeException('product is not valid');
        }

        $manager->persist($product);
        $manager->flush();
    }
}
