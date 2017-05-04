<?php
/**
 * Created by PhpStorm.
 * User: Chohee
 * Date: 5/2/17
 * Time: 5:35 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;
use AppBundle\Entity\Message;
use AppBundle\Entity\Category;

class MessageController extends Controller
{

    /**
     * @Route("/message", name="message")
     */
    public function indexAction(Request $request)
    {

        $session = $request->getSession();

        $sender_message = $_GET["sender_message"];
        $postId = $_GET["postId"];
        $error = "";


        if(!$session->has('studentEmail')) {

            return $this->render('gatortraders/login.html.twig');
        }

        $message = new Message();

        $studentEmail = $session->get('studentEmail');


        $postTable = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findOneBy(array('postid' => $postId));

        $subject = "I'm interested in your '". $postTable->getPosttitle(). "'.";
        $receiver = "". $postTable->getStudentemail() . "";

        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentEmail));

        $receiver_user_name = $userTable->getUsername();



        if(strlen($sender_message) > 0 ) {

            $message->setReceiver($receiver);
            $message->setSender($studentEmail);
            $message->setSubject($subject);
            $message->setMessage($sender_message);

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush($message);

            $error = "Your message is successfully sent.";

        }elseif(isset($sender_message)) {
            $error = "Your message shouldn't be empty";
        }


        return $this->render('gatortraders/message.html.twig',
            array('sender' => $studentEmail, 'post' => $postTable,
                'message' => $message, 'error' => $error, 'username' => $receiver_user_name));

    }
}