<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need


        $username = $_GET["Studentemail"];
        $password = $_GET["Password"];

       $userdets = $this->getDoctrine()
           ->getRepository('AppBundle:Users')
           ->findAll();


       foreach($userdets as $e)
       {
           if ($e->getStudentemail() == $username && $e->getPassword() == $password )
               // if (1==2)
           {

               return $this->render('gatortraders/welcome.html.twig', [
                   'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
               ]);

               }
       }


       return $this->render('gatortraders/login.html.twig', array('viewUserDets' => $userdets));
   }
}