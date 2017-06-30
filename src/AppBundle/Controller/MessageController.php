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

            return $this->redirectToRoute('register');
        }

        $message = new Message();

        //current user's email
        $studentEmail = $session->get('studentEmail');

        //get post that user wants to send message
        $postTable = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findOneBy(array('postid' => $postId));

        //create default subject
        $subject = "I'm interested in your '". $postTable->getPosttitle(). "'.";

        //receiver user name is username of one who posts
        $receiver = "". $postTable->getStudentemail() . "";

        //get current user's information
        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentEmail));

        //get current user's username
        $sender_user_name = $userTable->getUsername();

        //get receiver's username
        $receiverTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $receiver));
        $receiver_user_name = $receiverTable->getUsername();

        //if message is longer than 0 || if message is not empty
        if(strlen($sender_message) > 0 ) {

            //store the required values to database
            $message->setReceiver($receiver);
            $message->setSender($studentEmail);
            $message->setSubject($subject);
            $message->setMessage($sender_message);
            $message->setSenderusername($sender_user_name);

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush($message);

            $error = "Your message is successfully sent.";

        }elseif(isset($sender_message)) {
            $error = "Your message shouldn't be empty";
        }

        return $this->render('gatortraders/message.html.twig',
            array('sender' => $sender_user_name, 'post' => $postTable, 'receiver' => $receiver_user_name,
                'message' => $message, 'error' => $error));
    }
}