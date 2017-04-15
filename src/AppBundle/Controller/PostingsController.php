<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Post;
use AppBundle\Entity\Users;
use AppBundle\Entity\Test;

class PostingsController extends Controller
{
    /**
     * @Route("/postItems")
     */
    public function showAction()
    {
        /*
        $users = new Users();
        $users->setFirstname("Stupid");
        $users->setPassword("wasssuh");
        $users->setLastname("wusuuhh");
        $users->setVerification(1);
        $users->setRating(5);
        $users->setStudentemail("Hello");
        */
        $post = new Post();
        $users = new Users();
        //$post->setPosttitle("Stupid");
        /*
        $username = $_GET["email"];
        $posttitle = $_GET["itemName"];
        //$date = $_GET["date"];
        $price = $_GET["price"];
        $description = $_GET["description"];
        $category = $_GET["category"];
        //$studentemail = $_GET["studentemail"];
        */

        //base64_encode(stream_get_contents($userdets1->getImage()))

        print "hello";
        $image = $_GET["input-file-preview"];
        print $image;
        print base64_encode(stream_get_contents($image));
        //print file_get_contents($_FILES[$image]);
        //print base64_encode($data);
        //print $image;
       /*
        //$im = file_get_contents($image);
        //$imdata = base64_encode($im);
        //print $imdata;

        $allowed_ext= array('jpg','jpeg','png','gif');
        $file_name =$_FILES['image']['name'];
        //   $file_name =$_FILES['image']['tmp_name'];
        $file_ext = strtolower( end(explode('.',$file_name)));


        $file_size=$_FILES['image']['size'];
        $file_tmp= $_FILES['image']['tmp_name'];
        echo $file_tmp;echo "<br>";

        $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
        $data = file_get_contents($file_tmp);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //echo "Base64 is ".$base64;
        echo $data;
*/
        $post->setPosttitle($posttitle);
        $post->setDescription($description);
        $post->setCategory($category);
        $post->setPrice($price);
        $post->setImage($image);

        $em = $this->getDoctrine()->getManager();
// $em = $this->getDoctrine()->getRepository('AppBundle:Users');
// tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($post);

// actually executes the queries (i.e. the INSERT query)
        $em->flush($users);

        return $this->render('gatortraders/postedFiles.html.twig');
    }
}