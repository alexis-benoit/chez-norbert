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

    private function createUser($email, $password, array $roles): User
    {
        $user = new User();
        return $user
            ->setEmail($email)
            ->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    $password
                )
            )
            ->setRoles($roles);
    }

    public function load(ObjectManager $manager)
    {
        // create 2 users! Fist will be an ADMIN_USER
        $admin = $this->createUser('admin@norbert.com', 'test', [ 'ROLE_ADMIN' ]);
        $manager->persist($admin);

        $user = $this->createUser('user@norbert.com', 'test', [ 'ROLE_USER' ]);
        $manager->persist($user);

        $manager->flush();
    }


}
