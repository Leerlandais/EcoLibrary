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

    public function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
} // end class
