<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Steps;

abstract class Person extends AbstractBeing
{
    use Steps;
}
