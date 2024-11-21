<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class StockRemedeController extends AbstractController
{
    #[Route('/stock-remede', name:"stockRemede.index")]
    public function index (Request $request): Response
    {
        return $this->render('stockRemede/index.html.twig');
    }
}
