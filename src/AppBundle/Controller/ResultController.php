<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Table1;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ResultController extends Controller
{
    /**
     * @Route("/results")
     */
    public function showAction()
    {
        $postId = $_GET["postId"];
        $itemid = $_GET["name"];

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Table1')
            ->findAll();

        $userdets1 = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        foreach ($userdets1 as $post) {

            if ($postId == $post->getPostid()) {
                $post->setFlag(1);
                print $post->getFlag();
                print $post->getPosttitle();
            }
        }


        $em2 = $this->getDoctrine()->getManager();
        //$em2->persist($userdets1);
        $em2->flush();
        return $this->render('gatortraders/result.html.twig', array('viewUserDets' => $userdets, 'searchkey' => $itemid));

    }

}
