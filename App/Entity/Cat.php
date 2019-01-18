<?php

declare(strict_types=1);

namespace App\Entity;

use App\Models\Animal;

class Cat extends Animal
{
    public function move(): string
    {
        return 'move on it\'s paws lightly';
    }
}
