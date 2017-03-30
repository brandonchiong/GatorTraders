<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    // We will need to append SID in URL /{{SID}}
    
    /**
     * @Route("/profile", name="profile")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('gatortraders/profile.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
