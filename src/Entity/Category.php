<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @var string
     * @ORM\Column(unique=true)
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    public $name;
    /**
     * @var Product[]
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="categories")
     */
    public $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function addProduct(Product $product): void
    {
        if ($this->products->contains($product)) {
            return;
        }

        $this->products->add($product);
    }

    public function removeProduct(Product $product): void
    {
        if (!$this->products->contains($product)) {
            return;
        }

        $this->products->removeElement($product);
    }
}
