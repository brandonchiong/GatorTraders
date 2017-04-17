<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;

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

        $itemid = $_GET["category"];

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        return $this->render('gatortraders/result.html.twig', array('viewUserDets' => $userdets, 'searchkey' => $itemid));

    }

}
