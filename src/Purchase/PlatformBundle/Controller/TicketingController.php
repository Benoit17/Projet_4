<?php

namespace Purchase\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TicketingController extends Controller
{
    public function indexAction()
    {
        $content = $this
            ->get('templating')
            ->render('PurchasePlatformBundle:Ticketing:index.html.twig');

        return new Response($content);
    }
}