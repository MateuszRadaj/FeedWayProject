<?php

namespace App\UserInterface\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function homepage(): Response
    {
        return $this->render('page/homepage.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contactpage(): Response
    {
        return $this->render('page/contactpage.html.twig');
    }

    #[Route('/panel', name: 'app_panel')]
    public function panelpage(Request $request): Response
    {   
        return $this->render('page/panelpage.html.twig', [
            'success' => $request->get('success')
        ]);
    }
}
