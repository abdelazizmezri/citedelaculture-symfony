<?php

namespace AdminBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Reclamation;
use AppBundle\Form\reclamationType;
class ReclamationController extends Controller
{

    public function affichereclamationAction()
    {
        //creer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository("AppBundle:Reclamation") //il faut passer par vue
        ->findAll(); //recuperer tous les modeles
        return $this->render('@Admin/reclamation/affichereclamation.html.twig',array(
            "reclamations"=>$reclamations

        ));
    }

    public function verifclamationAction(Request $request,$id)
    {
        $reclamation=new Reclamation();
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository("AppBundle:Reclamation")->find($id);
        $reclamation->setStatus(true);
        $em->merge($reclamation);
        $em->flush();

        $data = array(
            'my-message' => "Votre eclamation est traite par l administratur",
        );
        $pusher = $this->get('mrad.pusher.notificaitons');
        $channel = $reclamation->getUser()->getUsername();
        $pusher->trigger($data, $channel);

// or you can keep the channel pram empty and will be broadcasted on "notifications" channel by default
        $pusher->trigger($data);


        return $this->redirectToRoute('afficherReclamation');


    }

    public function banUserAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository("AppBundle:User")->find($id);
        $user->setBan(true);
        $em->merge($user);
        $em->flush();
        return $this->redirectToRoute('afficherReclamation');
    }

    public function unbanUserAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository("AppBundle:User")->find($id);
        $user->setBan(false);
        $em->merge($user);
        $em->flush();
        return $this->redirectToRoute('afficherReclamation');
    }
}
