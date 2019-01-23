<?php

declare(strict_types=1);

namespace App\Menu;

use Doctrine\Common\Collections\ArrayCollection;

class Menu
{
    private $links;

    public function __construct()
    {
        $this->links = new ArrayCollection();
    }

    public function addLink(LinkInterface $link): void
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
        }
    }

    public function getLinks(): ArrayCollection
    {
        return $this->links;
    }
}
