<?php


namespace model\Manager;

use model\Mapping\UserMapping;
use model\MyPDO;

use PDOException;


class UserManager {
    private MyPDO $db;

    public function __construct(MyPDO $db) {
        $this->db = $db;
    }

    public function testUserName($login) : bool {
        $sql = $this->db->prepare("SELECT * FROM eco_object_users WHERE object_user_login = :login");
        $sql->bindValue(':login', $login);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function register(string $login, string $password, string $name, string $email) : bool {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO `eco_object_users`
                                                    (`object_user_login`,
                                                     `object_user_pass`,
                                                     `object_user_name`,
                                                     `object_user_email`) 
                                        VALUES (?,?,?,?)");
        $stmt->execute([$login,$password,$name,$email]);
        if ($stmt->rowCount() > 0) return true;
        return false;
    }

    public function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
} // end class
