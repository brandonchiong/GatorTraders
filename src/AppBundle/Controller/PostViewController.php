<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostViewController extends Controller
{
    // We will need to append postID in URL /{{postid}}
    
    /**

     * @Route("viewpost", name="viewpost")
     */
    public function indexAction(Request $request)
    {
        $postId = $_GET["postId"];

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();


        return $this->render('gatortraders/post.html.twig', array( 'viewUserDets' => $userdets, 'searchkey' => $postId));
    }
}
