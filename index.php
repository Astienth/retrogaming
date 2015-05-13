<?php
session_start();
define("CSS", "www/css");
define("JS", "www/js");
define("IMG", "www/img");
require 'includes/autoloader.php';  //autoload des classes
require 'includes/configBDD.php';  //configuration d'accès à la base de données
require 'includes/router.php'; //altorouter 
require 'includes/configRoutes.php'; //liste des routes

?>