<?php
namespace Tests\ADA\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TicketingControllerTest extends WebTestCase
{

    public function testTicketing()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/fr/ticketing');
        // Assert a specific 200 status code
        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );

        // Assert that the response content contains a string
        $this->assertContains('Bienvenue', $client->getResponse()->getContent());

        // Remplissage du formulaire
        $form = $crawler->selectButton('Valider')->form();
        $form['ticket[date]'] = '26-03-2018';
        $form['ticket[type]'] = 0;
        $form['ticket[number]'] = 1;
        $form['ticket[email][first]'] = 'dumas-chaumette@live.fr';
        $form['ticket[email][second]'] = 'dumas-chaumette@live.fr';
        $crawler = $client->submit($form);

        //Assert that the response is a redirect to /fr/ticketing/summary
        $this->assertTrue($client->getResponse()->isRedirect('/fr/ticketing/summary'));
        
    }

}