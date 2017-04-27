<?php
namespace AppBundle\Controller;

use AppBundle\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function showAction(Request $request)
    {

        $post = new Post();

        $posttitle = $_POST["itemName"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $category = $_POST["category"];

        if(isset($_FILES['file']))
        {
            $file = $_FILES['file'];
            //print_r($file);
            // File properties
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            //Working out the file extentions
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
                        $file_destination = '/home/sp17g07/public_html/gatortraders/images/' . $file_name_new;
                        $file_upload = 'http://sfsuse.com/~sp17g07/gatortraders/images/' . $file_name_new;
                        if(move_uploaded_file($file_tmp, $file_destination))
                        {
                            echo 'file has been succesffuly uploaded';
                        }
                    }
                }
            }
        }

        $post->setPosttitle($posttitle);
        $post->setDescription($description);
        $post->setCategory($category);
        $post->setPrice($price);
        $post->setImagepath($file_upload);


        //$post->upload();
        $em = $this->getDoctrine()->getManager();
// $em = $this->getDoctrine()->getRepository('AppBundle:Users');
// tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($post);
// actually executes the queries (i.e. the INSERT query)
        $em->flush($post);
        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $template = 'base_login.html.twig';

        // return $this->render('gatortraders/postedFiles.html.twig');
        return $this->render('gatortraders/postview.html.twig', array('template' => $template));
    }
}
