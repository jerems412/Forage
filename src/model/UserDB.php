<?php
namespace src\model;
use libs\system\Model;
use User;
use Role;

class UserDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout user
    public function addUser($nameUser,$identifiantUser,$lastNameUser,$mdpUser,$emailUser,$etatUser,$role)
    {
        $ab = new User;
        $role = $this -> entityManager->getRepository(Role::class)->find($role);
        $ab -> setNameUser($nameUser);
        $ab -> setIdentifiantUser($identifiantUser);
        $ab -> setLastNameUser($lastNameUser);
        $ab -> setMdpUser($mdpUser);
        $ab -> setEmailUser($emailUser);
        $ab -> setetatUser($etatUser);
        $ab -> setRoleUser($role);
        $ab -> setNombreConnexion(0);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
    }

    //lister user bloque
    public function listUserB($id)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE etatUser=1 AND id != :idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$id]);
        return $result -> fetchAllAssociative();
    }

    //lister non bloque
    public function listUserNB($id)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE etatUser=0 AND id != :idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$id]);
        return $result -> fetchAllAssociative();
    }

    //lister user
    public function listUser($id)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE id != :idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$id]);
        $tab = $result -> fetchAllAssociative();
        return $tab;
    }

    //lister user
    public function listAllUser()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        $tab = $result -> fetchAllAssociative();
        return count($tab);
    }

    //bloquer user
    public function bloquerUser($id)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user->setEtatUser(0);
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }

    //debloquer user
    public function debloquerUser($id)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user->setEtatUser(1);
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }

    //modifier role user
    public function listFactureR($id,$modif)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user->setRoleUser($modif);
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }

    //modifier mot de passe
    public function updatemdp($id,$modif)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user->setMdpUser($modif);
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }

    //modifier nb
    public function updateNb($id)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user->setNombreConnexion(intval($user->getNombreConnexion()+1));
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }

    //user exist
    public function userExist($identifiant,$mdp)
    {
        $mdp = md5($mdp);
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE identifiantUser=:idd AND mdpUser = :mdp AND etatUser = 1';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$identifiant, 'mdp' => $mdp]);
        $tab = $result -> fetchAllAssociative();
        if($tab)
        {
            return $tab[0];
        }else
        {
            return false;
        }
    }

    //user exist1
    public function userExist1($identifiant)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE identifiantUser=:idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$identifiant]);
        $tab = $result -> fetchAllAssociative();
        if($tab)
        {
            return $tab[0];
        }else
        {
            return false;
        }
    }

    //user exist2
    public function userExist2($identifiant)
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = 'SELECT * FROM users WHERE emailUser=:idd';
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery(['idd'=>$identifiant]);
        $tab = $result -> fetchAllAssociative();
        if($tab)
        {
            return $tab[0];
        }else
        {
            return false;
        }
    }

    //modifier user
    public function updateUser($id,$nameUser,$identifiantUser,$lastNameUser,$mdpUser,$emailUser,$etatUser,$role)
    {
        //update
        $user = $this -> entityManager->getRepository(User::class)->find($id);
        $user -> setNameUser($nameUser);
        $user -> setIdentifiantUser($identifiantUser);
        $user -> setLastNameUser($lastNameUser);
        $user -> setMdpUser($mdpUser);
        $user -> setEmailUser($emailUser);
        $user -> setetatUser($etatUser);
        $user -> setRoleUser($role);
        $this -> entityManager -> persist($user);
        $this -> entityManager->flush();
    }
}




?>