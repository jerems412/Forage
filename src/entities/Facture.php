<?php
// src/entities/Facture.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="factures")
 */

class Facture
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * One factures have One client. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Client", inversedBy="factureClient")
     *@ORM\JoinColumn(name="id_clientF", referencedColumnName="id")
     */
    private $nameClient;
    /**
     * @ORM\Column(type="date")
     */
    private $dateF;
    /**
     * @ORM\Column(type="integer")
     */
    private $prixUnitaireF;
    /**
     * One factures have One consommation. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Consommation", inversedBy="factureConso")
     *@ORM\JoinColumn(name="id_consommationF", referencedColumnName="id")
     */
    private $consommationF;
    /**
     * One factures have One reglement. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Reglement", mappedBy="factures")
     */
    private $reglementF;
    /**
     * @ORM\Column(type="integer")
     */
    private $etatF;
    
    public function __construct(){
        $this->consommationF = new ArrayCollection();
        $this->nameClient = new ArrayCollection();
    }

    //settters

    public function setId($id){
        $this -> id = $id;
    }

    public function setNameClient($nameClient){
        $this -> nameClient = $nameClient;
    }

    public function setDateF($dateF){
        $this -> dateF = $dateF;
    }

    public function setPrixUnitaireF($prixUnitaireF){
        $this -> prixUnitaireF = $prixUnitaireF;
    }

    public function setConsommationF($consommationF){
        $this -> consommationF = $consommationF;
    }

    public function setReglementF($reglementF){
        $this -> reglementF = $reglementF;
    }

    public function setEtatF($etatF){
        $this -> etatF = $etatF;
    }

    //gutters

    public function getId(){
        return $this -> id;
    }

    public function getNameClient(){
        return $this -> nameClient;
    }

    public function getDateF(){
        return $this -> dateF;
    }

    public function getPrixUnitaireF(){
        return $this -> prixUnitaireF;
    }
    
    public function getConsommationF(){
        return $this -> consommationF;
    }

    public function getReglementF(){
        return $this -> reglementF;
    }

    public function etatF(){
        return $this -> etatF;
    }

}