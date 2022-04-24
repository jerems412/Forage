<?php
use libs\system\Controller;
use src\model\FactureDB;
use src\model\ConsommationDB;
use src\model\ClientDB;
use src\model\CompteurDB;
use src\model\ReglementDB;

class GesCommercialeController extends Controller
{
    private $GesCommerciale;
    private $facture;
    private $consommation;
    private $client;
    private $compteur;
    private $reglement;
    public function __construct() {
        parent::__construct();
        $this -> facture = new FactureDB();
        $this -> consommation = new ConsommationDB();
        $this -> client = new ClientDB();
        $this -> compteur = new CompteurDB();
        $this -> reglement = new ReglementDB();
    }

    public function GesCommerciale () {
        return $this->view->load("GesCommerciale/GesCommerciale");
    }

    //page ajout consommation
    public function AddConsommation () {
        $_SESSION['compteurs'] = $this -> compteur -> listCompteur();
        return $this->view->load("GesCommerciale/AddConsommation");
    }
    

    //page ajout facture
    public function AddFacture ($dateF,$prixUnitaireF,$consommationF) {
        $this -> facture -> addFacture($dateF,$prixUnitaireF,$consommationF);
    }

    //page liste facture
    public function ListFacture () {
        $_SESSION['factures'] = $this -> ListerFacture();
        return $this->view->load("GesCommerciale/ListFacture");
    }

    //page liste consommation
    public function ListConsommation () {
        $_SESSION['consommations'] = $this -> consommation -> ListConsommation ();
        return $this->view->load("GesCommerciale/ListConsommation");
    }

    //lister consommation
    public function ListerConsommation () {

        return $this->consommation->listConsommation();
    }

    //ajout consommation
    public function AjoutConsommation () {
        extract($_POST);
        if(count($this -> compteur -> listCompteur1()) != 0){
            $this->consommation->AddConsommation($moisConso,$consoC,$consoL,$comp);
            $_SESSION['consommations'] = $this -> ListerConsommation ();
            return $this->ListConsommation();
        }else{
            return $this -> AddConsommation ();
        }
    }

    //ajout consommation
    public function AjoutFacture () {
        extract($_POST);
        $this->facture->AddFacture($dateF,$prix,$moisConsommation,$nameClient);
        return $this->ListConsommation();
    }

    //lister facture
    public function ListerFacture () {
        return $this->facture->listFacture();
    }

    //update reglements
    public function updateReglement($id)
    {
        return $this-> reglement->updateReglement($id);
    }

}