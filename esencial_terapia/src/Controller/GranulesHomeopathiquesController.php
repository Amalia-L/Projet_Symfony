<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GranulesHomeopathiquesController extends AbstractController
{
    #[Route('/granules/homeopathiques')]
    public function afficherGranulesHomeopathiques ()
    {
        return new Response(
            '<html>
                <body>
                    <ul>
                        <li>Abies canadensis</li>
                        <li>Achillea Millefolium</li>
                        <li>Acidum Benzoicum</li>
                    </ul>
                </body>
            </html>'
        );
    }
}