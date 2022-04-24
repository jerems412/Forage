<?php
// src/entities/Compteur.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="compteurs")
 */

class Compteur
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
    private $numeroCompteur;
    /**
     * @ORM\Column(type="decimal")
     */
    private $CumulConsommationCompteur;
    /**
     * @ORM\Column(type="integer")
     */
    private $statutCompteur;
    /**
     * One compteur have Many consommation. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Consommation", mappedBy="compteurs")
     */
    private $consommationCompt;
    /**
     * One compteur have One abonnement. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Abonnement", inversedBy="compteurAbonnement")
     *@ORM\JoinColumn(name="id_abonnement", referencedColumnName="id")
     */
    private $abonnementCompt;
    /**
     * @ORM\Column(type="integer")
     */
    private $etatCompteur;


    public function __construct(){
        $this->abonnementCompt = new ArrayCollection();
    }
    
    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setEtatCompteur($etatCompteur){
        $this -> etatCompteur = $etatCompteur;
    }

    public function setNumeroCompteur($numeroCompteur){
        $this -> numeroCompteur = $numeroCompteur;
    }

    public function setCumulConsommationCompteur($CumulConsommationCompteur){
        $this -> CumulConsommationCompteur = $CumulConsommationCompteur;
    }

    public function setStatutCompteur($statutCompteur){
        $this -> statutCompteur = $statutCompteur;
    }

    public function setConsommationCompt($consommationCompt){
        $this -> consommationCompt = $consommationCompt;
    }

    public function setAbonnementCompt($abonnementCompt){
        $this -> abonnementCompt = $abonnementCompt;
    }

    //guetters

    public function getId($id){
        return $this -> id = $id;
    }

    public function getNumeroCompteur(){
        return $this -> numeroCompteur;
    }

    public function getCumulConsommationCompteur(){
        return $this -> CumulConsommationCompteur;
    }

    public function getStatutCompteur(){
        return $this -> statutCompteur;
    }

    public function getConsommationCompt(){
        return $this -> consommationCompt;
    }

    public function getAbonnementCompt(){
        return $this -> abonnementCompt;
    }
}