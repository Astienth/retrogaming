<?php
/**
 * Description of Annonces
 *
 * @author Astien
 */
class Annonce {
    
    private $_id;
    private $_category;
    private $_localisation;
    private $_titre;
    private $_description;
    private $_prix;
    private $_dateCreation;
    private $_dateUpdate;
    private $_password;
    private $_telContact;
    private $_mailContact;
    private $_idUser;
    
    public function __construct($donnees) {
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
    
    public function getId() {
        return $this->_id;
    }
    
    public function getCategory() {
        return $this->_category;
    }
    
    public function getLocalisation() {
        return $this->_localisation;
    }
    
    public function getTitre() {
        return $this->_titre;
    }
    
    public function getDescription() {
        return $this->_description;
    }
    
    public function getPrix() {
        return $this->_prix;
    }
    
    public function getDateCreation() {
        return $this->_dateCreation;
    }
    
    public function getDateUpdate() {
        return $this->_dateUpdate;
    }
    
    public function getPassword() {
        return $this->_password;
    }
    
    public function getTelContact() {
        return $this->_telContact;
    }
    
    public function getMailContact() {
        return $this->_mailContact;
    }
    
    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }
    
    public function setCategory($category) {
        if(is_string($category)){
            $this->_category = $category;
        }
    }
    
    public function setLocalisation($localisation) {
        if(is_string($localisation)){
            $this->_localisation = $localisation;
        }
    }
    
    public function setTitre($titre) {
        if(is_string($titre)){
            $this->_titre = $titre;
        }
    }
    
    public function setDescription($description) {
        if(is_string($description)){
            $this->_description = $description;
        }
    }
    
    public function setPrix($prix) {
        
        $prix = (int) $prix;
        if($prix >= 0){
            $this->_prix = $prix;
        }
    }
    
    public function setDateCreation(DateTime $date) {
            $this->_dateCreation = $date;
    }
    
    public function setDateUpdate(DateTime $date) {
            $this->_dateUpdate = $date;
    }
    
    public function setPassword($password){
        if(is_string($password)){
            $this->_password = $password;
        }
    }
    
    public function setTelContact($tel){
        if(is_string($tel)){
            $this->_telContact = $tel;
        }
    }
    
    public function setMailContact($email){
        if(is_string($email)){
            $this->_mailContact = $email;
        }
    }
    
    public function setIdUser($idUser){
        if(is_int($idUser)){
            $this->_id4 = $idUser;
        }
    }
}
