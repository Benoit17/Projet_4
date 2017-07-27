<?php

namespace ADA\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ADA\PurchaseBundle\Entity\Ticket;
use ADA\PurchaseBundle\Entity\Customer;
use ADA\PurchaseBundle\Form\TicketType;
use ADA\PurchaseBundle\Form\CustomerType;



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

    /*public function addAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ADAPurchaseBundle:Customer')
        ;
        $customers = $repository->findAll();
        $ticket = new Ticket();
        $form   = $this->get('form.factory')->create(TicketType::class, $ticket);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Enregistré');
            
        }

        return $this->render('ADAPurchaseBundle:Ticketing:ticket.html.twig', array(
            'customers' => $customers,
            'form' => $form->createView(),
            ));
    }*/

    public function ticketAction(Request $request)
    {
        $ticket = new Ticket();
        $form = $this->get('form.factory')->create(TicketType::class, $ticket);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
            return $this->redirectToRoute('ada_purchase_basket');
        }
        return $this->render('ADAPurchaseBundle:Ticketing:ticket.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function basketAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_index'); }
        $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
        return $this->render('ADAPurchaseBundle:Ticketing:basket.html.twig', array(
            'ticket' => $ticket,
        ));
    }
}