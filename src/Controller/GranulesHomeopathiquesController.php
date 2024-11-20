<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GranulesHomeopathiquesController extends AbstractController
{
    #[Route('/granules-homeopathique', name:"homeopathie.index")]
    public function index (Request $request): Response
    {
        return $this->render('granulesHomeopatic/index.html.twig');
    }
}