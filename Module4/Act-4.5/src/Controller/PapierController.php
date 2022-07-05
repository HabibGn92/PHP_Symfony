<?php

namespace App\Controller;

use App\Classe\Papier;
use App\Form\PapierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PapierController extends AbstractController
{
    /**
     * @Route("/papier", name="app_papier")
     */
    public function index(Request $request): Response
    {
        $papier = new Papier();
        $form = $this->createForm(PapierType::class,$papier);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('papier/succes.html.twig');
        }
        return $this->render('papier/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
}
