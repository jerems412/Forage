<?php
// src/entities/Abonnement.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="abonnements")
 */

class Abonnement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     */
    private $dateAbonnement;
    /**
     * @ORM\Column(type="string")
     */
    private $numeroAbonnement;
    /**
     * @ORM\Column(type="string")
     */
    private $descriptif;
    /**
     * One client have One abonnement. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Client", inversedBy="abonnementClient")
     *@ORM\JoinColumn(name="id_client", referencedColumnName="id")
     */
    private $clientAbonnement;
    /**
     * One compteur have One abonnement. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Compteur", mappedBy="abonnements")
     */
    private $compteurAbonnement;
    
    public function __construct(){
        $this->clientAbonnement= new ArrayCollection();
    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setDateAbonnement($dateAbonnement){
        $this -> dateAbonnement = $dateAbonnement;
    }

    public function setNumeroAbonnement($numeroAbonnement){
        $this -> numeroAbonnement = $numeroAbonnement;
    }

    public function setDescriptif($descriptif){
        $this -> descriptif = $descriptif;
    }

    public function setClientAbonnement($clientAbonnement){
        $this -> clientAbonnement = $clientAbonnement;
    }

    public function setCompteurAbonnement($compteurAbonnement){
        $this -> compteurAbonnement = $compteurAbonnement;
    }


    //getters

    public function getId(){
        return $this -> id;
    }

    public function getDateAbonnement(){
        return $this -> dateAbonnement;
    }

    public function getNumeroAbonnement(){
        return $this -> numeroAbonnement;
    }

    public function getDescriptif(){
        return $this -> descriptif;
    }

    public function getClientAbonnement(){
        return $this -> clientAbonnement;
    }

}