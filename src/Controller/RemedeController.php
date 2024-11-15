<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RemedeController extends AbstractController
{
    #[Route('/remede', name: 'app_remede')]
    public function index(): Response
    {
        return $this->render('remede/index.html.twig', [
            'controller_name' => 'RemedeController',
        ]);
    }
}
