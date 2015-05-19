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
    
    public function search(){
        
    }
    
    public function createAnnonce(Annonce $annonce){
        
        $sql = $this->db->prepare("INSERT INTO annonce (category,"
                . " localisation,"
                . " titre,"
                . " description,"
                . " prix,"
                . " dateCreation,"
                . " dateUpdate,"
                . " password,"
                . " telContact,"
                . " mailContact,"
                . " idUser)"
                . "VALUE"
                . " (:category,"
                . " :localisation,"
                . " :titre,"
                . " :description,"
                . " :prix,"
                . " :dateCreation,"
                . " :dateUpdate, "
                . " :password,"
                . " :telContact,"
                . " :mailContact,"
                . " :idUser)");
        $date = $annonce->getDateCreation();
        $date = $date->format('Y-m-d H:i');
        $data = array('category' => $annonce->getCategory(),
                      'localisation' => $annonce->getLocalisation(),
                      'titre' => $annonce->getTitre(),
                        'description' => $annonce->getDescription(),
                        'prix' => $annonce->getPrix(),
                        'dateCreation' => $date,
                        'dateUpdate' => $date,
                        'password' => $annonce->getPassword(),
                        'telContact' => $annonce->getTelContact(),
                        'mailContact' => $annonce->getMailContact(),
                        'idUser' => $annonce->getIdUser());
        $query = $sql->execute($data);
        
        $img = $annonce->getImg();
        if($img){
            foreach ($img as $pic){
                $sql = $this->db->prepare("INSERT INTO imageannonce VALUE (:path, :idAnnonce)");
                $data = array('path' => $pic['path'], 'idAnnonce' => $pic['idAnnonce']);
                $queryImg = $sql->execute($data);
                
                if($queryImg && $query){
                    $verif = TRUE;
                } else {
                    $verif = FALSE;
                }
            }
        } else {
            if($query){
                $verif = TRUE;
            } else {
                $verif = FALSE;
            }
        }
        if($verif){
            $mail = new EmailType('test', $annonce->getMailContact());
            var_dump($mail);
            $send = $mail->send();
            $verifMail = $send;
        }
        
        if($verif && $verifMail){
            $status = TRUE;
        } else {
            $status = FALSE;
        }
        
        return $status;
    }
    
    public function updateAnnonce(Annonce $annonce){
        $sql = $this->db->prepare("UPDATE annonce SET category,"
                . " localisation,"
                . " titre,"
                . " description,"
                . " prix,"
                . " dateCreation,"
                . " dateUpdate,"
                . " password,"
                . " telContact,"
                . " mailContact,"
                . " idUser)"
                . "VALUE"
                . " (:category,"
                . " :localisation,"
                . " :titre,"
                . " :description,"
                . " :prix,"
                . " :dateCreation,"
                . " :dateUpdate, "
                . " :password,"
                . " :telContact,"
                . " :mailContact,"
                . " :idUser"
                . "WHERE id = :id");
        $dateCreation = $annonce->getDateCreation()->format('Y-m-d H:i');
        $dateUpdate = $annonce->getDateUpdate()->format('Y-m-d H:i');
        $data = array('id' => $annonce->getId(),
                      'category' => $annonce->getCategory(),
                      'localisation' => $annonce->getLocalisation(),
                      'titre' => $annonce->getTitre(),
                        'description' => $annonce->getDescription(),
                        'prix' => $annonce->getPrix(),
                        'dateCreation' => $dateCreation,
                        'dateUpdate' => $dateUpdate,
                        'password' => $annonce->getPassword(),
                        'telContact' => $annonce->getTelContact(),
                        'mailContact' => $annonce->getMailContact(),
                        'idUser' => $annonce->getIdUser());
        $query = $sql->execute($data);
        
        $img = $annonce->getImg();
        if($img){
            foreach ($img as $pic){
                $sql = $this->db->prepare("INSERT INTO imageannonce VALUE (:path, :idAnnonce)");
                $data = array('path' => $pic['path'], 'idAnnonce' => $pic['idAnnonce']);
                $queryImg = $sql->execute($data);
                
                if($queryImg && $query){
                    $verif = TRUE;
                } else {
                    $verif = FALSE;
                }
            }
        } else {
            if($query){
                $verif = TRUE;
            } else {
                $verif = FALSE;
            }
        }
        return $verif;
    }
    
    public function deleteAnnonce(Annonce $annonce){
        $sql = "DELETE FROM annonce WHERE id =  :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $annonce->getId(), PDO::PARAM_INT);   
        $stmt->execute(); 
        return $stmt;
    }
    
    public function getImg($id) {
        $sql = "SELECT path FROM imageannonce where idannonce = $id";
        $requete = $this->db->query($sql);
        $listImg = $requete->fetchAll();
        $requete->closeCursor();
        return $listImg;
    }
    
    public function annonceUrl(Annonce $annonce){
        
        $url = $annonce->getTitre();
        $url = htmlspecialchars($url);
        $url = preg_replace('/&(.)[^;]+;/','$1',$url);
        $url = str_replace(' ', '-', $url);
        $url = preg_replace('/[^A-Za-z0-9-]/', '', $url);
        $url = $url.'/'.$annonce->getId();
        return $url;
    }
    
    public function getDate(Annonce $annonce){
        if($annonce->getDateUpdate() != NULL){
            $date = $annonce->getDateUpdate()->format('d/m/Y \à H:i');
        }
        else {
            $date = $annonce->getDateCreation()->format('d/m/Y \à H:i');
        }
        $date = 'Publiée le '.$date;
        return $date;
    }
    
    public function contacterAnnonce(){
        
    }
    
    public function getNew(){
        
    }
}
