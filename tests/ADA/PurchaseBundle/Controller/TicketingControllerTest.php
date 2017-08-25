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
        $this->assertContains('Choisir une date', $client->getResponse()->getContent());

        $form['ticket[date]'] = '25-08-2017';
        $form['ticket[type]'] = 0;
        $form['ticket[number]'] = 1;
        $form['ticket[email][first]'] = 'dumas-chaumette@live.fr';
        $form['ticket[email][second]'] = 'dumas-chaumette@live.fr';
        $form['ticket[customers][0][name]'] = 'Dumas';
        $form['ticket[customers][0][firstName]'] = 'Benoit';
        $form['ticket[customers][0][country]'] = 'France';
        $form['ticket[customers][0][birthDate][day]'] = '19-03-1989';
        $form['ticket[customers][0][reduce]'] = true;
        $form = $crawler->selectButton('Valider')->form();
        $client->submit($form);

        // Assert that the response is a redirect to /fr/ticketing/summary
        $this->assertTrue($client->getResponse()->isRedirect('/fr/ticketing/summary'));
    }
}