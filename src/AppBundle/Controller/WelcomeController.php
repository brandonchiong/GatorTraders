<?php

namespace AppBundle\Controller;

use AppBundle\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\User;

class WelcomeController extends Controller
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function indexAction(Request $request)
    {

       // $session = $this->get('session');

        $session = $request->getSession();

        if(isset($_GET["logout"]))
        {
            if($_GET["logout"] == 1) {
                $session->clear();
            }
        }


        if($session->has('studentEmail')) {
            $template = 'base_login.html.twig';
        }else {
            $template = 'base.html.twig';
        }


        // replace this example code with whatever you need
        return $this->render('gatortraders/welcome.html.twig', array('template' => $template));
    }
}
