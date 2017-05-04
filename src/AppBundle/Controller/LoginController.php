<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;

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

        $adminEmail = "admin@mail.sfsu.edu";
        $adminPassword = "p3tkovicrocks";

        if($username == $adminEmail and $password == $adminPassword) {
            return $this->redirectToRoute('admin');
        }


        $error = "";

        $userdets = $this->getDoctrine()
           ->getRepository('AppBundle:Users')
           ->findAll();


       foreach($userdets as $e)
       {
           if ($e->getStudentemail() == $username && $e->getPassword() == $password )
               // if (1==2)
           {
               $session = $request->getSession();

               $session->set('studentEmail', $username);

               return $this->redirectToRoute('welcome');

           }elseif(isset($username) and isset($password)){
               $error = 'Invalid user name and password';
           }
        }

       return $this->render('gatortraders/login.html.twig', array('viewUserDets' => $userdets, 'error' => $error));
   }
}