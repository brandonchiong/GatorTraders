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
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */

    private $category;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $studentemail;


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
     * Set price
     *
     * @param float $price
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
     * @return float
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
     * @param \AppBundle\Entity\Users $studentemail
     *
     * @return Post
     */
    public function setStudentemail(\AppBundle\Entity\Users $studentemail = null)
    {
        $this->studentemail = $studentemail;

        return $this;
    }

    /**
     * Get studentemail
     *
     * @return \AppBundle\Entity\Users
     */
    public function getStudentemail()
    {
        return $this->studentemail;
    }

    /**
     * @var \AppBundle\Entity\Users
     */
    private $studentid;


    /**
     * Set studentid
     *
     * @param \AppBundle\Entity\Users $studentid
     *
     * @return Post
     */
    public function setStudentid(\AppBundle\Entity\Users $studentid = null)
    {
        $this->studentid = $studentid;

        return $this;
    }

    /**
     * Get studentid
     *
     * @return \AppBundle\Entity\Users
     */
    public function getStudentid()
    {
        return $this->studentid;
    }
    /**
     * @var string
     */
    private $imagepath;

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
}
