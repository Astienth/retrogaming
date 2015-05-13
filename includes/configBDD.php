<?php
 
    $host = "localhost";
    $database = "retro";
    $username = "root";
    $password = "";

    try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password,
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    
        } catch (exception $e) {
            echo $e->getMessage();
        }