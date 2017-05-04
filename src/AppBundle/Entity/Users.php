<?php

namespace AppBundle\Entity;

/**
 * Users
 */
class Users
{
    /**
     * @var integer
     */
    private $studentid;

    /**
     * @var string
     */
    private $studentemail;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $username;


    /**
     * Get studentid
     *
     * @return integer
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set studentemail
     *
     * @param string $studentemail
     *
     * @return Users
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
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Users
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

