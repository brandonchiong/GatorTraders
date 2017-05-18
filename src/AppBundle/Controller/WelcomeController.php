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
        $postflagId =  $_GET["postId"];
        $session = $request->getSession();

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post');


        $userdets1 = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        /*
                $postTable = $this->getDoctrine()
                    ->getRepository('AppBundle:Post')
                    ->findOneBy(array('postid' => $postId));
        */

        foreach ($userdets1 as $post) {

            if ($postflagId == $post->getPostid()) {
                $post->setFlag(1);
                print $post->getFlag();
                print $post->getPosttitle();
            }
        }


        $em2 = $this->getDoctrine()->getManager();
        $em2->persist();
        $em2->flush($userdets1);
        //Get all columns from Category
        $category = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();
        //if user click logout, session is cleared
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
        //Run query to get five most recent posted posts.
        $query = $userdets->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC')
            ->setMaxResults(5)
            ->getQuery();
        $trainings = $query->getResult();
        return $this->render('gatortraders/welcome.html.twig',
            array('viewUserDets' => $trainings, 'template' => $template,
                'category' => $category));
    }
}
