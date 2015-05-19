<?php
/**
 * Description of paginator
 *
 * @author Astien
 */
class Paginator {
    
    private $_page;
    private $_limite;
    private $_nbrePage;
    private $db;
    
    public function __construct($page, $limite){
        
        $this->db = DbConnection::getInstance()->getDb();
        $this->_page = $page;
        $this->_limite = $limite;
        $this->_nbrePage = $this->nombrePage();
    }
    
    public function nombrePage(){

    $sql = $this->db->prepare("SELECT COUNT(*) FROM annonce");
    $sql->execute();
    $result = $sql->fetchColumn();
    $div = $result/$this->_limite;
    $nbrePage = ceil($div);
    return $nbrePage;
        
    }
    
    public function create(){
        
        echo '<div class="paginator">';
        if($this->_page>1){
            echo $prev = '<a href="'.BASE.'consulter-les-annonces/'.($this->_page-1).'">Précédent</a>';
        }
        if(($this->_page!= 1)&&(($this->_page-4)>0)){
            echo $next = '<a href="'.BASE.'consulter-les-annonces/1">1</a>';  
        }
        if(($this->_page-4)>1){
            echo '<span>...</span>';
        }
        if(($this->_page -3)>0){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page-3).'">'.($this->_page - 3).'</a>';
        }
        if(($this->_page -2)>0){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page-2).'">'.($this->_page - 2).'</a>';
        }
        if(($this->_page -1)>0){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page-1).'">'.($this->_page - 1).'</a>';
        }
        
        echo '<a class="activePaginator" href="'.BASE.'consulter-les-annonces/'.($this->_page).'">'.($this->_page).'</a>';
        
        if(($this->_page +1)<=$this->_nbrePage){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page+1).'">'.($this->_page+1).'</a>';
        }
        if(($this->_page +2)<=$this->_nbrePage){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page+2).'">'.($this->_page+2).'</a>';
        }
        if(($this->_page +3)<=$this->_nbrePage){
            echo '<a href="'.BASE.'consulter-les-annonces/'.($this->_page+3).'">'.($this->_page+3).'</a>';
        }
        if(($this->_page+4)<$this->_nbrePage){
            echo '<span>...</span>';
        }
        if(($this->_page!=$this->_nbrePage)&&(($this->_page+4)<=$this->_nbrePage)){
            echo $next = '<a href="'.BASE.'consulter-les-annonces/'.($this->_nbrePage).'">'.$this->_nbrePage.'</a>';  
        }
        if($this->_page != $this->_nbrePage){
            echo $next = '<a href="'.BASE.'consulter-les-annonces/'.($this->_page+1).'">Suivant</a>';  
        }
        echo '</div>';
    }
}
