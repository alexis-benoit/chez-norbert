<?php

namespace App\DataFixtures;

use App\Entity\Media;
use App\Repository\HouseRepository;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class MediaFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @var HouseRepository
     */
    private $repository;

    public function __construct(HouseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function load(ObjectManager $manager)
    {
        $houses = $this->repository->findAll();

        $httpClient = HttpClient::create();
        $faker = Factory::create();

        foreach ($houses as $house) {
            for ($i = 0; $i < 3; $i ++) {
                $response = $httpClient->request('GET', $faker->imageUrl());
                $path = __DIR__ . "/../../public/images/medias/{$house->getId()}-$i.jpg";
                $publicPath = "{$house->getId()}-$i.jpg";
                file_put_contents($path, $response->getContent());

                $media = new Media();
                $media->setAlt($faker->sentence())
                    ->setFilename($publicPath)
                    ->setUpdatedAt(new DateTimeImmutable());

                $house->addMedia($media);
//                $manager->persist($media);
            }

            $manager->persist($house);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            HouseFixture::class
        ];
    }
}
