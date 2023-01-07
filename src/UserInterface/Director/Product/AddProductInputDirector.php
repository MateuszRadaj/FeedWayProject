<?php

namespace App\UserInterface\Director\Product;

use App\UserInterface\Builder\Product\AddProductInputBuilderInterface;
use App\UserInterface\Dto\Product\AddProductInputDto;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddProductInputDirector
{
    private ConstraintViolationListInterface $errors;

    public function __construct(
        private readonly AddProductInputBuilderInterface $builder,
        private ValidatorInterface $validator
    ) {
    }

    public function buildAndValidate(string $payload): AddProductInputDto
    {
        $this->builder->buildProduct($payload);

        $product = $this->builder->getProduct();

        $this->errors = $this->validator->validate($product);

        return $product;
    }

    public function getErrors(): ConstraintViolationListInterface
    {
        return $this->errors;
    }
}