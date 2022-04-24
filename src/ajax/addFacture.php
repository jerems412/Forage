<?php


if(isset($_GET['idAddFacture'])){
    require_once "src/controller/GesCommercialeController.php";
    $home = new GesCommercialeController();
    $home -> AddFacture(date('d-m-Y'),($_GET['conso']*500),$_GET['idAddFacture']);
}

if(isset($_GET['idRegler'])){
    require_once "src/controller/GesCommercialeController.php";
    $home = new GesCommercialeController();
    $home -> updateReglement($_GET['idRegler']);
}

if(isset($_GET['idUser'])){
    require_once "src/controller/AdminController.php";
    $home = new AdminController();
    if($_GET['etat'] == 1){
        $home -> bloquerUser($_GET['idUser']);
    }else{
        $home -> debloquerUser($_GET['idUser']);
    }
}


?>