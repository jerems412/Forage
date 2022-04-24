<?php
// src/entities/Role.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */

class Role
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nameRole;
    /*** One role have Many users.
     * @ORM\ManyToOne(targetEntity="User", mappedBy="roles")
     */
    private $user;

    public function __construct(){

    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setNameRole($nameRole){
        $this -> nameRole = $nameRole;
    }

    public function setUser($user){
        $this -> user = $user;
    }
    
    //guetters

    public function getId(){
        return $this -> id;
    }

    public function getNameRole(){
        return $this -> nameRole;
    }

    public function getUser(){
        return $this -> user;
    }
    
}