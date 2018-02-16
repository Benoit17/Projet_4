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
use Symfony\Component\Validator\Validator\ValidatorInterface;



class TicketingController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADAPurchaseBundle:Ticketing:index.html.twig');
    }

    public function dateAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ADAPurchaseBundle:Ticket');
        //Récupération de la date postée par l'utilsateur
        $date = $request->request->get('date');
        //Appel à la fonction getTicketNumber du repository pour calculer le nombre de ticket déjà enregistré suivant la date choisie par l'utilisateur
        $number = $repository->getTicketNumber($date);

        return new Response($number);
    }

    public function ticketingAction(Request $request)
    {
        $ticket = new Ticket();
        $form = $this->get('form.factory')->create(TicketType::class, $ticket);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
            return $this->redirectToRoute('ada_purchase_summary');
        }

        return $this->render('ADAPurchaseBundle:Ticketing:ticketing.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function summaryAction(Request $request)
    {
            $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
            $this->get('ada_purchase.priceManager')->getTotalPriceTicket($ticket);

            $form = $this->get('form.factory')->create(TicketType::class, $ticket);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {

                // récupère le résultat de la validation
                $validation = $this->get('ada_purchase.editManager')->validateTicket($ticket);
                // si la validation n'est pas ok on renvoie les erreurs du validateur
                if($validation !== true) {
                    return new Response($validation,500);
                }
            }
            return $this->render('ADAPurchaseBundle:Ticketing:summary.html.twig', array(
                'ticket' => $ticket,
                'form' => $form->createView(),
            ));

    }

    public function paymentAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_index'); }

        Stripe::setApiKey($this->getParameter('stripe_api_key'));
        $this->get('ada_purchase.sessionManager')->setSessionTicket($ticket);
        return $this->redirectToRoute('ada_purchase_final');

    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function finalAction()
    {
        $ticket = $this->get('ada_purchase.sessionManager')->getSessionTicket();
        if ($ticket === null) { return $this->redirectToRoute('ada_purchase_index'); }
        $this->get('ada_purchase.sessionManager')->saveTicket($ticket);

        return $this->render('ADAPurchaseBundle:Ticketing:final.html.twig');
    }
}