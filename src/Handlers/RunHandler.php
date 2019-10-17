<?php

declare(strict_types=1);

namespace App\Handlers;

use App\Commands\LifeCommand;

class RunHandler implements HandlerInterface
{
    public const ACTION = 'run';
    public $priority = 0;

    /**
     * @param LifeCommand $command
     */
    public function handle($command): void
    {
        $mouton = $command->getMouton();
        $mouton->setHunger($mouton->getHunger() + 2);
        $mouton->setSleepiness($mouton->getSleepiness() + 2);
        $mouton->setPlayfulness($mouton->getPlayfulness() - 5);
    }

    public function support($command): bool
    {
        return $command instanceof LifeCommand && self::ACTION === $command->getAction();
    }
}
