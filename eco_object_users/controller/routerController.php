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

$id = 2;
$test = new UserMapping(["object_user_id" => $id]);

var_dump($test);