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

        $username = $_GET["email"];
        $posttitle = $_GET["itemName"];
        //$date = $_GET["date"];
        $price = $_GET["price"];
        $description = $_GET["description"];
        $category = $_GET["category"];
        //$studentemail = $_GET["studentemail"];
       // $image = $_GET["fileToUpload"];
/*
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["input-file-preview"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["input-file-preview"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["input-file-preview"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        //print tmp_name ;
        //echo input-file-preview;
        //print $target_file;

        $image=$_GET["input-file-preview"];
        print"<img src=\"$image\" width=\"100px\" height=\"100px\"\/>";

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["input-file-preview"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/
        $target_dir = "./";
        //$target_dir = "upload";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        echo getcwd(). "\n|";

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $post->setPosttitle($posttitle);
        $post->setDescription($description);
        $post->setCategory($category);
        $post->setPrice($price);
        //$post->setImagepath($image);

        //$post->upload();

        $em = $this->getDoctrine()->getManager();
// $em = $this->getDoctrine()->getRepository('AppBundle:Users');
// tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($post);

// actually executes the queries (i.e. the INSERT query)
        $em->flush($users);

        return $this->render('gatortraders/postedFiles.html.twig');
    }

    public function upload(File $file)
    {
        //generate unique filename
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        //Set other entity attribute here

        //move the file
        $targetDirectory = "http://www.sfsuse.com/~kkwok/gatortraders/web";
        $file->move($targetDirectory, $fileName);

        return $fileName;
    }
}