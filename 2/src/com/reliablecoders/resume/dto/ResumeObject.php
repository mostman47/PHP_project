<?php
namespace dto;
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/12/14
 * Time: 12:37 PM
 */
class ResumeObject
{
    const CLASS_NAME = __CLASS__;
    private $res_id;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $skills;
    private $description;
    private $res_URL;

    function __toString()
    {
        return $this->res_id." ".$this->firstName." ".$this->lastName." ".$this->email." ".$this->phone;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $res_URL
     */
    public function setResURL($res_URL)
    {
        $this->res_URL = $res_URL;
    }

    /**
     * @return mixed
     */
    public function getResURL()
    {
        return $this->res_URL;
    }

    /**
     * @param mixed $res_id
     */
    public function setResId($res_id)
    {
        $this->res_id = $res_id;
    }

    /**
     * @return mixed
     */
    public function getResId()
    {
        return $this->res_id;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    public static function objectToObject($instance) {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen(__CLASS__),
            __CLASS__,
            strstr(strstr(serialize($instance), '"'), ':')
        ));
    }
} 