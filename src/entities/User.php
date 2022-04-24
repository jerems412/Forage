<?php
// src/entities/User.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

class User
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
    private $identifiantUser;
    /**
     * @ORM\Column(type="string")
     */
    private $nameUser;
    /**
     * @ORM\Column(type="string")
     */
    private $lastNameUser;
    /**
     * @ORM\Column(type="string")
     */
    private $mdpUser;
    /**
     * @ORM\Column(type="string")
     */
    private $emailUser;
    /**
     * @ORM\Column(type="integer")
     */
    private $etatUser;
    /**
     * One user have One role. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Role", inversedBy="user")
     *@ORM\JoinColumn(name="id_roles", referencedColumnName="id")
     */
    private $role;
    /**
     * @ORM\Column(type="integer")
     */
    private $nombreConnexion;
    
    public function __construct(){
        $this->role = new ArrayCollection();
    }

    //setters

    public function setId($id){
        $this ->id = $id; 
    }

    public function setIdentifiantUser($identifiantUser){
        $this -> identifiantUser = $identifiantUser;
    }

    public function setNameUser($nameUser){
        $this ->nameUser = $nameUser;
    }

    public function setLastNameUser($lastNameUser){
        $this ->lastNameUser = $lastNameUser;
    }

    public function setTelephoneUser($telephoneUser){
        $this ->telephoneUser = $telephoneUser;
    }

    public function setMdpUser($mdpUser){
        $this ->mdpUser = $mdpUser;
    }

    public function setEmailUser($emailUser){
        $this ->emailUser = $emailUser;
    }  

    public function setEtatUser($etatUser){
        $this ->etatUser = $etatUser;
    } 

    public function setRoleUser($role){
        $this ->role = $role;
    } 

    public function setNombreConnexion($nombreConnexion){
        $this ->nombreConnexion = $nombreConnexion;
    } 
    
    //guetters

    public function getId(){
        return $this ->id; 
    }

    public function getIdentifiantUser(){
        return $this -> identifiantUser;
    }

    public function getNameUser(){
        return $this ->nameUser;
    }

    public function getLastNameUser(){
        return $this ->lastNameUser;
    }

    public function getTelephoneUser(){
        return $this ->telephoneUser;
    }

    public function getMdpUser(){
        return $this ->mdpUser;
    }

    public function getEmailUser(){
        return $this ->emailUser;
    } 

    public function getEtatUser(){
        return $this ->etatUser;
    } 

    public function getNombreConnexion(){
        return $this ->nombreConnexion;
    } 

}