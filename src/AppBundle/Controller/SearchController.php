<?php

namespace AppBundle\Controller;
use AppBundle\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\User;
use AppBundle\Entity\Post;
use Appbundle\Entity\Category;

class SearchController extends Controller
{
    /**
     * @Route("/results")
     */
    public function showAction(Request $request)
    {
        $postflagId =  $_GET["postId"];

        $userdets1 = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        foreach ($userdets1 as $post) {

            if ($postflagId == $post->getPostid()) {
                $post->setFlag(1);
                print $post->getFlag();
                print $post->getPosttitle();
            }
        }

        $em2 = $this->getDoctrine()->getManager();
        $em2->flush();
        
        //Set filter
        $selectCategory = $_GET["category"];
        $search_term = $_GET["search_term"];

        $session = $request->getSession();

        //Get all columns from category table
        $category = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        //Get all post columns from post table
        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post');

        //if search tem is not defined and category is something other than All
        if ($search_term == null && $selectCategory != 'All') {

            //Run query to find that is matching with given category field
            $query = $userdets->createQueryBuilder('p')
                ->where('p.category = :category')
                ->setParameter('category', $selectCategory)
                ->getQuery();

        //if search category is 'All' or is not defined and search term is defined
        } else if ($selectCategory == null || $selectCategory == 'All') {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.posttitle LIKE :search_term')
                ->setParameter('search_term', "%" . $search_term . "%")
                ->getQuery();
        //if search category is defined and search term is defined
        } else {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.category = :category')
                ->andWhere('p.posttitle LIKE :search_term')
                ->setParameter('category', $selectCategory)
                ->setParameter('search_term', "%" . $search_term . "%")
                ->getQuery();
        }
        $trainings = $query->getResult();


        if($session->has('studentEmail')) {
            $template = 'base_login.html.twig';
        }else {
            $template = 'base.html.twig';
        }
        return $this->render('gatortraders/result.html.twig',
            array('viewUserDets' => $trainings, 'category' => $category, 'search_term' => $search_term, 'template' => $template));
    }
}