<?php

namespace frontBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Reclamation;
use AppBundle\Form\reclamationType;
class ReclamationController extends Controller
{
    public function reclamerAction(Request $request)
    {
        $user = $this->getUser();
        if($user->hasRole("ROLE_ADMIN")){
            return $this->redirectToRoute("homepage");
        }
        $reclamation = new reclamation(); //INSTANCE DE NOTRE CLASSE
        $form =$this->createForm(reclamationType::class,$reclamation);
        $form->handleRequest($request);                     //controler 2 visites
        return $this->render('@front/reclamation/ajout.html.twig',array(
            "form"=>$form->createView()
        ));
    }
    public function mesReclamationAction(Request $request)
    {     $user = $this->getUser();
        if($user->hasRole("ROLE_ADMIN")){
            return $this->redirectToRoute("homepage");
        }
        $em=$this->getDoctrine()->getManager();
        $listReclamation = $em->getRepository("AppBundle:Reclamation")->findBy(array('user'=>$user));

                     //controler 2 visites
        return $this->render('@front/reclamation/mesReclamation.html.twig',array(
            "reclamations"=>$listReclamation
        ));
    }
    public function supprimerReclamationAction(Request $request  ,$id)
    {     $user = $this->getUser();
        if($user->hasRole("ROLE_ADMIN")){
            return $this->redirectToRoute("homepage");
        }
        $em=$this->getDoctrine()->getManager();
        $reclamation = $em->getRepository("AppBundle:Reclamation")->find($id);

        $em->remove($reclamation);
        $em->flush();

        //controler 2 visites
        return $this->redirectToRoute('mesReclamation');
    }

    public function modifierReclamationAction(Request $request,$id)
    {
        $user = $this->getUser();
        if($user->hasRole("ROLE_ADMIN")){
            return $this->redirectToRoute("homepage");
        }
        $em=$this->getDoctrine()->getManager();
        $reclamation = $em->getRepository("AppBundle:Reclamation")->find($id);
        $form =$this->createForm(reclamationType::class,$reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->merge($reclamation);
            $em->flush();
            return $this->redirectToRoute("mesReclamation");
        }
        //controler 2 visites
        return $this->render('@front/reclamation/modifier.html.twig',array(
            "form"=>$form->createView() , "evenement"=> $reclamation->getEvenement()->getDescription()
        ));
    }

    public function reclamerAjaxAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        // recupere les champs envoyee par ajax request
        $titre = $request->get('titre');
        $description = $request->get('description');
        $userr = $request->get('user');
        $prio = $request->get('prio');
        $eventt = $request->get('event');
    //    $produitt = $request->get('produit');

      //  $produit =  $em->getRepository("UserBundle:Produit")->find($produitt);//id
        $event=  $em->getRepository("AppBundle:Evenement")->find($eventt);
        $user=  $em->getRepository("AppBundle:User")->find($userr);

        if($user->isBan()){
            return new Response("ban");
        }

        $index = 0 ;
        $listReclamation = $em->getRepository("AppBundle:Reclamation")->findBy(array('user'=>$user , 'status'=>false));
        foreach ($listReclamation as $rec){
            $index ++ ;
        }

        if( $index>=10 ){
            $user->setBan(true);
            $em->merge($user);
            $em->flush();
            return new Response("ban");
        }

        $reclamation = new Reclamation();
        $reclamation->setUser($user);
        $reclamation->setTitre($titre);
        $reclamation->setDescription($description);
        $reclamation->setPriorite($prio);
      //  $reclamation->setProduit($produit);
        $reclamation->setEvenement($event);

        $em->persist($reclamation);
        $em->flush();


        if($index>=5 &&  $index<10 ){

            //  pusher notification
            $data = array(
                'my-message' => "Vous avez reçu  une nouvelle reclamation ",
            );
            $pusher = $this->get('mrad.pusher.notificaitons');  // service provided by the bundle
            $channel = "admin";
            $pusher->trigger($data, $channel);


            // end pusher notification
            return new Response("warning");

        }
        //  pusher notification
        $data = array(
            'my-message' => "Vous avez reçu  une nouvelle reclamation ",
        );
        $pusher = $this->get('mrad.pusher.notificaitons');
        $channel = "admin";
        $pusher->trigger($data, $channel);



        // end pusher notification

    return new Response("oui");
    }

}
