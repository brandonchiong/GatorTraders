<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Users;

class RegistrationSubmitController extends Controller
{
    /**
     * @Route("/welcome2")
     */
    public function showAction()
    {
        $first_name = $_GET["first_name"];
        $last_name = $_GET["last_name"];
        $password = $_GET["password"];

 print($first_name. "\n". $last_name. "\n". $password);

        $users = new Users();
        $users->setFirstname($first_name);
        $users->setPassword($password);
        $users->setLastname($last_name);
        $users->setVerification(1);
        $users->setRating(5);
        $users->setStudentemail("Hello");

        print($users->getFirstname());
        print($users->getLastname());
        print($users->getPassword());

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($users);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        //em.getTransaction().commit();

        return $this->render('gatortraders/accountCreate.html.twig');
    }
}