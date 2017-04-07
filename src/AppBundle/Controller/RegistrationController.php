<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function indexAction(Request $request)
    {
        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findAll();

            $username = $_GET["email"];
            $first_name = $_GET["first_name"];
            $last_name = $_GET["last_name"];
            $password = $_GET["password"];

                print "Hello";

            $users = new Users();

            $users->setStudentemail($username);
            $users->setFirstName($first_name);
            $users->setLastName($last_name);
            $users->setPassword($password);
            $users->setRating(5);
            $users->setVerification("1");

            $em = $this->getDoctrine()
                //     ->getRepository('AppBundle:Users')
                ->getManager();

            $em->persist($users);
            //$em->flush();

        // replace this example code with whatever you need
        return $this->render('gatortraders/registration.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

}
