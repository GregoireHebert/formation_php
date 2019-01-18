<?php

declare(strict_types=1);

namespace App\Traits;

trait Steps
{
    public static $selfSteps = 0;

    protected function addStep(): void
    {
        parent::addStep();
        self::$selfSteps++;
    }

    public function getSelfSteps(): int
    {
        return $this::$selfSteps ;
    }
}
