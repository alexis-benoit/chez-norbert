<?php

namespace App\DataFixtures;

use App\Entity\House;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HouseFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $site = new House();
        $site->setName('Vendange tardive')
            ->setType('Chambre d\'hote')
            ->setPeopleNumber(3)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.')
            ->setAdvantage(['Chambre lits jumeaux','douche', 'Option petit déjeuner'])
        ;

        $manager->persist($site);

        $site = new House();
        $site->setName('Grand cru')
            ->setType('Chambre d\'hote')
            ->setPeopleNumber(2)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.')
            ->setAdvantage(['Balnéo', 'Douche', 'coin salon', 'écran plat', 'Option petit déjeuner'])
        ;

        $manager->persist($site);

        $site = new House();
        $site->setName('Riesling')
            ->setType('Gite')
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Option petit déjeuner'])
        ;

        $manager->persist($site);

        $site = new House();
        $site->setName('Riesling')
            ->setType('Grasberg')
            ->setPeopleNumber(4)
            ->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.')
            ->setAdvantage(['Cuisine équipée', 'Salle de bain privative pour chaque chambre', 'Duplex', 'Option petit déjeuner'])
        ;

        $manager->persist($site);

        $manager->flush();
    }
}
