<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ResultController extends Controller
{
    //
    /**
     * @Route("/results")
     */
    public function showAction()
    {


        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();
/**
>>>>>>> dev
        //images is now an array
        $images = array();
        foreach ($userdets as $key => $userdets1)
        {
            $images[$key] = base64_encode(stream_get_contents($userdets1->getImage()));
            print $images[$key];
        }
<<<<<<< HEAD

        return $this->render('gatortraders/result.html.twig', array(
            'viewUserDets' => $userdets,
            'searchkey' => $itemid,
            'images' => $images,
        ));
=======
*/
        return $this->render('gatortraders/result.html.twig'
  //          , array('viewUserDets' => $userdets, 'searchkey' => $itemid, 'images' => $images)
        );

    }

}


