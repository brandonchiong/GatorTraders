<?php
/**
 * Created by PhpStorm.
 * User: Chohee
 * Date: 5/3/17
 * Time: 1:43 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;
use AppBundle\Entity\Users;

class AdminController extends Controller
{

    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {

        $session = $request->getSession();
        $adminEmail = $session->get('studentEmail');

        //when user is not admin
        if($adminEmail != "admin@mail.sfsu.edu") {
            return $this->redirectToRoute('login');
        }

        //get all the post that is in post table
        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $allUsers =  $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findAll();

        $userdets1 = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $post_delete = $_GET['post_delete'];
        $postflagId = $_GET['post_unflag'];
        $this->delete_post($post_delete);

        foreach ($userdets1 as $post) {

            if ($postflagId == $post->getPostid()) {
                $post->setFlag(0);
            }
        }

        $em2 = $this->getDoctrine()->getManager();
        $em2->flush();

        $user_delete = $_GET['user_delete'];
        $this->delete_user($user_delete);


        if(isset($post_delete)) {
            return $this->redirectToRoute('admin');
        }
        if(isset($user_delete)) {
            return $this->redirectToRoute('admin');
        }
        
        return $this->render('gatortraders/admin2.html.twig',
        array('viewUserDets' => $userdets, 'userResults' => $allUsers));
    }

    private function delete_post($post_delete)
    {

        //if post_delete button is checked
        //delete the post
        if($post_delete != null) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Post')->findOneBy(array('postid' => $post_delete));

            if ($entity != null){
                $em->remove($entity);
                $em->flush();
            }
        }
    }

    private function delete_user($user_delete)
    {
        //if post_delete button is checked
        //delete the post
        if($user_delete != null) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Users')->findOneBy(array('studentemail' => $user_delete));

            if ($entity != null){
                $em->remove($entity);
                $em->flush();
            }
        }
    }
}