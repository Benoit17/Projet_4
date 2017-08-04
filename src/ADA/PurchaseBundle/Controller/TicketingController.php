<?php

namespace ADA\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ADA\PurchaseBundle\Entity\Ticket;
use ADA\PurchaseBundle\Entity\Customer;
use ADA\PurchaseBundle\Form\TicketType;
use ADA\PurchaseBundle\Form\CustomerType;
use Stripe\Charge;
use Stripe\Error\Card;
use Stripe\Stripe;



class TicketingController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADAPurchaseBundle:Ticketing:index.html.twig');
    }

    public function ticketAction(Request $request)
    {
        $ticket = new Ticket();
        $form = $this->get('form.factory')->create(TicketType::class, $ticket);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
            return $this->redirectToRoute('ada_purchase_summary');
        }
        return $this->render('ADAPurchaseBundle:Ticketing:ticket.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function summaryAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_home'); }
        $this->get('ada_purchase.priceManager')->getTotalPriceTicket($ticket);
        $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
        return $this->render('ADAPurchaseBundle:Ticketing:summary.html.twig', array(
            'ticket' => $ticket,
        ));
    }

    public function paymentAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_home'); }

        Stripe::setApiKey($this->getParameter('stripe_api_key'));
        $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
        return $this->redirectToRoute('ada_purchase_final');

    }

    public function finalAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_home'); }
        $this->get('ada_purchase.sessionManager')->saveTicket($ticket);

        return $this->render('ADAPurchaseBundle:Ticketing:final.html.twig');
    }
}