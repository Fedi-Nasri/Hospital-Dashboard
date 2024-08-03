<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MedecinesInfoController extends AbstractController
{
    #[Route('/medecines/info', name: 'app_medecines_info')]
    public function index(): Response
    {
        return $this->render('medecines_info/index.html.twig', [
            'controller_name' => 'MedecinesInfoController',
        ]);
    }
}
