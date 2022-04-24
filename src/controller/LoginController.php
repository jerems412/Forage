<?php
use libs\system\Controller;
use src\model\UserDB;


class LoginController extends Controller
{
    private $login;
    public function __construct() {
        parent::__construct();
        $this->login = new UserDB();
    }
    
    public function forget() {
        return $this -> view -> load("forget");
    }

    public function forgot() {
        extract($_POST);
        $this -> login -> updatemdp($_SESSION['userConnecter']['id'],md5($password));
        $this -> login -> updateNb($_SESSION['userConnecter']['id']);
        switch ($_SESSION['userConnecter']['id_roles']) {
            case 2:
                header("Location: http://localhost/mes_projets/forage/GesClientele/GesClientele");
                break;
            case 3:
                header("Location: http://localhost/mes_projets/forage/GesCommerciale/GesCommerciale");
                break;
            case 4:
                header("Location: http://localhost/mes_projets/forage/GesCompteur/GesCompteur");
                break;
        }
    }

    //page login
    public function login () {
        if($this -> login -> listAllUser() > 0){
            return $this->view->load("login");
        }else{
            return $this->view->load("Sign_In");
        }
    }

    //page register
    public function register () {
        extract($_POST);
        $this -> login -> addUser($name,$identifiant,$lastName,md5($password),$email,1,1);
        return $this -> login();
    }

    //test login
    public function logon() {
        extract($_POST);
        if($this -> login -> userExist($iden,$mdp))
        {
            $_SESSION['userConnecter'] = $this -> login -> userExist($iden,$mdp);
            $this -> login -> updateNb($_SESSION['userConnecter']['id']);
            $_SESSION['userConnecter'] = $this -> login -> userExist($iden,$mdp);
            switch ($_SESSION['userConnecter']['id_roles']) {
                case 1:
                    header("Location: http://localhost/mes_projets/forage/Admin/Admin");
                    $_SESSION['iden'] = "";
                    $_SESSION['mdp'] = "";
                    $_SESSION['erreurAuth'] = "";
                    break;
                case 2:
                    if($_SESSION['userConnecter']['nombreConnexion'] == 1){
                        header("Location: http://localhost/mes_projets/forage/Login/forget");
                    }else{
                        $_SESSION['iden'] = "";
                        $_SESSION['mdp'] = "";
                        $_SESSION['erreurAuth'] = "";
                        header("Location: http://localhost/mes_projets/forage/GesClientele/GesClientele");
                    }
                    break;
                case 3:
                    if($_SESSION['userConnecter']['nombreConnexion'] == 1){
                        header("Location: http://localhost/mes_projets/forage/Login/forget");
                    }else{
                        $_SESSION['iden'] = "";
                        $_SESSION['mdp'] = "";
                        $_SESSION['erreurAuth'] = "";
                        header("Location: http://localhost/mes_projets/forage/GesCommerciale/GesCommerciale");
                    }
                    break;
                case 4:
                    if($_SESSION['userConnecter']['nombreConnexion'] == 1){
                        header("Location: http://localhost/mes_projets/forage/Login/forget");
                    }else{
                        $_SESSION['iden'] = "";
                        $_SESSION['mdp'] = "";
                        $_SESSION['erreurAuth'] = "";
                        header("Location: http://localhost/mes_projets/forage/GesCompteur/GesCompteur");
                    }
                    break;
            }
        }else
        {
            $_SESSION['iden'] = $iden;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['erreurAuth'] = '<em style="color:red;">Identifiant ou mot de passe incorrect !</em>';
            return $this -> login();
        }
    }

    
}