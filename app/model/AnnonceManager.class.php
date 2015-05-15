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
    
    public function getById($id){
        $sql = $this->db->prepare("SELECT * FROM annonce WHERE id = :id");
        $sql->bindValue('id', $id, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch();
        $img = $this->getImg($id);
        $result['img'] = $img;
        $objResult = new Annonce($result);
        
        return $objResult;
    }
    
    //retourne liste de toutes les annonces de la plus récente à la plus ancienne avec limite en arguments
    public function getList($debut = -1, $limite = -1)
    {
      $annonces = array();
      $sql = 'SELECT * FROM annonce ORDER BY dateUpdate DESC';

      // On vérifie l'intégrité des paramètres fournis.
      if ($debut != -1 || $limite != -1)
      {
        $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
      }

      $requete = $this->db->query($sql);

      $listeAnnonces = $requete->fetchAll();
      
      foreach ($listeAnnonces as $annonce) {
          $annonceImg = $this->getImg($annonce['id']);
          $annonce['img'] = $annonceImg;
          $fullAnnonce = new Annonce($annonce);
          $annonces[] = $fullAnnonce;
      }

      $requete->closeCursor();

      return $annonces;
    }
    
    public function getImg($id) {
        $sql = "SELECT path FROM imageannonce where idannonce = $id";
        $requete = $this->db->query($sql);
        $listImg = $requete->fetchAll();
        $requete->closeCursor();
        return $listImg;
    }
}
