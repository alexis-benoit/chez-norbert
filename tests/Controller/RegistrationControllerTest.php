<?php


namespace App\Tests\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
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

        //TODO : If a user exist in database, the redirect code is 302. Need to test this case ?
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFormRegister () {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');

        $this->assertEquals('/register', $client->getRequest()->getRequestUri());

        $form = $crawler->selectButton('Register')->form();


        //ErrorCase password too short
        // set some values
        $form['registration_form[email]'] = 'test@unit.test';
        $form['registration_form[plainPassword]'] = '123';

        // submit the form
        $client->submit($form);


        //TODO :test if error message rather than is uri is the same
        $this->assertEquals('/register', $client->getRequest()->getRequestUri());
        //fwrite(STDERR, print_r($client->getResponse()->isSuccessful(), TRUE));



        //Correct Case
        // set some values
        $form['registration_form[email]'] = 'test@unit.test';
        $form['registration_form[plainPassword]'] = '123456';

        // submit the form
        $client->submit($form);

        //TODO Rediriger ves page login quand elle sera faite
        $this->assertTrue($client->getResponse()->isRedirect('/'));


        //A user is already created so uri is automatically redirect
        $client->request('GET', '/register');

        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //TODO : tester que le user est créé ainsi que son rôle
    }
}