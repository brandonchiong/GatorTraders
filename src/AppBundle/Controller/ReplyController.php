<?php
/**
 * Created by PhpStorm.
 * User: Chohee
 * Date: 5/3/17
 * Time: 12:16 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Message;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReplyController extends Controller
{

    /**
     * @Route("/reply", name="reply")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        $message = new Message();
        $studentEmail = $session->get('studentEmail');
        $error = "";

        $idMessage = $_GET['message_replay'];
        $subject = $_GET['subject'];
        $sender_message = $_GET['sender_message'];

        $messageTable = $this->getDoctrine()
            ->getRepository('AppBundle:Message')
            ->findOneBy(array('idmessage' => $idMessage));

        //get current user's information
        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentEmail));

        //get current user's username
        $sender_user_name = $userTable->getUsername();


        //whoever sends the message is the receiver
        $receiver = $messageTable->getSender();


        if(strlen($sender_message) > 0 ) {


            $message->setReceiver($receiver);
            $message->setSender($studentEmail);
            $message->setSubject($subject);
            $message->setMessage($sender_message);
            $message->setSenderusername($sender_user_name);

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush($message);

            $error = "Your message is successfully sent.";


        }elseif(isset($subject)) {
            $error = "Your subject shouldn't be empty.";
            if (isset($sender_message))
                $error .= "\r\nYour message shouldn't be empty";
        }


        return $this->render('gatortraders/reply.html.twig',
            array('idMessage' => $idMessage
                , 'senderUsername' =>$sender_user_name
                , 'messageTable' => $messageTable
                , 'error' => $error
            ));


    }
}