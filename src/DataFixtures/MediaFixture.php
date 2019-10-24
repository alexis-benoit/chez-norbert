<?php

namespace App\DataFixtures;

use App\Entity\Media;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class MediaFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $httpClient = HttpClient::create();
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i ++) {

            $response = $httpClient->request('GET', $faker->imageUrl());
            $path = __DIR__ . "/../../public/images/medias/$i.jpg";
            $publicPath = "$i.jpg";
            file_put_contents($path, $response->getContent());

            $media = new Media();
            $media->setName($faker->name())
                ->setAlt($faker->sentence())
                ->setFilename($publicPath)
                ->setUpdatedAt(new DateTimeImmutable());


            $manager->persist($media);
        }

        $manager->flush();
    }
}
