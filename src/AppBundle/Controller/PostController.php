<?php
namespace AppBundle\Controller;

use AppBundle\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;
use Symfony\Component\Validator\Constraints\DateTime;

class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function showAction(Request $request)
    {

        $post = new Post();

        $isUploaded = false;

        $posttitle = $_POST["itemName"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $category = $_POST["category"];

        if(isset($_FILES['file']))
        {
            $file = $_FILES['file'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $allowed = array('jpg', 'png', 'jpeg');
            if(in_array($file_ext, $allowed))
            {
                if($file_error ===0)
                {
                    if($file_size <= 2097152)
                    {
                        $file_name_new = uniqid('', true) . '.' .  $file_ext;
                        $file_destination = '/home/ckim4/public_html/gatortraders/images/' . $file_name_new;
                        $file_upload = 'http://sfsuse.com/~ckim4/gatortraders/images/' . $file_name_new;
                        if(move_uploaded_file($file_tmp, $file_destination))
                        {
                            $isUploaded = true;
                        }
                    }
                }
            }
        }


        $session = $request->getSession();
        $studentEmail = $session->get('studentEmail');

        $mysqlDate = date('Y-m-d H:i:s');


        $post->setPosttitle($posttitle);
        $post->setDescription($description);
        $post->setCategory($category);
        $post->setPrice($price);
        $post->setImagepath($file_upload);
        $post->setDate(new \DateTime($mysqlDate));
        $post->setStudentemail($studentEmail);


        //$post->upload();
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush($post);

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $template = 'base_login.html.twig';

        if($isUploaded) {
            return $this->render('gatortraders/welcome.html.twig', array('template' => $template));

        }else {
            return $this->render('gatortraders/postview.html.twig', array('template' => $template));
        }
    }
}
