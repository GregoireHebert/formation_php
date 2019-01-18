<?php

declare(strict_types=1);

namespace App\Entity;

use App\Models\Person;

class Alice extends Person
{
    public function move(): string
    {
        return 'Walk on her boots';
    }
}
