<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function add(Request $request, EntityManagerInterface $manager)
    {
        $product = new Product();
        $product->id = $request->get('id');
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $error = new JsonResponse('Error');

        if ($product->id == null) {
            return $error;
        }

        if ($product->name == '') {
            return $error;
        }

        if ($product->price == null) {
            return $error;
        }

        $manager->persist($product);
        $manager->flush();

        return new JsonResponse('OK:'.$product->id);
    }
}