<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail("admin@talan.com")
                ->setPassword($this->encoder->encodePassword($admin,"admin123"))
                ->setRoles(["ADMIN_ROLE"]);
                $manager->persist($admin);
                $manager->flush();
                
        $faker = Factory::create();
        for ($i=0; $i < 5; $i++) { 
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($faker->password());
            $user->setRoles(["ROLE_USER"]);
            $manager->persist($user);
            $manager->flush();
        }

    }
}
