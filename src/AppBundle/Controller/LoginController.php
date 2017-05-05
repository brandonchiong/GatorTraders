<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
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

        $user = new Users();

        //Create form
        $form = $this->createForm(UserType::class, $user);


        //get student email and password from html
        $studentemail = $_GET["Studentemail"];
        $password = $_GET["Password"];


        $adminEmail = "admin@mail.sfsu.edu";
        $adminPassword = "p3tkovicrocks";


        //if the email and password are matched then direct to admin page
        if($studentemail == $adminEmail and $password == $adminPassword) {
            $session = $request->getSession(); //add this line
            $session->set('studentEmail', $studentemail); ///
            return $this->redirectToRoute('admin');
        }


        //initial error
        $error = "";


        //Find user that matches with input studentemail
        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentemail));



        //if userTable returns something and password matches then login succeed!
        if($userTable != null) {

            $userpassword = $userTable->getPassword();

            if($userpassword == $password) {

                $session = $request->getSession();
                $session->set('studentEmail', $studentemail);

                return $this->redirectToRoute('welcome');
            }

        }elseif(isset($studentemail) and isset($password)) {
            $error = 'Invalid user name and password';
        }


        return $this->render(
            'gatortraders/registration.html.twig'
            ,array('form' => $form->createView(), 'loginError'=> $error
            )
        );
        //return $this->redirectToRoute('register', array('loginError' => $error));
   }
}