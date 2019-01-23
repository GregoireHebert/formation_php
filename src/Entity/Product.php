<?php

declare(strict_types=1);

namespace App\Entity;

use App\Constraints\StartWithEasy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ProductRepository;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min="10")
     * @StartWithEasy
     * @ORM\Column(type="string", length=255)
     */
    public $name;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(type="text")
     */
    public $description;
    /**
     * @var float
     * @Assert\GreaterThan(0);
     * @Assert\Type(type="float")
     * @ORM\Column(type="decimal")
     */
    public $price;
    /**
     * @var Category[]
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products", cascade={"persist"})
     */
    public $categories;
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    public $createdBy;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function addCategory(Category $category): void
    {
        if ($this->categories->contains($category)) {
            return;
        }

        $category->addProduct($this);
        $this->categories->add($category);
    }

    public function removeCategory(Category $category): void
    {
        if (!$this->categories->contains($category)) {
            return;
        }

        $category->removeProduct($this);
        $this->categories->removeElement($category);
    }
}
