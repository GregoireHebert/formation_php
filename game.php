<?php

namespace App;

use App\Action\Tamagochi;
use App\Bus\LifeBus;
use App\Handlers\CircleOfLifeHandler;
use App\Handlers\DatabaseHandler;
use App\Handlers\DoctorHandler;
use App\Handlers\EatHandler;
use App\Handlers\RunHandler;
use App\Handlers\SleepHandler;
use App\Repository\MoutonRepository;

session_start();

$action = $_POST['action'] ?? '';

$repository = new MoutonRepository();

$bus = new LifeBus();
$bus->setHandlers([
    new CircleOfLifeHandler(),
    new DatabaseHandler($repository),
    new DoctorHandler(),
    new EatHandler(),
    new RunHandler(),
    new SleepHandler()
]);

$controller = new Tamagochi($bus, $repository);

$mouton = $controller->playTurn($action);
