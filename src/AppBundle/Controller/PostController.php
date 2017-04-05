<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    // We will need to append postID in URL /{{postid}}
    
    /**
     * @Route("/post", name="post")
     */
    public function indexAction(Request $request)
    {
        /*
        // replace this example code with whatever you need
        return $this->render('gatortraders/postview.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
        */


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


        return $this->render('gatortraders/postview.html.twig', array('viewUserDets' => $userdets));
    }
}
