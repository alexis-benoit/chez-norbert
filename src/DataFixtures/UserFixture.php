<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\ObjectManager as PersistenceObjectManager;

class UserFixture extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(PersistenceObjectManager $manager)
    {
        // create 2 users! Fist will be an ADMIN_USER
        $admin = $this->createUser('admin@norbert.com', 'test', [ 'ROLE_ADMIN' ]);
        $manager->persist($admin);

        $user = $this->createUser('user@norbert.com', 'test', [ 'ROLE_USER' ]);
        $manager->persist($user);

        $manager->flush();
    }


    /**
     * Creates a user from an email, a password and roles
     *
     * @param string $email
     * @param string $password
     * @param array $roles
     * @return User
     */
    private function createUser($email, $password, array $roles): User
    {
        $user = new User();
        return $user
            ->setEmail($email)
            ->setPassword(
                $this->passwordEncoder->hashPassword(
                    $user,
                    $password
                )
            )
            ->setRoles($roles);
    }

}
