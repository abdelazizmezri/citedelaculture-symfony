<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@front/Default/index.html.twig');
    }

    public function afficheoffrefrontAction()
    {
        //creer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AppBundle:Offre")->findBy(array('status'=>true));//il faut passer par vue
        //   ->findAll(); //recuperer tous les modeles

        return $this->render('@Admin/offre/afficheoffrefront.html.twig', array(
            "offres" => $offres

        ));

    }
}
