<?php
session_start(); // always start with the session :)
use model\OurPDO; // then set up a DB connection

require_once "../config.php"; // always need the config and ALWAYS MAKE SURE THERE'S A .GITIGNORE

// autoload the Classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

// setup of composer/vendor files
require_once PROJECT_DIRECTORY . '/vendor/autoload.php';

try {
// connect to the DB
    $db = OurPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);
// set attributes for error handling and fetch modes
    $db->setAttribute(OurPDO::ATTR_ERRMODE, OurPDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die($e->getMessage());
}

// Call the first router - handles basic necessities and directs to other controllers
require_once PROJECT_DIRECTORY . '/controller/routerController.php';

// fermeture de la connexion
$db = null;