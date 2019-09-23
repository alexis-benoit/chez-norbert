<?php


namespace App\Tests\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

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


        //A user is already created so uri is automatically redirect to home page
        $client->request('GET', '/register');

        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //TODO : tester que le user est créé ainsi que son rôle
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $repo = $this->entityManager
            ->getRepository(User::class)
        ;

        //1 user created so 1 expected
        $tot = $repo
            ->getCount();
        $this->assertEquals(1, $tot);

        $all = $repo->findAll();
        $user = array_pop($all);
        //fwrite(STDERR, print_r($user, TRUE));

        //Test his mail
        $mail = $user->getEmail();
        $this->assertEquals('test@unit.test', $mail);


        //Test it has role ROLE_ADMIN

        $roles = $user->getRoles();
        //fwrite(STDERR, print_r($roles, TRUE));
        $this->assertTrue(in_array('ROLE_ADMIN', $roles));

        //TODO : Test if the password is hashed

        $this->entityManager->close();
        $this->entityManager = null;
    }
}