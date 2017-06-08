<?php

namespace Purchase\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TicketingController extends Controller
{
    public function indexAction()
    {
        return $this->render('PurchasePlatformBundle:Ticketing:index.html.twig');
    }

    public function translationAction()
    {
        return $this->render('PurchasePlatformBundle:Ticketing:index.html.twig');
    }

    public function viewAction()
    {
        return $this->render('PurchasePlatformBundle:Ticketing:ticketing.html.twig');
    }
}