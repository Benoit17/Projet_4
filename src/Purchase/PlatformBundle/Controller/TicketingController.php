<?php

namespace Purchase\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Purchase\PlatformBundle\Entity\Ticket;
use Purchase\PlatformBundle\Form\TicketType;


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

    public function viewAction(Request $request)
    {
        $ticket = new Ticket();
        $form   = $this->get('form.factory')->create(TicketType::class, $ticket);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Enregistré');

            return $this->redirectToRoute('purchase_platform_home');
        }

        return $this->render('PurchasePlatformBundle:Ticketing:ticketing.html.twig', array(
            'form' => $form->createView(),
            ));
    }

}