<?php

/**
 * Created by PhpStorm.
 * User: Mañana
 * Date: 01/12/2016
 * Time: 19:09
 */
class User
{
    var $name;
    var $surnames;
    var $password;

    /**
     * User constructor.
     * @param $name
     * @param $surnames
     * @param $password
     */
    public function __construct($name, $surnames, $password)
    {
        $this->name = $name;
        $this->surnames = $surnames;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurnames()
    {
        return $this->surnames;
    }

    /**
     * @param mixed $surnames
     */
    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}