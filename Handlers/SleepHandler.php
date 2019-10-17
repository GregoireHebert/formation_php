<?php

declare(strict_types=1);

namespace App\Handlers;

use App\Commands\LifeCommand;

class SleepHandler implements HandlerInterface
{
    public const ACTION = 'sleep';

    public $priority = 0;

    /**
     * @param LifeCommand $command
     */
    public function handle($command): void
    {
        $mouton = $command->getMouton();
        $mouton->setHunger($mouton->getHunger() + 4);
        $mouton->setSleepiness($mouton->getSleepiness() - 7);
    }

    public function support($command): bool
    {
        return ($command instanceof LifeCommand && $command->getAction() === self::ACTION);
    }
}
