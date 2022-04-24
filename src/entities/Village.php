<?php
// src/entities/Village.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="villages")
 */

class Village
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
    private $nameVillage;
    /**
     * @ORM\Column(type="string")
     */
    private $nameChef;
    /**
     * One village have Many clients. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Client", mappedBy="villages")
     */
    private $clientVillage;
    
    public function __construct(){
        
    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setNameVillage($nameVillage){
        $this -> nameVillage = $nameVillage;
    }

    public function setIdentifiantVillage($identifiantVillage){
        $this -> identifiantVillage = $identifiantVillage;
    }

    public function setClientvillage($clientVillage){
        $this -> clientVillage = $clientVillage;
    }

    public function setNameChef($nameChef){
        $this -> nameChef = $nameChef;
    }


    //guetters

    public function getId(){
        return $this -> id;
    }

    public function getNameVillage(){
        return $this -> nameVillage;
    }

    public function getIdentifiantVillage(){
        return $this -> identifiantVillage;
    }

    public function getClientvillage(){
        return $this -> clientVillage;
    }

    public function getNameChef(){
        return $this -> namechef;
    }
    
}