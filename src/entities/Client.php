<?php
// src/entities/Client.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="clients")
 */

class Client
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
    private $nameClient;
    /**
     * @ORM\Column(type="string")
     */
    private $adresseClient;
    /**
     * @ORM\Column(type="string")
     */
    private $telephoneClient;
    /**
     * Many clients have One village. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Village", inversedBy="clientVillage")
     *@ORM\JoinColumn(name="id_Village", referencedColumnName="id")
     */
    private $villageClient;
    /**
     * One abonnement have One client. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Abonnement", mappedBy="clients")
     */
    private $abonnementClient;
    /**
     * @ORM\Column(type="integer")
     */
    private $etatClient;
    /**
     * One village have One client. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Facture", mappedBy="clients")
     */
    private $factureClient;

    
    public function __construct(){
        $this->villageClient = new ArrayCollection();
    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setNameClient($nameClient){
        $this -> nameClient = $nameClient;
    }

    public function setFactureClient($factureClient){
        $this -> factureClient = $factureClient;
    }

    public function setAdresseClient($adresseClient){
        $this -> adresseClient = $adresseClient;
    }

    public function setTelephoneClient($telephoneClient){
        $this -> telephoneClient = $telephoneClient;
    }

    public function setVillageClient($villageClient){
        $this -> villageClient = $villageClient;
    }

    public function setChefVillageC($chefVillageC){
        $this -> chefVillageC = $chefVillageC;
    }

    public function setAbonnementClient($abonnementClient){
        $this -> abonnementClient = $abonnementClient;
    }

    public function setEtatClient($etatClient){
        $this -> etatClient = $etatClient;
    }

    //guetters

    public function getId(){
        return $this -> id;
    }

    public function getNameClient(){
        return $this -> nameClient;
    }

    public function getAdresseClient(){
        return $this -> adresseClient;
    }

    public function getTelephoneClient(){
        return $this -> telephoneClient;
    }

    public function getVillageClient(){
        return $this -> villageClient;
    }

    public function getChefVillageC(){
        return $this -> chefVillageC;
    }

    public function getAbonnementClient(){
        return $this -> abonnementClient;
    }
    
    public function getEtatClient(){
        return $this -> etatClient;
    }
}