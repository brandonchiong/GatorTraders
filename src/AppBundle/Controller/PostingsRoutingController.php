<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostingsRoutingController extends Controller
{
    /**
     * @Route("/postItems2", name="postItems2")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('gatortraders/postItems.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
