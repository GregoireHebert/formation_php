<?php

declare(strict_types=1);

namespace App\EventSubscribers;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class CreatedByEvent
{
    public function prePersist(LifecycleEventArgs $eventArgs): void
    {
        $product = $eventArgs->getObject();
        if (!$product instanceof Product) {
            return;
        }

        $manager = $eventArgs->getEntityManager();
        $repository = $manager->getRepository(User::class);
        $user = $repository->findOneBy(['username' => 'greg']);

        $product->createdBy = $user;
    }
}
