<?php
// src/entities/Reglement.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="reglements")
 */

class Reglement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * One factures have One reglement. This is the owning side.
     *@ORM\ ManyToOne(targetEntity="Facture", inversedBy="reglementF")
     *@ORM\JoinColumn(name="id_facture", referencedColumnName="id")
     */
    private $factureRe;
    /**
     * @ORM\Column(type="integer")
     */
    private $etatReglement;
    /**
     * @ORM\Column(type="date")
     */
    private $dateReglement;

    public function __construct(){
        $this->factureRe = new ArrayCollection();
    }

    //setters

    public function setId($id){
        $this -> id = $id;
    }

    public function setFactureRe($factureRe){
        $this -> factureRe = $factureRe;
    }

    public function setDateRe($dateReglement){
        $this -> dateReglement = $dateReglement;
    }

    public function setEtatRe($etatReglement){
        $this -> etatReglement = $etatReglement;
    }
    
    //guetters
    public function getId(){
        return $this -> id;
    }

    public function getFactureRe(){
        return $this -> factureRe;
    }

    public function getDateRe(){
        return $this -> dateReglement;
    }

    public function getEtatRe(){
        return $this -> etatReglement;
    }

}