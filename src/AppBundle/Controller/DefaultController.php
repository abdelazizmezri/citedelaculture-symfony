<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AppBundle:Offre")->findBy(array('status'=>true));//il faut passer par vue
        //   ->findAll(); //recuperer tous les modeles

        return $this->render('@Admin/offre/afficheoffrefront.html.twig', array(
            "offres" => $offres

        ));
    }
}
