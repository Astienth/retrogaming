<?php
/**
 * Description of AnnonceManager
 *
 * @author Astien
 */

class AnnonceManager {
    
    private $db;
    
    public function __construct() {
        $this->db = DbConnection::getInstance()->getDb();
    }
    
    public function getList($debut = -1, $limite = -1)
    {
      $sql = 'SELECT * FROM annonce ORDER BY id DESC';

      // On vérifie l'intégrité des paramètres fournis.
      if ($debut != -1 || $limite != -1)
      {
        $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
      }

      $requete = $this->db->query($sql);

      $listeAnnonces = $requete->fetchAll();

      $requete->closeCursor();

      return $listeAnnonces;
    }
}
