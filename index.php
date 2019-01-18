<?php

declare(strict_types=1);

require_once 'bootstrap.php';

use App\Entity\Cat;

$cat = new Cat();
echo $cat->move();
