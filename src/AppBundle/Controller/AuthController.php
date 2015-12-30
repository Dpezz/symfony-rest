<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class AuthController extends Controller
{

/*
    public function getUsersAction()
    {
      $em = $this->getDoctrine()->getManager();
      $users = $em->getRepository('AppBundle:User')->findAll();
      return array('users' => $users);
    }
*/
    /**
     * @Route("/authenticate")
     * @Method("GET")
     */
    public function authAction()
    {
      $user = $this->getUser();
      return array('item' => $user);
    }

    /**
     * @Route("/register")
     * @Method("POST")
     */
    public function registerAction(Request $req)
    {
      $userManager = $this->get('fos_user.user_manager');
      $user = $userManager->createUser();
      $user->setUsername($req->get('username'));
      $user->setEmail($req->get('email'));
      $user->setPlainPassword($req->get('password'));
      $userManager->updateUser($user);
      return array('msg' => 'Ok', 'user' => $user);
    }

    
}
