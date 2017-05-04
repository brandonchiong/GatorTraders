<?php
namespace AppBundle\Entity;
/**
 * Post
 */
class Post
{
    /**
     * @var integer
     */
    private $postid;
    /**
     * @var string
     */
    private $posttitle;
    /**
     * @var string
     */
    private $price = '0';
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $category;
    /**
     * @var string
     */
    private $studentemail;
    /**
     * @var string
     */
    private $imagepath;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * Get postid
     *
     * @return integer
     */
    public function getPostid()
    {
        return $this->postid;
    }
    /**
     * Set posttitle
     *
     * @param string $posttitle
     *
     * @return Post
     */
    public function setPosttitle($posttitle)
    {
        $this->posttitle = $posttitle;
        return $this;
    }
    /**
     * Get posttitle
     *
     * @return string
     */
    public function getPosttitle()
    {
        return $this->posttitle;
    }
    /**
     * Set price
     *
     * @param string $price
     *
     * @return Post
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Set category
     *
     * @param string $category
     *
     * @return Post
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Set studentemail
     *
     * @param string $studentemail
     *
     * @return Post
     */
    public function setStudentemail($studentemail)
    {
        $this->studentemail = $studentemail;
        return $this;
    }
    /**
     * Get studentemail
     *
     * @return string
     */
    public function getStudentemail()
    {
        return $this->studentemail;
    }
    /**
     * Set imagepath
     *
     * @param string $imagepath
     *
     * @return Post
     */
    public function setImagepath($imagepath)
    {
        $this->imagepath = $imagepath;
        return $this;
    }
    /**
     * Get imagepath
     *
     * @return string
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var string
     */
    private $username;
<<<<<<< HEAD

=======
>>>>>>> 964ce20e17900df55db3edbae07397715a271a2e
    /**
     * Set username
     *
     * @param string $username
     *
     * @return Post
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}