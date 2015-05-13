<?php
/**
 * Description of Image
 *
 * @author Astien
 */
class ImageAnnonce {
    
    private $_id; //id image en bdd
    private $_idAnnonce; //Id de l'annonce à laquelle correspond l'image
    private $_path; //chemin du fichier image dans l'arborescence
    
    public function __construct(array $donnees) {
        
        $this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);

        // Si le setter correspondant existe.
        if (method_exists($this, $method))
        {
          // On appelle le setter.
          $this->$method($value);
        }
      }
    }
    
    public function getId(){
        return $this->_id;
    }
    
    public function getIdAnnonce(){
        return $this->_idAnnonce;
    }
    
    public function getPath(){
        return $this->_path;
    }
    
    public function setId($id) {
        $id = (int) $id;
        if ($id > 0)
        {
          $this->_id = $id;
        }
    }    
    
    public function setIdAnnonce($idAnnonce) {
        $idAnnonce = (int) $idAnnonce;
        if ($idAnnonce > 0) {
            $this->_idAnnonce = $idAnnonce;
        }
    }

    public function setPath($path) {
        if (is_string($path))
        {
          $this->_path = $path;
        }
    }

}
