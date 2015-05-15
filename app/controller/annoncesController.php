<?php

class annoncesController {
    
    public function indexAction() {
    
        include('/app/view/home.php');
        
    }
    
    public function listAction(){
        $annonces = new AnnonceManager();
        $list = $annonces->getList();
        include('app/view/list.php');
    }
    
    public function annonceAction($id) {
    
        $annonces = new AnnonceManager();
        $id = $id['id'];
        $annonce = $annonces->getById($id);
        if($annonce->getId() == null){
            include('/app/view/404.php');
         } else {
           include('/app/view/annonces.php');
        }
    }
    
    public function listPostAction() {
        
       if(isset($_POST['submit'])) {
           $message = 'complet';
       }
       else {
        $message = 'Incomplet';
       }
        include('/app/view/home.php');
    }
}
