<?php

namespace App\Domain\OrderItem;

use App\Domain\Product\Product;
use App\Domain\OrderItem\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

class OrderItem
{
    private $id;

    private Product $product;

    private int $quantity;

    private Order $order;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotal(): float
    {
        return $this->getProduct()->getPrice() * $this->getQuantity();
    }
}
