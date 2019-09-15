<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* Sample to create 20 products
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $manager->persist($product);
        }
        */
        
        // create 2 users! Fist will be an ADMIN_USER
        $roles[] = 'ROLE_ADMIN';
        $user = $this->createUser( 'alexisbenoit68@gmail.com'   , 'test', $roles );
        $manager->persist($user);

        $roles = null;
        $roles[] = 'ROLE_USER';
        $user = $this->createUser( 'alexis.benoit.68@gmail.com' , 'test', $roles );
        $manager->persist($user);

        $manager->flush();
    }


    //Function to create user
    private function createUser(String $email, String $password, array $roles)
    {
        $user = new User();
        $user->setEmail(
            $email
        );
        
        $user->setPassword(
            $password
        );

        $user->setRoles( 
            $roles 
        );
        
        return $user;
    }
}
