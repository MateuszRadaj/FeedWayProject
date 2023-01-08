<?php

namespace App\UserInterface\Controller;

use App\Application\Order\Command\AddOrderCommand;
use App\Application\Order\Command\RemoveOrderCommand;
use App\Application\Order\Query\FindOrdersByUserQuery;
use App\Application\Order\Query\FindOrdersQuery;
use App\Infrastructure\MessageBus\Command\CommandBus;
use App\Infrastructure\MessageBus\Query\QueryBus;
use App\UserInterface\Builder\Order\AddOrderInputBuilder;
use App\UserInterface\Director\Order\AddOrderInputDirector;
use App\UserInterface\Dto\Order\AddOrderInputDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class OrderController extends AbstractController
{
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
        private ValidatorInterface $validator,
    ) {
    }

    #[Route(
        path: '/orders',
        name: 'all_orders',
        methods: ['GET']
    )]
    public function listOrders(Request $request): Response
    {   
        $limit = $request->query->get('limit');
        
        $products = $this->queryBus->handle(new FindOrdersQuery(is_int($limit) && $limit >= 0 ? $limit : 0));

        return $this->render('profile/index.html.twig', [
            'orders' => $orders
        ]);
    }
}
