<?php

namespace ADA\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ADA\PurchaseBundle\Entity\Ticket;
use ADA\PurchaseBundle\Form\TicketType;


class TicketingController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADAPurchaseBundle:Ticketing:index.html.twig');
    }

    /*public function translationAction()
    {
        return $this->render('ADAPurchaseBundle:Ticketing:index.html.twig');
    }*/

    public function addAction(Request $request)
    {

        $ticket = new Ticket();

        $form   = $this->get('form.factory')->create(TicketType::class, $ticket);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Enregistré');
            
        }

        return $this->render('ADAPurchaseBundle:Ticketing:add.html.twig', array(
            'form' => $form->createView(),
            ));
    }

}