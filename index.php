<?php
session_start();
require 'includes/emailServer.php';
require 'includes/path.php';
require 'includes/autoloader.php';  //autoload des classes
require 'includes/configBDD.php';  //configuration d'accès à la base de données
require 'includes/router.php'; //altorouter 
require 'includes/configRoutes.php'; //liste des routes

?>