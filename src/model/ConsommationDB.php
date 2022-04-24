<?php
namespace src\model;
use libs\system\Model;
use Consommation;
use Compteur;

class ConsommationDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout compteur
    public function addConsommation($moisConsommation,$consommationC,$consommationCL,$idCompteur)
    {
        $ab = new Consommation;
        //$newdate= date('', strtotime($moisConsommation));
        $ab -> setMoisConsommation($moisConsommation);
        $ab -> setConsommationC($consommationC);
        $ab -> setConsommationCL($consommationCL);
        $compteur = $this -> entityManager->getRepository(Compteur::class)->find($idCompteur);
        $ab -> setCompteurConso($compteur);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister consommation
    public function listConsommation()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT c.id,c.moisConsommation,c.consommationC,c.consommationCL FROM consommations c, factures f WHERE c.id!=f.id_consommationF';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //modifier consommation
    public function updateConsommation($id,$modif1,$modif2)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM consommations';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        $tab = $result -> fetchAllAssociative();
        //update
        $consommation = $this -> entityManager->getRepository(Consommation::class)->find($tab[0]['id']);
        $consommation -> setConsommationCL($modif1);
        $consommation -> setConsommationC($modif2);
        $this -> entityManager -> persist($consommation);
        $this -> entityManager->flush();
        echo "<br>update ! SUPER !<br>";
    }
}




?>