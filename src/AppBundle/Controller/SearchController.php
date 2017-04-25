<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    /**
     * @Route("/results")
     */
    public function showAction()
    {

        $category = $_GET["category"];
        $search_term = $_GET["search_term"];


        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post');


        if ($search_term == null) {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.category = :category')
                ->setParameter('category', $category)
                ->getQuery();
        } else if ($category == null) {
            $query = $userdets->createQueryBuilder('p')
                ->where('p.posttitle LIKE :search_term')
                ->setParameter('search_term', "%" . $search_term . "%")
                ->getQuery();
        } else {

            $query = $userdets->createQueryBuilder('p')
                ->where('p.category = :category')
                ->andWhere('p.posttitle LIKE :search_term')
                ->setParameter('category', $category)
                ->setParameter('search_term', "%" . $search_term . "%")
                ->getQuery();
        }

        $trainings = $query->getResult();

        return $this->render('gatortraders/result.html.twig',
            array('viewUserDets' => $trainings, 'category' => $category, 'search_term' => $search_term));

    }

}
