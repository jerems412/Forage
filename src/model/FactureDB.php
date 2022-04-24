<?php
namespace src\model;
use libs\system\Model;
use Facture;
use Client;
use Consommation;
use Compteur;
use Abonnement;
use Reglement;

class FactureDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout facture
    public function addFacture($dateF,$prixUnitaireF,$consommationF)
    {
        $ab = new Facture();
        $consommationF = $this -> entityManager->getRepository(Consommation::class)->find($consommationF);
        $CompteurF = $this -> entityManager->getRepository(Compteur::class)->find($consommationF -> getCompteurConso());
        $AbonnementF = $this -> entityManager->getRepository(Abonnement::class)->find($CompteurF -> getAbonnementCompt());
        $client = $this -> entityManager->getRepository(Client::class)->find($AbonnementF -> getClientAbonnement());
        $date = new \DateTime($dateF);
        $ab -> setDateF($date);
        $ab -> setPrixUnitaireF($prixUnitaireF);
        $ab -> setEtatF(1);
        $ab -> setConsommationF($consommationF);
        $ab -> setNameClient($client);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();

        $this -> addReglement($this -> idMaxFacture());
    }

    //ajout reglement
    public function addReglement($factureRe)
    {
        $facture = $this -> entityManager->getRepository(Facture::class)->find($factureRe);
        $ab = new Reglement;
        $ab -> setFactureRe($facture);
        $ab -> setEtatRe(0);
        $date = date('d-m-Y');
        $date = new \DateTime($date);
        $ab -> setDateRe($date);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister factures regles
    public function idMaxFacture()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT max(id) idF FROM factures';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        $tab = $result -> fetchAllAssociative();
        return $tab[0]['idF'];
    }

    //lister factures regles
    public function listFactureR()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM factures WHERE etatF=1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister factures non regles
    public function listFactureN()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM factures WHERE etatF=0';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //lister factures
    public function listFacture()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT f.id,f.dateF,f.prixUnitaireF,c.nameClient,cc.consommationC,cc.consommationCL FROM factures f,clients c,consommations cc,reglements r WHERE f.id_clientF=c.id AND f.id_consommationF=cc.id AND f.id=r.id_facture AND etatReglement = 0';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //consommation sans  factures
    public function SansConsommation()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT c.id,c.moisConsommation FROM consommations c,clients cc,factures f WHERE c.id!=f.id_consommationF AND cc.id = f.id_clientF';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //regler facture
    public function reglerFacture($id)
    {
        //update
        $facture = $this -> entityManager->getRepository(Facture::class)->find($id);
        $facture->setEtatF(1);
        $this -> entityManager -> persist($facture);
        $this -> entityManager->flush();
        echo "<br>delete ! SUPER !<br>";
    }
}




?>