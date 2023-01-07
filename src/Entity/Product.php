<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: "products")]
class Product
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\CustomIdGenerator()]
    public $id;

    #[ORM\Column(type: "string", length: 150)]
    public $name;

    #[ORM\Column(type: "string", length: 255)]
    public $ingredients;
}
