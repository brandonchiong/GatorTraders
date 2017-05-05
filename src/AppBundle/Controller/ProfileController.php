<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Message;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    // We will need to append SID in URL /{{SID}}
    
    /**
     * @Route("/profile", name="profile")
     */
    public function indexAction(Request $request)
    {

        $session = $request->getSession();

        //Get all posts from post table
        $postTable = $this->getDoctrine()
            ->getRepository('AppBundle:Post');

        //Get all messages from message table
        $messageTable = $this->getDoctrine()
            ->getRepository('AppBundle:Message');


        //if post delete/message delete is checked, delete stuff.
        $post_delete = $_GET["post_delete"];
        $message_delete = $_GET["message_delete"];

        $this->delete_post($post_delete);
        $this->delete_message($message_delete);

        //Get current user's email
        $studentEmail = $session->get('studentEmail');

        //Run query to find posts the current user has posted.
        $postQuery = $postTable->createQueryBuilder('p')
            ->where('p.studentemail = :studentEmail')
            ->setParameter('studentEmail', $studentEmail)
            ->getQuery();

        //Run query to find all message the current user has been received
        $messageQuery = $messageTable->createQueryBuilder('m')
            ->where('m.receiver = :studentEmail')
            ->setParameter('studentEmail', $studentEmail)
            ->getQuery();

        //Find current user's information
        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentEmail));


        $postResults = $postQuery->getResult();
        $messageResults = $messageQuery->getResult();


        return $this->render('gatortraders/profile.html.twig', array(
            'postResults' => $postResults,
            'messageResults' => $messageResults,
            'userResults' => $userTable,
            'studentEmail' => $studentEmail)
        );
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

    private function delete_message($message_delete)
    {
        if($message_delete != null) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Message')->findOneBy(array('idmessage' => $message_delete));

            if ($entity != null){
                $em->remove($entity);
                $em->flush();
            }
        }
    }



}
