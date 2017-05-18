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

        $itemid = $_GET["name"];

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Table1')
            ->findAll();

        return $this->render('gatortraders/result.html.twig', array('viewUserDets' => $userdets, 'searchkey' => $itemid));

    }

}
