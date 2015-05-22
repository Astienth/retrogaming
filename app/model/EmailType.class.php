<?php

/**
 * Description of emailType
 *
 * @author Astien
 */
class EmailType {
    
    private $_name;
    private $_objet;
    private $_corps;
    private $_header;
    private $_mail;
    private $_db;
    private $_serverAddress;
    private $_serverName;
    
    public function __construct($name, $email){
        
        $this->_db = DbConnection::getInstance()->getDb();
        $this->_serverAddress = EMAILADDRESS;
        $this->_serverName = EMAILNAME;
        $this->_mail = $email;
        $this->_name = $name;
        $sql = $this->_db->prepare("SELECT * FROM emailtype WHERE name = :name");
        $sql->bindValue('name', $this->_name, PDO::PARAM_STR);
        $sql->execute();
        $mailType = $sql->fetchAll();
        $this->_corps = $mailType[0]['corps'];
        $this->_objet = $mailType[0]['objet'];
        
    }
    
    public function send(){
        
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->_mail)){ // On filtre les serveurs qui présentent des bogues.

            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }        
        
        //=====Création de la boundary.
        $boundary = "-----=".md5(rand());
        $boundary_alt = "-----=".md5(rand());
        //==========
        
        //=====Création du header de l'e-mail.
        $this->_header = "From: \"$this->_serverName\" <$this->_serverAddress>".$passage_ligne
                ." Reply-to: \"$this->_serverName\" <$this->_serverAddress>".$passage_ligne
                ."MIME-Version: 1.0".$passage_ligne
                ."Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========
        
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne
            ."Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne
            .$passage_ligne."--".$boundary_alt.$passage_ligne;
        
        //=====Ajout du message au format HTML.
        $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne
            ."Content-Transfer-Encoding: 8bit".$passage_ligne
            .$passage_ligne.$this->_corps.$passage_ligne;
        //==========
        //=====On ferme la boundary alternative.
        $message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
        //==========
        $send = mail($this->_mail,$this->_objet,$message,$this->_header);
        
        return $send;
    }
    
    public function addToObjet($obj){
        $this->_objet = $this->_objet.$obj; 
    }
    
    public function addToCorps($corps){
        $this->_corps = $this->_corps.$corps;
    }
}
