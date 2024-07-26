<?php

use model\Manager\UserManager;
use model\Mapping\UserMapping;

$userManager = new UserManager($db);

if(isset($_POST["createUserName"],
         $_POST["createUserEmail"],
         $_POST["createUserLogin"],
         $_POST["createUserPassword"],
         $_POST["createUserPassVerify"])) {

}



$id = 25;
$login = "leerlandais";
$pass = "passTest";

$pass = $userManager->hashPassword($pass);

$name = "Lee Brennan";
$mail = "lee@leerlandais.com";
$permission = 1;
$date = "2024-07-26 10:15:09";

$test = new UserMapping([   "object_user_id" => $id,
    "object_user_login" => $login,
    "object_user_pass" => $pass,
    "object_user_name" => $name,
    "object_user_email" => $mail,
    "object_user_permission" => $permission,
    "object_user_created" => $date,
]);

$title = "HomePage";
include PROJECT_DIRECTORY."/view/public/public.home.view.php";

var_dump($test);