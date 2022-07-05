<?php

namespace App\Controller;

use App\Classe\AdresseEmail;
use App\Form\AdresseEmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdresseEmailController extends AbstractController
{
    /**
     * @Route("/adresseEmail", name="app_adresse_email")
     */
    public function index(Request $request): Response
    {
        $adresse = new AdresseEmail();
        $form = $this->createForm(AdresseEmailType::class, $adresse);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('papier/succes.html.twig');
        }
        return $this->render('adresse_email/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
