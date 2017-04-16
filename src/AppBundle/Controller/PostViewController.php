<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostViewController extends Controller
{
    // We will need to append postID in URL /{{postid}}
    
    /**
     * @Route("/post/view/", name="viewpost")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('gatortraders/post.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
