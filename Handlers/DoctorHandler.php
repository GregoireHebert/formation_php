<?php

declare(strict_types=1);

namespace App\Handlers;

use App\Commands\LifeCommand;
use App\Entity\Mouton;

class DoctorHandler implements HandlerInterface
{
    public const ACTION = 'doctor';
    public $priority = 0;
    /**
     * @param LifeCommand $command
     */
    public function handle($command): void
    {
        $mouton = $command->getMouton();
        $mouton->setLife($mouton->getLife() + 2);
    }

    public function support($command): bool
    {
        return ($command instanceof LifeCommand && $command->getAction() === self::ACTION);
    }
}
