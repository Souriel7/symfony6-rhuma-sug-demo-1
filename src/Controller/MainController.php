<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/produit/{id}', name: 'app_produit')]
    public function produit(Produit $produit) // on récupère une instance de la class Produit (entity) dans la variable $produit => params converters
    {
        return $this->render('main/produit.html.twig', [
            'produit' => $produit
        ]);
    }
}
