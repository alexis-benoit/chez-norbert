<?php

namespace App\DataFixtures;

use App\Entity\House;
use App\Repository\MediaRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

class HouseFixture extends Fixture
{

//    /**
//     * @var TranslationRepository
//     */
//
//    private $repository;
//    public function __construct(TranslationRepository $repository)
//    {
//        $this->repository = $repository;
//    }

    public function load(ObjectManager $manager)
    {
        $slugifier = new Slugify();

        $house = new House();
        $house->setName('Vendange Tardive')
            ->setSlug($slugifier->slugify($house->getName()))
            ->setType(1)
            ->setPeopleNumber(3)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Chambre lits jumeaux','douche', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grand Cru')
            ->setSlug($slugifier->slugify($house->getName()))
            ->setType(1)
            ->setPeopleNumber(2)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Balnéo', 'Douche', 'coin salon', 'écran plat', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grand Cru Alsace')
            ->setSlug($slugifier->slugify($house->getName()))
            ->setType(1)
            ->setPeopleNumber(2)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Lits jumeaux', 'Mezzanine', 'Coin salon', 'Mini bar', 'Balnéo et douche'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Riesling')
            ->setSlug($slugifier->slugify($house->getName()))
            ->setType(0)
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Option petit déjeuner'])
        ;

        $manager->persist($house);

        $house = new House();
        $house->setName('Grasberg')
            ->setSlug($slugifier->slugify($house->getName()))
            ->setType(0)
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Duplex', 'Option petit déjeuner'])
        ;
//
//        $this->repository->translate($house, 'description', 'de', 'test allemand')
//            ->translate($house, 'description', 'en', 'test anglais')
//            ->translate($house, 'description', 'ru', 'test russe')
//        ;

        $manager->persist($house);

        $manager->flush();
    }
}
