<?php


namespace model\Manager;

use model\Mapping\UserMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;

class UserManager {
    use TraitLaundryRoom;
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
        $login    = $this->standardClean($login);
        $password = $this->hashPassword($password, PASSWORD_DEFAULT);
        $name     = $this->standardClean($name);
        $email    = $this->emailClean($email);

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

    public function login(string $login, string $password) : bool  {
        $login = $this->standardClean($login);
        // $password = password_hash($password, PASSWORD_DEFAULT); // I ALWAYS FORGET THAT IT IS NOT NECESSARY TO PRE-HASH THE PASSWORD
        $stmt = $this->db->prepare("SELECT * FROM `eco_object_users` WHERE `object_user_login` = :login");
        $stmt->execute([':login' => $login]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // the password is hashed for testing as part of password_verify()
            if (password_verify($password, $user['object_user_pass'])) {
                $_SESSION = $user;
                unset($_SESSION['object_user_pass']);
                $_SESSION["id"] = session_id();
                return true;
            }
        }
        $_SESSION["errorMessage"] = "error while logging in";
        return false;
    }

    public function logout() : bool {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: ./");
        exit();
    }

    private function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
} // end class
