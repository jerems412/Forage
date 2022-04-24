<?php
namespace src\model;
use libs\system\Model;
use Client;
use Village;

class ClientDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //ajout client
    public function addClient($nameClient,$adresseClient,$telephoneClient,$villageClient,$etatClient)
    {
        $ab = new Client;
        $village = $this -> entityManager->getRepository(Village::class)->find($villageClient);
        $ab -> setNameClient($nameClient);
        $ab -> setAdresseClient($adresseClient);
        $ab -> setTelephoneClient($telephoneClient);
        $ab -> setVillageClient($village);
        $ab -> setEtatClient($etatClient);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    // lister ClientDB
    public function listClient()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM clients WHERE etatClient=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    // lister ClientDB
    public function listClient2()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM clients WHERE NOT EXISTS (SELECT * FROM clients c,abonnements a WHERE a.id_client = c.id)';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    // lister ClientDB
    public function listClient1()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT c.id,c.nameClient,c.adresseClient,c.telephoneClient,v.nameVillage FROM clients c,villages v WHERE c.id_village=v.id AND etatClient=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //clients sans factures factures
    public function SansFacture()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT c.id,c.nameClient FROM clients c,factures f WHERE c.id!=f.id_clientF';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //supprimer client
    public function deleteClient($id)
    {
        //update
        $client = $this -> entityManager->getRepository(Client::class)->find($id);
        $client->setEtatClient(0);
        $this -> entityManager -> persist($client);
        $this -> entityManager->flush();
        echo "<br>delete ! SUPER !<br>";
    }

    //lister factures du client
    public function listFactureClient($id) 
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM factures WHERE id_ClientF=:idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$id]);
        return $result -> fetchAllAssociative();
    }
    
}




?>