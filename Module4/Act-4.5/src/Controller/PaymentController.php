<?php

namespace App\Controller;

use App\Classe\Payment;
use App\Form\PaymentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="app_payment")
     */
    public function index(Request $request): Response
    {
        $payment = new Payment();
        $form = $this->createForm(PaymentType::class,$payment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('papier/succes.html.twig');
        }
        return $this->render('payment/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
