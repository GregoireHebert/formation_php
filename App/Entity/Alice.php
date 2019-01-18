<?php

declare(strict_types=1);

namespace App\Entity;

use App\Models\Person;

class Alice extends Person
{
    public function move(): string
    {
        $this->addStep();
        return 'Walk on her boots';
    }
}
