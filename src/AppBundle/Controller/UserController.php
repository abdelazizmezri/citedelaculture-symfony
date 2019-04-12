<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/admin/role", name="roleUsers")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("AppBundle:User")->findAll();//il faut passer par vue
        //   ->findAll(); //recuperer tous les modeles

        return $this->render('@App/users/allUsers.html.twig', array(
            "users" => $users

        ));
    }

    /**
     * @Route("/admin/role/{id}", name="changeRole")
     */
    public function ChangeRoleAction(Request $request , $id)
    {
        $currentUser = $this->getUser();
        if(! $currentUser->hasRole("ROLE_ADMIN")){
            $this->redirectToRoute("admin_homepage");
        }
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("AppBundle:User")->find($id);//il faut passer par vue
        $currentRole = $user->getRoles();
     //   var_dump($currentRole[0]);
     //   die();

        if($request->getMethod()=="POST"){
            $role = $request->get('role');
            $user->removeRole($currentRole[0]);
            $user->addRole($role);
            $em->merge($user);
            $em->flush();
        return $this->redirectToRoute("roleUsers");

        }
        return $this->render('@App/users/changeRole.html.twig', array(
            "user" => $user->getId(),
            'role' => $currentRole[0]

        ));
    }
}
