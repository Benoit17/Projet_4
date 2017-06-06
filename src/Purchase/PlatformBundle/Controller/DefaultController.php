<?php

namespace Purchase\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PurchasePlatformBundle:Default:index.html.twig');
    }
}
