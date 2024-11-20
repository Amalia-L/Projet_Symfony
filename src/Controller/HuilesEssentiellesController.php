<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HuilesEssentiellesController extends AbstractController
{

    #[Route('/huiles-essentielles', name:"oil.index")]
    public function index (Request $request): Response
    {
        return $this->render('essentialOil/index.html.twig');
    }

    #[Route('/huiles-essentielles/{slug}-{id}', name:"oil.show")]
    public function show (Request $request, string $slug, int $id): Response
    {
        return $this->render('essentialOil/show.html.twig', [
            'slug' => $slug,
            'id' => $id
        ]);
    }
}
