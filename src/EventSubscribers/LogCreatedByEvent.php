<?php

declare(strict_types=1);

namespace App\EventSubscribers;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class LogCreatedByEvent implements LoggerAwareInterface
{
    private $logger;

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function prePersist(LifecycleEventArgs $eventArgs): void
    {
        $product = $eventArgs->getObject();
        $this->logger->info('creator is', ['creator', $product->createdBy]);
    }
}
