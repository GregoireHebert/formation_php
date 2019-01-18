<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Steps;

abstract class Animal extends AbstractBeing
{
    use Steps;
}
