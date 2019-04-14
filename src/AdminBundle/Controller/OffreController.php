<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Offre;
use AppBundle\Entity\Rating;
use AppBundle\Form\OffreType;
use AppBundle\Controller\Osms;

class OffreController extends Controller
{
    public function addoffreAction(Request $request)

    {
        $offre = new Offre(); //INSTANCE DE NOTRE CLASSE
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

//controler 2 visites
        if ($form->isSubmitted() && $form->isValid()) {
            // echo 'suite au click sur le bouton submit ';
            $em = $this->getDoctrine()->getManager();
            $offre->setPrixDebut($offre->getEvenement()->getPrix());
            $offre->setPrixFinal($offre->getEvenement()->getPrix() - (($offre->getEvenement()->getPrix() * $offre->getRemise()) / 100));
            $offre->setStatus(true);

            $em->persist($offre);// elle est rempli grace a create form
            $em->flush();

            $evenement = $offre->getEvenement();
            $evenement->setPrix($offre->getPrixFinal());

            $em->merge($evenement);// elle est rempli grace a create form
            $em->flush();

            // sms
            $users = $em->getRepository("AppBundle:User")->findBy(array('subscribe'=>true));
            if($users){

                foreach ($users as $us){
                    $this->sms($us->getTel(),$offre);
                }
            }


            return $this->redirectToRoute('afficheoffre');
        }

        return $this->render('@Admin/offre/ajoutoffre.html.twig', array(
            "form" => $form->createView()
        , "offre" => $offre
        ));

    }


    public function afficheoffreAction(Request $request)
    {
        //creer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AppBundle:Offre")//il faut passer par vue
        ->findAll(); //recuperer tous les modeles

        $this->verifDate($offres,$em);

        $paginator = $this->get('knp_paginator');
        $offres = $paginator->paginate(
            $offres, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('@Admin/offre/afficheoffre.html.twig', array(
            "offres" => $offres

        ));
    }



    public function deleteoffreAction(Request $request, $id)
    {
        $offre = new Offre();
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository("AppBundle:Offre")->find($id);

        if($offre->isStatus()){
            $event = $offre->getEvenement();
            $event->setPrix($offre->getPrixDebut());
            $em->merge($event);
            $em->flush();
        }

        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('afficheoffre');


    }

    public function updateoffreAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository("AppBundle:Offre")->find($id);
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
         //   $offre->setPrixDebut($offre->getEvenement()->getPrix());
            $offre->setPrixFinal($offre->getPrixDebut() - (($offre->getPrixDebut() * $offre->getRemise()) / 100));
            $offre->setStatus(true);

            $em->persist($offre);// elle est rempli grace a create form
            $em->flush();

            $evenement = $offre->getEvenement();
            $evenement->setPrix($offre->getPrixFinal());

            $em->merge($evenement);// elle est rempli grace a create form
            $em->flush();
            return $this->redirectToRoute('afficheoffre');

        }
        return $this->render('@Admin/offre/updateoffre.html.twig', array(
            'form' => $form->createView() , 'offre' => $offre
        ));
    }
    /**
     * Creates a new ActionItem entity.
     *
     * @Route("/search", name="ajax_search")
     * @Method("GET")
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $entities = $em->getRepository('AppBundle:Offre')->findOffreByString($requestString);
        if (!$entities) {
            return new Response("false");
        } else {
            $result = $this->getRealEntities($entities);
        }

        $response = new Response($result );
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    public function getRealEntities($entities){

            $data = $this->get('serializer')->serialize($entities, 'json');
        return $data;
    }


    public function offreAjaxAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('produit_id');
        $entities = $em->getRepository('AppBundle:Offre')->find($id);
        if (!$entities) {
            return new Response("false");
        } else {
            $result = $this->getRealEntities($entities);
        }

        $response = new Response($result );
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }


    public function verifOffreAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prod = $request->get('produit_id');
        $entities = $em->getRepository('AppBundle:Offre')->findBy(array('evenement'=>$prod , 'status'=>true));

    if($entities){
      //return  new Response(json_encode($entities));
        return new Response("false");
    }else{
        return new Response("true");
    }

    }

    public function verifDate($offres,$em){
        $datenow = new \DateTime('now');
        foreach ($offres as $e)
        {
            if($e->getDateFin() < $datenow )
            {
                if($e->isStatus()!=false)
                {

                    $e->setStatus(false);
                    $em->persist($e);
                    $em->flush();
                    $event = $e->getEvenement();
                    $event->setPrix($e->getPrixDebut());
                    $em->merge($event);
                    $em->flush();
                }
            }else
            {
                $e->setStatus(true);
                $em->persist($e);
                $em->flush();
            }

        }
    }


    public function sms($reciver , $offre){
        $token = "";
        $config = array(
            'clientId' => 'uGP4onF5EQzT0zGBH1IuS2EE41cnPLAK',
            'clientSecret' => 'yTqoejJqCYpzy9x2'
        );

        $osms = new Osms($config);
        $osms->setVerifyPeerSSL(false);



        $response = $osms->getTokenFromConsumerKey();

        if (empty($response['error'])) {
            $token= $response['access_token'];

        } else {
            echo $response['error'];
        }

        $config = array(
            'token' => $token
        );

        $osms = new Osms($config);
        $osms->setVerifyPeerSSL(false);
        $senderAddress = 'tel:+21650649898';


        $receiverAddress = 'tel:+216'.$reciver;
        $message = ' Nouveau offre pour notre evenement ' . $offre->getEvenement()->getDescription() .' visiter notre cite web www.citedelaculture.tn pour plus d info ';
        $senderName = 'cite culture';
        // echo $receiverAddress;

        $osms->sendSMS($senderAddress, $receiverAddress, $message, $senderName);
        /*    sms end */

    }
}