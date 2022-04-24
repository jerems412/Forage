<?php
use libs\system\Controller;
use src\model\UserDB;
use src\model\RoleDB;
require_once "libs/system/Controller.php";

class AdminController extends Controller
{
    private $Admin;
    private $Admin1;
    public function __construct() {
        parent::__construct();
        $this -> Admin = new UserDB();
        $this -> Admin1 = new RoleDB();
    }
    
    public function Admin () {
        $_SESSION['nameAddUser'] = "";
        $_SESSION['identifiantAddUser'] = "";
        $_SESSION['lastNameAddUser'] = "";
        $_SESSION['emailAddUser'] = "";
        $_SESSION['roleAddUser'] = "";
        return $this->view->load("Admin/admin");
    }

    public function addUser() {
        $_SESSION['role'] = $this -> PlistRole();
        return $this -> view -> load("Admin/addUser");
    }

    public function listUser() {
        $_SESSION['users'] = $this ->ListerUser();
        return $this -> view -> load("Admin/listUser");
    }

    public function PlistRole() {
        return $this -> Admin1 -> listRole();
    }

    public function ListerUser() {
        return $this -> Admin -> listUser($_SESSION['userConnecter']['id']);
    }

    public function AjoutUser() {
        extract($_POST);
        if($this -> Admin -> userExist1($identifiant) || $this -> Admin -> userExist2($email))
        {
            $_SESSION['erreurAuth'] = '<em style="color:red;">Identifiant ou email deja pris !</em>';
            $_SESSION['nameAddUser'] = $name;
            $_SESSION['identifiantAddUser'] = $identifiant;
            $_SESSION['lastNameAddUser'] = $lastName;
            $_SESSION['emailAddUser'] = $email;
            $_SESSION['roleAddUser'] = $role1;
            $this -> view -> load("Admin/addUser");
        }else{
            $this -> Admin -> addUser($name,$identifiant,$lastName,md5("passer@123"),$email,1,$role1);
            $_SESSION['users'] = $this ->ListerUser();
            $_SESSION['erreurAuth'] = "";
            $_SESSION['nameAddUser'] = "";
            $_SESSION['identifiantAddUser'] = "";
            $_SESSION['lastNameAddUser'] = "";
            $_SESSION['emailAddUser'] = "";
            $_SESSION['roleAddUser'] = "";
            $this -> view -> load("Admin/listUser");
        }
    }

    //bloquer user
    public function bloquerUser($id)
    {
        $this -> Admin -> bloquerUser($id);
    }

    //bloquer user
    public function debloquerUser($id)
    {
        $this -> Admin -> debloquerUser($id);
    }
}