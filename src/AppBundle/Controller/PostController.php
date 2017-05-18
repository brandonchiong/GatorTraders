<?php
namespace AppBundle\Controller;
use AppBundle\UserInfo;
use AppBundle\Entity\Category;
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

        //Get all category columns from category table
        $category_table = $this->getDoctrine()
            ->getRepository('AppBundle:Category');


        //run query to exclude 'All' category
        $category_query = $category_table->createQueryBuilder('c')
            ->where('c.categoryid != :categoryid')
            ->setParameter('categoryid', 1)
            ->getQuery();
        $category_query_result = $category_query->getResult();

        //Store necessary information from post page
        $posttitle = $_POST["itemName"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $category = $_POST["category"];

        //if file is posted then store it
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
                        $file_destination = './img' . $file_name_new;
                        $file_upload = './img' . $file_name_new;
                        if(move_uploaded_file($file_tmp, $file_destination))
                        {
                            $isUploaded = true;
                        }
                    }
                }
            }
        }

        //Get current user's email
        $session = $request->getSession();
        $studentEmail = $session->get('studentEmail');

        $mysqlDate = date('Y-m-d H:i:s');
        $userTable = $this->getDoctrine()
            ->getRepository('AppBundle:Users')
            ->findOneBy(array('studentemail' => $studentEmail));


        //set values
        $post->setPosttitle($posttitle);
        $post->setDescription($description);
        $post->setCategory($category);
        $post->setPrice($price);
        $post->setImagepath($file_upload);
        $post->setDate(new \DateTime($mysqlDate));
        $post->setStudentemail($studentEmail);
        $post->setUsername($userTable->getUsername());

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);

        $template = 'base_login.html.twig';

        if($isUploaded) {
            return $this->redirectToRoute('welcome');
        }else {
            return $this->render('gatortraders/post.html.twig', array('template' => $template, 'category' => $category_query_result));
        }

        return $this->render('gatortraders/postview.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}