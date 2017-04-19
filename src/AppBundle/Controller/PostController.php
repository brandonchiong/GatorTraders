<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function showAction()
    {

        /* Old code
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    // We will need to append postID in URL /{{postid}}

    /**
     * @Route("/post", name="post")

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need


        $username = $_GET["Studentemail"];
        $password = $_GET["Password"];

        $userdets = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findAll();


        foreach($userdets as $e)
        {
            if ($e->getStudentemail() == $username && $e->getPassword() == $password )
               // if (1==2)
                {

                return $this->render('gatortraders/welcome.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
                ]);

                }
        }


        return $this->render('gatortraders/postview.html.twig', array('viewUserDets' => $userdets));
    }

}
*/
        $post = new Post();
        //$post->setPosttitle("Stupid");
        //$username = $_GET["email"];
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
                        $file_destination = '/home/kkwok/public_html/gatortraders/' . $file_name_new;
                        $file_upload = 'http://sfsuse.com/~kkwok/gatortraders/' . $file_name_new;
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
        // return $this->render('gatortraders/postedFiles.html.twig');
        return $this->render('gatortraders/postview.html.twig', array('viewUserDets' => $userdets));
    }
}
