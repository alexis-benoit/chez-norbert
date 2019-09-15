<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testGetRegister () {
        $client = static::createClient();

        $client->request('GET', '/register');

        if (!$client->getResponse()->isSuccessful()) {
            $block = $client->getCrawler()->filter('.exception-message');

            if ($block->count()) {
                $error = $block->text();
                file_put_contents('php://stdout', $error);
            }
        }


        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}