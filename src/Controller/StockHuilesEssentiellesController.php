<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StockHuilesEssentiellesController extends AbstractController
{
    #[Route('/stock-huiles-essentielles', name: 'app_stock_huiles_essentielles')]
    public function index(): Response
    {
        return $this->render('stock_huiles_essentielles/index.html.twig', [
            'controller_name' => 'StockHuilesEssentiellesController',
        ]);
    }
}
