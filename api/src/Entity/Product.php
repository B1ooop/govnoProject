<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ApiResource(mercure: true)]
#[ORM\Entity]
class Product
{

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;


    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';


    #[ORM\Column]
    #[Assert\NotBlank]
    public string $description = '';

    #[ORM\Column]
    #[Assert\NotBlank]
    public string $img = '';


    #[ORM\Column(type: 'float')]
    public ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     * @return Product
     */
    public function setImg(string $img): Product
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Product
     */
    public function setPrice(?float $price): Product
    {
        $this->price = $price;
        return $this;
    }

}
