<?php

namespace App\Controller;

use App\Classe\Equipe;
use App\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    /**
     * @Route("/equipe", name="app_equipe")
     */
    public function index(Request $request): Response
    {
        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class,$equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('papier/succes.html.twig');
        }
        return $this->render('equipe/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
