<?php

namespace App\Tests\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase {


    public function testValidEntity() {
        $user = (new User())
        ->setEmail("habib@talan.com")
        ->setPassword("pwd123")
        ->setName("habib")
        ->setRoles(["ROLE_USER"]);
        self::bootKernel();
        $error = self::$container->get("validator")->validate($user);
        $this->assertCount(0,$error);
    }

    public function testInvalidEntity() 
    {
        $user = (new User())
        ->setEmail("habi")
        ->setPassword("")
        ->setName("")
        ->setRoles(["ROLE_USER"]);
        self::bootKernel();
        $error = self::$container->get("validator")->validate($user);
        $this->assertCount(3,$error);
    }

}