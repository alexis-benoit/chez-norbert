<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function createUser(String $email, String $password, array $roles)
    {
        $user = new User();
        $user
            ->setEmail(
                $email
            )
            ->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    $password
                )
            )
            ->setRoles(
                $roles
            );
        return $user;
    }

    public function load(ObjectManager $manager)
    {
        // create 2 users! Fist will be an ADMIN_USER
        $role_admin[] = 'ROLE_ADMIN';
        $admin = $this->createUser( 'admin@norbert.com'   , 'test', $role_admin );
        $manager->persist($admin);

        $roles[] = 'ROLE_USER';
        $user = $this->createUser( 'user@norbert.com'   , 'test', $roles );
        $manager->persist($user);

        $manager->flush();
    }


}
