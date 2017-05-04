<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;

class PostViewController extends Controller
{
    // We will need to append postID in URL /{{postid}}
    
    /**
     * @Route("viewpost", name="viewpost")
     */
    public function indexAction(Request $request)
    {

        $postId = $_GET["postId"];
        $session = $request->getSession();

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();


        if($session->has('studentEmail')) {
            $template = 'base_login.html.twig';
        }else {
            $template = 'base.html.twig';
        }


        return $this->render('gatortraders/post.html.twig', array( 'viewUserDets' => $userdets, 'searchkey' => $postId, 'template' => $template));

    }
}
