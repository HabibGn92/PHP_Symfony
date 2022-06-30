<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/create_product/{label}/{price}/{quantity}", name="app_produit")
     */
    public function index(string $label,int $price,int $quantity): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Produit();
        $product->setLabel($label);
        $product->setPrice($price);
        $product->setQuantity($quantity);
        $entityManager->persist($product);
        $entityManager->flush();
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    /**
     * @Route("/get_product/{id}", name="get_produit")
     */
    public function getProduct(int $id): Response
    {
        $product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
        return $this->render('produit/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/edit_product/{id}/{label}/{price}/{quantity}", name="update_produit")
     */
    public function updateProduct(int $id,string $label,int $price,int $quantity): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Produit::class)->find($id);
        $product->setLabel($label);
        $product->setPrice($price);
        $product->setQuantity($quantity);
        $entityManager->flush();
        return $this->render('produit/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/get_all_products", name="get_produit")
     */
    public function getAllProduct(): Response
    {
        $products = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        return $this->render('produit/showAll.html.twig', [
            'products' => $products,
        ]);
    }
}
