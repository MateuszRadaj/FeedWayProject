<?php

namespace App\UserInterface\Controller;

use App\Application\Product\Command\AddProductCommand;
use App\Application\Product\Command\RemoveProductCommand;
use App\Application\Product\Query\FindProductByIdQuery;
use App\Application\Product\Query\FindProductsQuery;
use App\Infrastructure\MessageBus\Command\CommandBus;
use App\Infrastructure\MessageBus\Query\QueryBus;
use App\UserInterface\Builder\Product\AddProductInputBuilder;
use App\UserInterface\Director\Product\AddProductInputDirector;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{   
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
        private ValidatorInterface $validator,
    ) {
    }

    #[Route(
        path: '/menu',
        name: 'all_products',
        methods: ['GET']
    )]
    public function listProducts(Request $request): Response
    {   
        $limit = $request->query->get('limit');
        
        $products = $this->queryBus->handle(new FindProductsQuery(is_int($limit) && $limit >= 0 ? $limit : 0));

        return $this->render('page/menupage.html.twig', [
            'products' => $products
        ]);
    }

    #[Route(
        path: '/product', 
        name: 'add_product',
        methods: ['POST']    
    )]
    public function addProduct(Request $request): Response
    {   
        $director = new AddProductInputDirector(
            new AddProductInputBuilder($this->get('serializer')),
            $this->validator
        );

        $productInput = $director->buildAndValidate($request->getContent());

        $this->commandBus->handle(new AddProductCommand($productInput));

        return $this->render('app_panel', [
            'success' => 'true'
        ]);
    }
}
