<?php
// src/entities/Consommation.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="consommations")
 */

class Consommation
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
    private $moisConsommation;
    /**
     * @ORM\Column(type="decimal")
     */
    private $consommationC;
    /**
     * @ORM\Column(type="string")
     */
    private $consommationCL;
    /**
     * Many consommation have One compteur. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Compteur", inversedBy="consommationCompt")
     *@ORM\JoinColumn(name="id_compteur", referencedColumnName="id")
     */
    private $compteurConso;
    /**
     * One consommation have One facture. This is the owning side.
     *@ORM\ OneToMany(targetEntity="Facture", mappedBy="consommations")
     */
    private $factureConso;
    
    public function __construct(){
        $this->compteurConso = new ArrayCollection();
    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setMoisConsommation($moisConsommation){
        $this -> moisConsommation = $moisConsommation;
    }

    public function setConsommationC($consommationC){
        $this -> consommationC = $consommationC;
    }

    public function setConsommationCL($consommationCL){
        $this -> consommationCL = $consommationCL;
    }

    public function setCompteurConso($compteurConso){
        $this -> compteurConso = $compteurConso;
    }

    public function setFactureConso($factureConso){
        $this -> factureConso = $factureConso;
    }

    //guetters

    public function getId(){
        return $this -> id;
    }

    public function getMoisConsommation(){
        return $this -> moisConsommation;
    }

    public function getConsommationC(){
        return $this -> consommationC;
    }

    public function getConsommationCL(){
        return $this -> consommationCL;
    }

    public function getCompteurConso(){
        return $this -> compteurConso;
    }

    public function getFactureConso(){
        return $this -> factureConso;
    }

}