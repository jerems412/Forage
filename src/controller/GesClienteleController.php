<?php
use libs\system\Controller;
use src\model\ClientDB;
use src\model\VillageDB;
use src\model\AbonnementDB;

class GesClienteleController extends Controller
{
    private $GesClientele;
    private $client;
    private $village;
    private $abonnement;
    public function __construct() {
        parent::__construct();
        $this -> client = new ClientDB();
        $this -> village = new VillageDB();
        $this -> abonnement = new AbonnementDB();
    }
    
    //accueil gestion clientele
    public function GesClientele () {
        return $this->view->load("GesClientele/GesClientele");
    }

    //page add client
    public function AddClient () {
        $_SESSION['villages'] = $this -> village -> listVillage();
        return $this->view->load("GesClientele/AddCustomer");
    }

    //page ajout client
    public function AjoutClient () {
        extract($_POST);
        if(count($this -> village -> listVillage()) !=0){
            $this->client->addClient($name,$adresse,$phone,$village,1);
            return $this -> ListClient();
        }else{
            $this -> AddClient();
        }
    }

    //page add villageDb
    public function AddVillage () {
        $_SESSION['clients'] = $this -> client -> listClient();
        return $this->view->load("GesClientele/AddVillage");
    }

    //page ajout village
    public function AjoutVillage () {
        extract($_POST);
        $this-> village -> addVillage($name,$chef);
        return $this -> ListVillage();
    }

    //page ajout abonnement
    public function AjoutAbonnement () {
        extract($_POST);
        if(count($this -> client -> listClient()) !=0){
            $this-> abonnement -> addAbonnement($date,$number,$desc,$client);
            return $this -> ListAbonnement();
        }else{
            $this -> AddAbonnement();
        }
    }

    //page add abonnement
    public function AddAbonnement () {
        $_SESSION['clients'] = $this -> client -> listClient2();
        return $this->view->load("GesClientele/AddAbonnement");
    }

    //page list client
    public function ListClient () {
        $_SESSION['clients'] = $this -> client -> listClient1();
        return $this->view->load("GesClientele/ListCustomer");
    }

    //page list village
    public function ListVillage () {
        $_SESSION['villages'] = $this -> village -> listVillage();
        return $this->view->load("GesClientele/ListVillage");
    }

    //page list abonnement
    public function ListAbonnement () {
        $_SESSION['abonnements'] = $this -> abonnement -> listAbonnement();
        return $this->view->load("GesClientele/ListAbonnement");
    }


}