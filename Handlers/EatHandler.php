<?php

declare(strict_types=1);

namespace App\Handlers;

use App\Commands\LifeCommand;

class EatHandler implements HandlerInterface
{
    public const ACTION = 'eat';
    public $priority = 0;

    /**
     * @param LifeCommand $command
     */
    public function handle($command): void
    {
        $mouton = $command->getMouton();
        $mouton->setHunger($mouton->getHunger() - 5);
        $mouton->setSleepiness($mouton->getSleepiness() + 1);
    }

    public function support($command): bool
    {
        return $command instanceof LifeCommand && self::ACTION === $command->getAction();
    }
}
