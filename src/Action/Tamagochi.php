<?php

declare(strict_types=1);

namespace App\Action;

use App\Bus\Bus;
use App\Commands\LifeCommand;
use App\Entity\Mouton;
use App\Repository\Repository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class Tamagochi
{
    private $bus;
    private $repository;
    private $twig;

    public function __construct(Bus $bus, Repository $repository, Environment $twig)
    {
        $this->repository = $repository;
        $this->bus = $bus;
        $this->twig = $twig;
    }

    public function playTurn(Request $request): Response
    {
        $action = $request->request->get('action', '');
        $mouton = $this->getMouton();

        $command = new LifeCommand($mouton, $action);

        $this->bus->execute($command);

        if ($mouton->getLife() <= 0) {
            unset($_SESSION['id']);
        }

        return new Response($this->twig->render('index.html', [
            'mouton' => $mouton,
        ]));
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