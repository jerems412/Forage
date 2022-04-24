<?php
namespace src\model;
use libs\system\Model;
use Reglement;
use Facture;

class ReglementDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout reglement
    public function addReglement($factureRe,$etatReglement,$dateRe)
    {
        $ab = new Reglement;
        $ab -> setFactureRe($factureRe);
        $ab -> setEtatRe($etatReglement);
        $date = new \DateTime($dateRe);
        $ab -> setDateRe($dateRe);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister reglement regles
    public function listReglementR()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM reglements WHERE etatReglement=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister reglement non regles
    public function listReglementN()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM reglements WHERE etatReglement=0';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister reglement
    public function listReglement()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM reglements';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //update reglements
    public function updateReglement($id)
    {
        //update
        $facture = $this -> entityManager->getRepository(Facture::class)->find($id);
        $reglement = $this -> entityManager->getRepository(Reglement::class)->find((int)$facture -> getReglementF());
        $reglement->setEtatRe(1);
        $date = date('d-m-Y');
        $date = new \DateTime($date);
        $reglement->setDateRe($date);
        $this -> entityManager -> persist($reglement);
        $this -> entityManager->flush();
    }
}




?>