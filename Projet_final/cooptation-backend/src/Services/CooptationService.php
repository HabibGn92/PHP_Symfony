<?php

namespace App\Services;

use App\Service\MessageGenerator;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cooptation;
use App\Repository\CooptationRepository;
use Symfony\Component\Security\Core\Security;
class CooptationService
{
    protected $entityManager;
    protected $cooptationRepo;
    private $security;
   public function __construct(EntityManagerInterface $entityManager,CooptationRepository $cooptationRepo, Security $security)
   {
      $this->entityManager = $entityManager;
      $this->cooptationRepo = $cooptationRepo;
      $this->security = $security;
   }

   public function getCooptation()
    {
        return $this->cooptationRepo->findAll();
    }

   public function getUserCooptation()
    {
        $user = $this->security->getUser();
        $userId = $user->getId() ; 
        return $this->cooptationRepo->findBy(['user' => $userId]);
    }

   public function getUserCooptationById($id)
    {
        $user = $this->security->getUser();
        $userId = $user->getId() ; 
        return $this->cooptationRepo->findBy(['id' => $id]);
    }
}