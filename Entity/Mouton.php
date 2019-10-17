<?php

declare(strict_types=1);

namespace App\Entity;

class Mouton
{
    private $id;
    private $life = 10;
    private $hunger = 0;
    private $sleepiness = 0;
    private $playfulness = 0;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return (int) $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife(int $life): void
    {
        $this->life = min(max($life, 0), 10);
    }

    /**
     * @return int
     */
    public function getHunger(): int
    {
        return (int) $this->hunger;
    }

    /**
     * @param int $hunger
     */
    public function setHunger(int $hunger): void
    {
        $this->hunger = min(max($hunger, 0), 10);
    }

    /**
     * @return int
     */
    public function getSleepiness(): int
    {
        return (int) $this->sleepiness;
    }

    /**
     * @param int $sleepiness
     */
    public function setSleepiness(int $sleepiness): void
    {
        $this->sleepiness = min(max($sleepiness, 0), 10);
    }

    /**
     * @return int
     */
    public function getPlayfulness(): int
    {
        return (int) $this->playfulness;
    }

    /**
     * @param int $playfulness
     */
    public function setPlayfulness(int $playfulness): void
    {
        $this->playfulness = min(max($playfulness, 0), 10);
    }


}
