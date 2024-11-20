<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SymptomesController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/symptomes', name:"symptomes.index")]
    public function index (Request $request): Response
    {
        return $this->render('symptom/index.html.twig');
    }
}