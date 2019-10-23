<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $httpClient = HttpClient::create();
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i ++) {

            $response = $httpClient->request('GET', $faker->imageUrl());
            $path = __DIR__ . "/../../public/$i.jpg";
            file_put_contents($path, $response->getContent());

            $file = new UploadedFile($path, 'image', 'image/jpeg', null, true);

            $media = new Media();
            $media->setName('tintin')
                ->setAlt('a mulhouse')
                ->setImageFile($file);


            $manager->persist($media);
        }

        //file_put_contents(, $response->getContent());

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
