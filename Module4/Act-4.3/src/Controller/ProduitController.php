<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        $entiyManager = $this->getDoctrine()->getManager();
        $category = $categorieRepository->findOneByName('Moto');
        $produit = new Produit();
        $produit->setName('Stunt 50');
        $produit->setDescription('text......');
        $produit->setPrice('5500');
        $produit->setCategory($category);

        $entiyManager->persist($category);
        $entiyManager->persist($produit);
        $entiyManager->flush();

        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    /**
     * @Route("/get_product/{id}", name="get_product")
     */
    public function showById(ProduitRepository $produitRepository,CategorieRepository $categorieRepository,$id)
    {
        $product = $produitRepository->find($id);
        $category  = $categorieRepository->find($product->getCategory());
        $products = $category->getProduits();
        return $this->render('produit/showOne.html.twig', [
            'product' => $product,
            'category' => $category,
            'products' => $products
        ]);
    }

    /**
     * @Route("/get_products/{categorie}", name="get_products")
     */
    public function getProducts(ProduitRepository $produitRepository,CategorieRepository $categorieRepository,$categorie) :Response
    {
        $category = $categorieRepository->findBy(['name' => $categorie]);
        $category_id = $category[0]->getId();
        $produits = $produitRepository->findBy(['category' => $category_id]);
        return $this->render('produit/showAll.html.twig', [
            'produits' => $produits,
        ]);
    }
}
