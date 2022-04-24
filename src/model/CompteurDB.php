<?php
namespace src\model;
use libs\system\Model;
use Compteur;
use Abonnement;

class CompteurDB extends Model
{
    public function __construct()
    {
        parent::__construct();
        //echo "ok";
    }
  
    //ajout compteur
    public function addCompteur($numeroCompteur,$cumulConsommationCompteur,$idA)
    {
        $abonnement = $this -> entityManager->getRepository(Abonnement::class)->find((int)$idA);
        $ab = new Compteur;
        $ab -> setNumeroCompteur($numeroCompteur);
        $ab -> setCumulConsommationCompteur($cumulConsommationCompteur);
        $ab -> setStatutCompteur(1);
        $ab -> setAbonnementCompt($abonnement);
        $ab -> setEtatCompteur(1);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //update compteur
    public function UpdateCompteur($idC,$idA)
    {
        $ab = new Compteur;
        $ab -> setId((int)$idC);
        $abonnement = $this -> entityManager->getRepository(Abonnement::class)->find((int)$idA);
        $ab -> setAbonnementCompt($abonnement);
        //$compteur -> setAbonnementCompt($abonnement);
        $ab -> setEtatCompteur(1);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister compteur bloquer
    public function listCompteurB()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM compteurs WHERE statutCompteur=0';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister compteur non bloquer
    public function listCompteurN()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM compteurs WHERE statutCompteur=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //bloquer Compteur
    public function deleteCompteur($id)
    {
        //update
        $compteur = $this -> entityManager->getRepository(Compteur::class)->find($id);
        $compteur->setEtatClient(0);
        $this -> entityManager -> persist($compteur);
        $this -> entityManager->flush();
        echo "<br>delete ! SUPER !<br>";
    }

    //lister consommation du compteurs
    public function listConsommationCompteur($id)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT moisConsommation,consommationC,consommationCL FROM consommations WHERE id = :idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$id]);
        return $result -> fetchAllAssociative();
    }

    //lister du compteurs
    public function listCompteur1()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT c.id,c.numeroCompteur FROM compteurs c,abonnements a WHERE a.id = c.id_abonnement AND etatCompteur=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister du compteurs
    public function listCompteur()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM compteurs';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

}




?>