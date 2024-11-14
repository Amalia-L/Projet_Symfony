<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FavorisController extends AbstractController
{
    #[Route('/favoris', name: 'favoris')]
    //Action -> funcion -> methodes
    public function index(): Response
    {
        return $this->render('favoris/index.html.twig', [
            'controller_name' => 'FavorisController',
        ]);
    } 
}
