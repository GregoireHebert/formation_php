<?php

declare(strict_types=1);

require_once 'bootstrap.php';

use App\Entity\Cat;
use App\Entity\Alice;

$cat = new Cat();
echo $cat->move();

echo PHP_EOL;

$alice = new Alice();
echo $alice->move();
