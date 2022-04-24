<?php
use libs\system\Controller;
use src\model\CompteurDB;
use src\model\AbonnementDB;


class GesCompteurController extends Controller
{
    private $GesCompteur;
    private $abonnement;
    public function __construct() {
        parent::__construct();
        $this -> abonnement = new AbonnementDB();
        $this -> GesCompteur = new CompteurDB();
    }
    
    public function GesCompteur () {
        return $this->view->load("GesCompteur/GesCompteur");
    }

    //page liste d'abonnement
    public function ListAbonnement () {
        $_SESSION['abonnements'] = $this ->abonnement -> listAbonnement();
        return $this->view->load("GesCompteur/ListAbonnement");
    }

    //page attribution
    public function Attribution () {
        $_SESSION['compteurs'] = $this ->GesCompteur ->listCompteur1();
        $_SESSION['abonnements'] = $this ->abonnement -> listAbonnement1();
        return $this->view->load("GesCompteur/Attribution");
    }

    //page add attribution
    public function AjoutAttribution () {
        extract($_POST);
        if($abonnement !=""){
            $num = "#NUM_" . rand(0, 9000) . "_" . date('DdMYHis');
            $this->GesCompteur->addCompteur($num, 0, $abonnement);
            return $this->view->load("GesCompteur/ListAbonnement");
        }else{
            return $this->view->load("GesCompteur/Attribution");
        }
    }

}
