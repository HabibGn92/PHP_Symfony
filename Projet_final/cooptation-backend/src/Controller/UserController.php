<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class UserController extends AbstractController
{
   protected $entityManager;
   protected $userRepo;
   protected $userPasswordEncoder;
   protected $validator;

   public function __construct(EntityManagerInterface $entityManager,UserRepository $userRepo,UserPasswordEncoderInterface $userPasswordEncoder,
                              ValidatorInterface $validator)
   {
      $this->entityManager = $entityManager;
      $this->userRepo = $userRepo;
      $this->userPasswordEncoder = $userPasswordEncoder;
      $this->validator = $validator;
   }

   /**
   * @Rest\Get("api/users")
   * @Rest\View(serializerGroups={"users"})
   */
   public function list()
   {
      return $this->userRepo->findAll();
   }

   /**
   * @Rest\View(serializerGroups={"users"})
   * @Rest\Get("/api/user/{id}", name="app_user_show")
   */
    public function getUserById($id)
    {
        if(!$this->userRepo->find($id)){
            return $this->json(["error message" => "user not found"],404);
        }
        return $this->userRepo->find($id);
    }

   /**
   * @Rest\Post("api/user", name="add")
   */
   public function addUser(Request $request)
   {
      $user = new User();
      $donnees = json_decode($request->getContent());
      $user->setEmail($donnees->email)
            ->setName($donnees->name)
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->userPasswordEncoder->encodePassword($user,$donnees->password));
      $errors = $this->validator->validate($user);
      if(count($errors) > 0){
         return $this->json([
            "error message" => (string)$errors
         ],400);
      }
            $this->entityManager->persist($user);
            $this->entityManager->flush();
      return $this->json($user,201,[]);
   }

   /**
   * @Rest\Put("api/user/{id}", name="edit")
   */
    public function editUser(Request $request,$id)
    {
         $user = $this->userRepo->find($id);
         if(!$user){
            return $this->json(["error message" => "user not found"],404);
         }

         $donnees = json_decode($request->getContent());
         $user->setEmail($donnees->email)
               ->setName($donnees->name)
               ->setPassword($this->userPasswordEncoder->encodePassword($user,$donnees->password));
         $errors = $this->validator->validate($user);
         if (count($errors) > 0) {
            return $this->json([
            "error message" => (string)$errors
         ],400);
         }
         $this->entityManager->flush();
         return $this->json($user,200);
     }
        
   /**
   * @Rest\Delete("api/user/{id}", name="delete")
   */
   public function removeUser($id)
   {
      $user = $this->userRepo->find($id);
      if(!$user){
          return $this->json(["error message" => "user not found"],404);
      }
      $this->entityManager->remove($user);
      $this->entityManager->flush($user);
      return $this->json(["message" => "user deleted successfully"],200);
   }
}
