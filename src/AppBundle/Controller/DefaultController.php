<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
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
      $user->setPassword($req->get('password'));
      $userManager->updateUser($user);
      return array('user' => $user);
    }
}
