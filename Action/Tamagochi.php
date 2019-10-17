<?php

declare(strict_types=1);

namespace App\Action;

use App\Bus\Bus;
use App\Commands\LifeCommand;
use App\Entity\Mouton;
use App\Repository\Repository;

class Tamagochi
{
    private $bus;
    private $repository;

    public function __construct(Bus $bus, Repository $repository)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function playTurn(/*string $action*/): Mouton
    {
        if (func_num_args()) {
            @trigger_error('Depreacted usage of playTurn in version 3 don\'t use $action but inject Request instead.');
            $action = func_get_args(0);
        } else {
            $this->request->get('action');
        }

        $mouton = $this->getMouton();

        $command = new LifeCommand($mouton, $action);

        $this->bus->execute($command);

        if ($mouton->getLife() <= 0) {
            unset($_SESSION['id']);
        }

        return $mouton;
    }

    private function getMouton()
    {
        if (!isset($_SESSION['id'])) {
            $this->repository->insert($mouton = new Mouton());
            $_SESSION['id'] = $mouton->getId();

            return $mouton;
        }

        return $this->repository->findOne($_SESSION['id']);
    }
}
