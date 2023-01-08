<?php

namespace App\UserInterface\Controller;

use App\Domain\Product\Product;
use App\Form\AddToCartType;
use App\Infrastructure\Manager\CartManager;
use App\Application\Product\Command\AddProductCommand;
use App\Application\Product\Command\RemoveProductCommand;
use App\Application\Product\Query\FindProductByIdQuery;
use App\Application\Product\Query\FindProductsQuery;
use App\Infrastructure\MessageBus\Command\CommandBus;
use App\Infrastructure\MessageBus\Query\QueryBus;
use App\UserInterface\Builder\Product\AddProductInputBuilder;
use App\UserInterface\Director\Product\AddProductInputDirector;
use App\UserInterface\Dto\Product\AddProductInputDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{   
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
        private ValidatorInterface $validator,
        private SerializerInterface $serializer
    ) {
    }

    #[Route(
        path: '/products',
        name: 'all_products',
        methods: ['GET']
    )]
    public function listProducts(Request $request): Response
    {   
        $limit = $request->query->get('limit');
        
        $products = $this->queryBus->handle(new FindProductsQuery(is_int($limit) && $limit >= 0 ? $limit : 0));

        return $this->render('home/homepage.html.twig', [
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
        $productInput = new AddProductInputDto();
        $productInput->name = $request->get('name');
        $productInput->price = $request->get('price');
        $productInput->ingredients = $request->get('ingredients');

        $this->commandBus->handle(new AddProductCommand($productInput));

        return $this->redirectToRoute('all_products');
    }

    #[Route(
        path: '/product/{id}', 
        name: 'product.detail',
    )]
    public function detail(Product $product, Request $request, CartManager $cartManager)
    {
        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);

            return $this->redirectToRoute('product.detail', ['id' => $product->getId()]);
        }

        return $this->render('product/detail.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }

}
