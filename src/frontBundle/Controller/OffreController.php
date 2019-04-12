<?php

namespace frontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Offre;
use AppBundle\Entity\Rating;
use AppBundle\Form\OffreType;
class OffreController extends Controller
{


    public function bestOffreAction()
    {
        //creer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AppBundle:Offre") //il faut passer par vue
        ->findbestOffre();

        $result = $this->getRealEntities($offres);

        $response = new Response($result );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



   /* public function afficheoffrefrontAction()
    {
        //creer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("UserBundle:Offre")->findBy(array('status'=>true));//il faut passer par vue
        //   ->findAll(); //recuperer tous les modeles

        return $this->render('@Admin/offre/afficheoffrefront.html.twig', array(
            "offres" => $offres

        ));

    }*/

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
    // desabonner from offre sms
    public function desabonnerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $request->get('user_id');
        $user = $em->getRepository('AppBundle:User')->find($user);
        $user->setSubscribe(false);

        $em->merge($user);
        $em->flush();

        return  new Response("true" );


    }

    public function abonnerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $request->get('user_id');
        $tel = $request->get('tel');
        $user = $em->getRepository('AppBundle:User')->find($user);
        $user->setSubscribe(true);
        $user->setTel($tel);

        $em->merge($user);
        $em->flush();

        return  new Response("true" );


    }


    public function ratingAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $offre_id = $request->get('offre_id');
        $user_id = $request->get('user_id');
        $like = $request->get('like');

        if($like == "true"){
            $like= true ;
        }else{
            $like= false ;
        }


        $user = $em->getRepository('AppBundle:User')->find($user_id);
        $offre = $em->getRepository('AppBundle:Offre')->find($offre_id);

        $entities = $em->getRepository('AppBundle:Rating')->findOneBy(array('user'=>$user_id , 'offre'=>$offre_id));

        if (!$entities) {
            $rate = new Rating();
            $rate->setLikes($like);
            $rate->setOffre($offre);
            $rate->setUser($user);

            $em->persist($rate);
            $em->flush();

            if($like == true){
                $offre->setLikesnumber( $offre->getLikesnumber()+1);
            }else{
                $offre->setDislikesnumber( $offre->getDislikesnumber()+1);
            }

            $em->merge($offre);
            $em->flush();

            $result = $this->getRealEntities($rate);


        } else {

            if($entities->isLikes() == $like)
            {
                return new Response("false" );
            }else{

                if($like == true){
                    $offre->setLikesnumber( $offre->getLikesnumber()+1);
                    $offre->setDislikesnumber( $offre->getDislikesnumber()-1);
                    $entities->setLikes(true);
                }else{
                    $offre->setDislikesnumber( $offre->getDislikesnumber()+1);
                    $offre->setLikesnumber( $offre->getLikesnumber()-1);
                    $entities->setLikes(false);
                }
                $em->merge($entities);
                $em->merge($offre);
                $em->flush();
            }


            $result = $this->getRealEntities($entities);
        }

        $response = new Response($result );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
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
                    $produit = $e->getProduit();
                    $produit->setPrix($e->getPrixDebut());
                    $em->merge($produit);
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

}
