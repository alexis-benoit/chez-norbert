<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager as PersistenceObjectManager;

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
                $this->passwordEncoder->encodePassword(
                    $user,
                    $password
                )
            )
            ->setRoles($roles);
    }

}
