<?php

namespace App\UserInterface\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function homepage(): Response
    {
        return $this->redirectToroute('all_products');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contactpage(): Response
    {
        return $this->render('home/contactpage.html.twig');
    }

}
