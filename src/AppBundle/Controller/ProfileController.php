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
        $postTable = $this->getDoctrine()
            ->getRepository('AppBundle:Post');

        $messageTable = $this->getDoctrine()
            ->getRepository('AppBundle:Message');


        $post_delete = $_GET["post_delete"];
        $message_delete = $_GET["message_delete"];

        $this->delete_post($post_delete);
        $this->delete_message($message_delete);

        $studentEmail = $session->get('studentEmail');



        $postQuery = $postTable->createQueryBuilder('p')
            ->where('p.studentemail = :studentEmail')
            ->setParameter('studentEmail', $studentEmail)
            ->getQuery();

        $messageQuery = $messageTable->createQueryBuilder('m')
            ->where('m.receiver = :studentEmail')
            ->setParameter('studentEmail', $studentEmail)
            ->getQuery();

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
