<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Users;


class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function indexAction(Request $request)
    {

        $user = new Users();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setVerification(false);
            $userEmail = $user->getStudentemail();
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();

            if($em->getRepository('AppBundle\Entity\Users')->findOneBy(array('studentemail' => $userEmail)) != null) {
                print("The email existed already");

                return $this->render(
                    'gatortraders/registration.html.twig'
                    ,array('form' => $form->createView())
                );
            };



            $em->persist($user);
          //  $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            print($user->getStudentemail());

            return $this->redirectToRoute('welcome');
        }

        return $this->
        render('gatortraders/registration.html.twig'
        ,array('form' => $form->createView())
        );
    }

}
