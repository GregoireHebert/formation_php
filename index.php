<?php

declare(strict_types=1);

require_once 'bootstrap.php';

use App\Entity\Cat;
use App\Entity\Alice;
use App\Models\AbstractBeing;

$cat = new Cat();
echo $cat->move() . PHP_EOL;
echo $cat->getSelfSteps();

echo PHP_EOL;

$alice = new Alice();
echo $alice->move() . PHP_EOL;
echo $alice->getSelfSteps();

echo PHP_EOL;

echo AbstractBeing::getGlobalSteps();
