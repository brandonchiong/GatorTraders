<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;
use Appbundle\Entity\Category;

class WelcomeController extends Controller
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function indexAction(Request $request)
    {

        $session = $request->getSession();

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post');

        $category = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        if(isset($_GET["logout"]))
        {
            if($_GET["logout"] == 1) {
                $session->clear();
            }
        }

        print("Hello?");

        if($session->has('studentEmail')) {
            $template = 'base_login.html.twig';
        }else {
            $template = 'base.html.twig';
        }

        $query = $userdets->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC')
            ->setMaxResults(5)
            ->getQuery();

        $trainings = $query->getResult();

        print("HMM?");

        return $this->render('gatortraders/welcome.html.twig', array('viewUserDets' => $trainings, 'template' => $template, 'category' => $category));
    }
}
