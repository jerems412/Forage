<?php
namespace src\model;

use Abonnement;
use libs\system\Model;
use Client;
require_once "libs/system/Model.php";

class AbonnementDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //ajout abonnement
    public function addAbonnement($dateA,$numA,$desc,$idClient)
    {
        $client = $this -> entityManager->getRepository(Client::class)->find($idClient);
        $ab = new Abonnement;
        $date = new \DateTime($dateA);
        $ab -> setDateAbonnement($date);
        $ab -> setNumeroAbonnement($numA);
        $ab -> setDescriptif($desc);
        $ab -> setClientAbonnement($client);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister abonnements
    public function listAbonnement()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT a.id,a.dateAbonnement,a.numeroAbonnement,a.descriptif,cc.nameClient FROM abonnements a, clients cc WHERE a.id_client=cc.id';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister abonnements
    public function listAbonnement1()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT a.numeroAbonnement FROM abonnements a, compteurs c WHERE c.id_abonnement != a.id';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }
    
}




?>