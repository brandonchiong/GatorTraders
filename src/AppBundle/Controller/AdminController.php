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

class AdminController extends Controller
{

    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $post_delete = $_GET['post_delete'];
        $this->delete_post($post_delete);

        if(isset($post_delete)) {
            return $this->redirectToRoute('admin');
        }
        
        return $this->render('gatortraders/admin.html.twig',
        array('viewUserDets' => $userdets));
    }

    private function delete_post($post_delete)
    {

        if($post_delete != null) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Post')->findOneBy(array('postid' => $post_delete));

            if ($entity != null){
                $em->remove($entity);
                $em->flush();
            }
        }
    }
}