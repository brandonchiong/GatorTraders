<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
/*
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
*/

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

       // print($first_name. "\n". $last_name. "\n". $password);

        $users = new Users();
        $users->setFirstname($first_name);
        $users->setPassword($password);
        $users->setLastname($last_name);

        print( $users->getFirstname());
        print( $users->getPassword());
        print( $users->getLastname());
        $em = $this->getDoctrine()->getManager();
       // $em = $this->getDoctrine()->getRepository('AppBundle:Users');
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($users);

        // actually executes the queries (i.e. the INSERT query)
        //$em->flush();
        //em.getTransaction().commit();
        //return new Response('Thanks '.$users->getFirstname());

        return $this->render('gatortraders/registration.html.twig', array('viewUserDets' => $userdets));
    }

}
