<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findEasyBreath($id): ?Product
    {
        $queryBuilder = $this->createQueryBuilder('p');

        return $queryBuilder
            ->select('p')
            ->where($queryBuilder->expr()->eq('p.id', ':id'))
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
