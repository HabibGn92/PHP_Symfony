<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Cooptation;
use App\Repository\CooptationRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;
use App\Services\CooptationService;
use App\Services\UploaderService;
use FOS\RestBundle\Request\ParamFetcher;

 /**
   * @Rest\Route("/api/cooptation", name="cooptations")
   */
class CooptationController extends AbstractController
{

  /**
   * @Rest\Get("/")
   * @Rest\View(serializerGroups={"cooptations"})
   */
   public function allCooptations(CooptationService $cooptationService )
   {
      return $cooptationService->getCooptation();
   }
   /**
   * @Rest\Get("/getByUser")
   * @Rest\View(serializerGroups={"cooptations"})
   */
   public function userCooptation(CooptationService $cooptationService)
   {
     return $cooptationService->getUserCooptation();
   }
   /**
   * @Rest\Get("/{id}")
   * @Rest\View(serializerGroups={"cooptations"})
   */
   public function userCooptationById(CooptationService $cooptationService, $id)
   {
      return $cooptationService->getUserCooptationById($id);
   }

   /**
    * @Rest\FileParam(name="cv",description="cv du coopté")
    * @Rest\Post("/save")
    */
    public function saveCooptation(ParamFetcher $paramFetcher,UploaderService $uploaderService)
   {
      $uploaderService->uploadCv($paramFetcher->get("cv"));
      return $this->json(["message" => "upload réussi"],200);
   }
}
