<?php

namespace App\Domain\Product;

use Symfony\Component\Uid\Uuid;

class Product
{
    private Uuid $id;

    private string $name;

    private string $ingredients;

    public  function __construct(
        Uuid $id,
        string $name,
        string $ingredients,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
    }

    public function getId(): Uuid
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
}
