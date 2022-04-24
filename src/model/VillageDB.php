<?php
namespace src\model;
use libs\system\Model;
use Village;
use Client;
use src\model\ClientDB;

class VillageDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout village
    public function addVillage($nameVillage,$chefVillageV)
    {
        $ab = new Village;
        $ab -> setnameVillage($nameVillage);
        $ab -> setNameChef($chefVillageV);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister village
    public function listVillage()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM villages';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister village ges client
    public function listVillage1()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT v.id,v.nameVillage,v.nameChef FROM villages,';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //modifier village
    public function updateVillage($id,$modif1,$modif3)
    {
        //update
        $village = $this -> entityManager->getRepository(Village::class)->find($id);
        $village -> setnameVillage($modif1);
        $village -> setChefVillageV($modif3);
        $this -> entityManager -> persist($village);
        $this -> entityManager->flush();
        echo "<br>update ! SUPER !<br>";
    }


}




?>