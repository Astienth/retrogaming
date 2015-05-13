<?php
/**
 * Description of DbConnection
 *
 * @author Astien
 */

class DbConnection {

    // instance de la classe
    private static $instance;
    private $host = host;
    private $database = database;
    private $username = username;
    private $password = password;
    private $option = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    private $db;
    
    public function __construct() {
        try {
        $dns = 'mysql:dbname='.$this->database.";host=".$this->host;
        $this->db = new PDO($dns, $this->username, $this->password, $this->option);
    }
        catch (exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Regarde si un objet connexion a déjà été instancier,
     * si c'est le cas alors il retourne l'objet déjà existant
     * sinon il en créer un autre.
     * @return $instance
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    /**
     * Permet de récuprer l'objet PDO permettant de manipuler la base de donnée
     * @return $dbh
     */
    public function getDb()
    {
        return $this->db;
    }
    
}