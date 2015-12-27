<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class UsersController extends Controller
{

    public function getUsersAction()
    {
      $em = $this->getDoctrine()->getManager();
      $users = $em->getRepository('AppBundle:User')->findAll();
      return array('users' => $users);
    }

    /**
     * @Route("/authenticate")
     * @Method("GET")
     */
    public function indexAction()
    {
      $user = $this->getUser();
      return array('item' => $user);
    }

    
}
