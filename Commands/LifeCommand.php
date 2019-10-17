<?php

declare(strict_types=1);

namespace App\Commands;

use App\Entity\Mouton;

class LifeCommand
{
    private $mouton;
    private $action;

    public function __construct(Mouton $mouton, string $action)
    {
        $this->mouton = $mouton;
        $this->action = $action;
    }

    /**
     * @return Mouton
     */
    public function getMouton(): Mouton
    {
        return $this->mouton;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
