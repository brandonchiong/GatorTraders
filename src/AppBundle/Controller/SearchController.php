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

        $selectCategory = $_GET["category"];
        $search_term = $_GET["search_term"];
        $session = $request->getSession();




        $category = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();


        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post');



        if ($search_term == null && $selectCategory != 'All') {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.category = :category')
                ->setParameter('category', $selectCategory)
                ->getQuery();
        } else if ($selectCategory == null || $selectCategory == 'All') {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.posttitle LIKE :search_term')
                ->setParameter('search_term', "%" . $search_term . "%")
                ->getQuery();
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
