<?php
session_start();
define("BASE", "http://localhost/CoinRetrogaming/");
define("CSS", "http://localhost/CoinRetrogaming/www/css");
define("JS", "http://localhost/CoinRetrogaming/www/js");
define("IMG", "http://localhost/CoinRetrogaming/www/img");
require 'includes/autoloader.php';  //autoload des classes
require 'includes/configBDD.php';  //configuration d'accès à la base de données
require 'includes/router.php'; //altorouter 
require 'includes/configRoutes.php'; //liste des routes

?>