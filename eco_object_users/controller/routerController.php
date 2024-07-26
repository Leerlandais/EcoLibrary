<?php

use model\Mapping\UserMapping;
$route = $_GET['route'] ?? 'home';
/*
var_dump($route);
*/
// set up controller calls here
/*
 * switch $route
 * case : Me
 * case : Visitor
 * case : etc
 */

$id = 25;
$login = "leerlandais";
$pass = "passTest";
$name = "Lee Brennan";
$mail = "lee@leerlandais.com";
$permission = 1;
$date = "2024-07-26 10:15:09.933024";

$test = new UserMapping([   "object_user_id" => $id,
                            "object_user_login" => $login,
                            "object_user_pass" => $pass,
                            "object_user_name" => $name,
                            "object_user_email" => $mail,
                            "object_user_permission" => $permission,
                            "object_user_created" => $date,
                        ]);

var_dump($test);