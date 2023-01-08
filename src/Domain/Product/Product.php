<?php

namespace App\Domain\Product;

use Symfony\Component\Uid\Uuid;

class Product
{
    private string $id;

    private string $name;

    private string $ingredients;

    private float $price;

    public  function __construct(
        string $id,
        string $name,
        float $price,
        string $ingredients,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->ingredients = $ingredients;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
