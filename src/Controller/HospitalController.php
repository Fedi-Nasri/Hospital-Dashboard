<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ActeRepository;
use App\Repository\MedecinRepository;

class HospitalController extends AbstractController
{
    #[Route('/hospital', name: 'app_hospital')]
    public function index(ActeRepository $acte,MedecinRepository $medecin): Response
    {
            // Fetch all products
            $products = $acte->findAll();
            $med =$medecin->findAll();
            
        return $this->render('hospital/index.html.twig', [
            'products' => $products,
            'medecins'=> $med,
        ]);
    }
}
