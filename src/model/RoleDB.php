<?php
namespace src\model;
use libs\system\Model;
use Role;

class RoleDB extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //ajout role
    public function addRole($nameRole)
    {
        $ab = new Role;
        $ab -> setNameRole($nameRole);
        $this -> entityManager -> persist($ab);
        $this -> entityManager -> flush();
        echo "Ajouter<br>";
    }

    // lister role
    public function listRole()
    {
        $conn = $this -> entityManager -> getConnection();
        $sql = "SELECT * FROM roles WHERE nameRole != 'ROLE_ADMIN'";
        $stmt = $conn -> prepare($sql);
        $result = $stmt -> executeQuery();
        return $result -> fetchAllAssociative();
    }

    //update role
    public function updateRole($id,$modif)
    {
        //update
        $role = $this -> entityManager->getRepository(Role::class)->find($id);
        $role->setNameRole($modif);
        $this -> entityManager -> persist($role);
        $this -> entityManager->flush();
    }

}




?>