<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StockRemedeController extends AbstractController
{
    #[Route('/stock-remede', name: 'app_stock_remede')]
    public function index(): Response
    {
        return $this->render('stock_remede/index.html.twig', [
            'controller_name' => 'StockRemedeController',
        ]);
    }
}
