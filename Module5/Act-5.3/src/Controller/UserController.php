<?php

namespace App\Controller;

use App\Entity\Profession;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\ProfessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request,EntityManagerInterface $em,UserPasswordEncoderInterface $pwdEncoder,ProfessionRepository $professionRepository): Response
    {
        if ( $this->getUser()) {
            return $this->render('user/index.html.twig');
        }
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPwd = $pwdEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hashedPwd);
            $user->setRoles(['ROLE_USER']);
            $profession = $professionRepository->findOneBy([
                'name' => $form->get('profession')->getData()
            ]);
            $user->setProfession($profession);
            $em->persist($user);
            $em->flush();
            return $this->render('user/login.html.twig');
        }
        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ( $this->getUser()) {
            return $this->render('user/index.html.twig');
        }
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('user/login.html.twig',[
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() { }

    /**
     * @Route("/user", name="user_page")
     */
    public function userPage(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('user/userPage.html.twig');
    }

    /**
     * @Route("/admin", name="admin_page")
     */
    public function adminPage(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('user/adminPage.html.twig');
    }

    /**
     * @Route("/getCurrent", name="get_current")
     */
    public function getCurrent()
    {
       $user = $this->getUser();
       return  $this->json([
        'user' => $user->getUsername(),
        'email' => $user->getEmail()
       ]);
    }


}
