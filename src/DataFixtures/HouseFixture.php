<?php

namespace App\DataFixtures;

use App\Entity\House;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HouseFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $house = new House();
        $house->setName('Vendange Tardive')
            ->setType("Chambre d'hote")
            ->setPeopleNumber(3)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Chambre lits jumeaux','douche', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grand Cru')
            ->setType("Chambre d'hote")
            ->setPeopleNumber(2)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Balnéo', 'Douche', 'coin salon', 'écran plat', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grand Cru Alsace')
            ->setType("Chambre d'hote")
            ->setPeopleNumber(2)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Lits jumeaux', 'Mezzanine', 'Coin salon', 'Mini bar', 'Balnéo et douche'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Riesling')
            ->setType('Gite')
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grasberg')
            ->setType('Gite')
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Duplex', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $manager->flush();
    }
}
