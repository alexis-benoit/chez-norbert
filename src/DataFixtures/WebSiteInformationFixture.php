<?php

namespace App\DataFixtures;

use App\Entity\WebSiteInformation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectManager as PersistenceObjectManager;

class WebSiteInformationFixture extends Fixture
{
    public function load(PersistenceObjectManager $manager)
    {
        $site = new WebSiteInformation();
        $site->setSiteName('Chez Norbert')
            ->setFirstName('Prenom')
            ->setLastName('Nom')
            ->setEmail('norbert@test.fr')
            ->setAddress('Bergheim')
            ->setPhoneNumber('06 06 06 06 06')
            ->setFacebookLink('https://facebook.com');

        $manager->persist($site);
        $manager->flush();
    }
}
