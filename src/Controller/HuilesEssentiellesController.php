<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HuilesEssentiellesController extends AbstractController
{
    #[Route('/huiles-essentielles', name:"huiles_essentielles")]
    public function afficherHuilesEssentielles ()
    {
        return new Response(
            '<html>
                <body>
                    <ul>
                        <li>Ahibero</li>
                        <li>Archillée millefeuille</li>
                        <li>Ail</li>
                    </ul>
                </body>
            </html>'
        );
    }
}