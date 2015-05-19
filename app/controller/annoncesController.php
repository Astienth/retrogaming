<?php

class annoncesController {
    
    public function indexAction() {
    
        $PageTitle = 'Accueil - Mega Retrogaming';
        include('app/view/home.php');
        
    }
    
    public function listAction($page){
        
        $limite = LIMITE;
        $annonceManager = new AnnonceManager();
        if(isset($page['page'])){
            $debut = ($page['page']-1) * $limite;
            $list = $annonceManager->getList($debut, $limite);
            $currentPage = $page['page'];
        }
        else {
            $list = $annonceManager->getList($debut = 0, $limite);
            $currentPage = 1;
        }
        $paginator = new Paginator($currentPage, $limite);
        $PageTitle = 'Mega Retrogaming - Consulter les annonces';
        include('app/view/list.php');
    }
    
    public function annonceAction($id) {
    
        $annonceManager = new AnnonceManager();
        $titre = $id['titre'];
        $id = $id['id'];
        $annonce = $annonceManager->getById($id);
        if($annonce->getId() == null){
            $PageTitle = 'Oupss !!';
            include('app/view/404.php');
         } else {
             $PageTitle = $titre;
           include('app/view/annonces.php');
        }
    }
    
    public function createFormAction(){
       $PageTitle = 'Mega Retrogaming - Déposer une annonce';
       include('app/view/create.php');
    }
    
    public function createAction(){
        $annonceManager = new AnnonceManager();
        $data = $_POST;
        $annonce = new Annonce($data);
        $annonce->setDateCreation(new DateTime());
        $annonce->setPassword(hash('sha512', $annonce->getPassword()));
        $creation = $annonceManager->createAnnonce($annonce);
        unset($_POST);
        $PageTitle = 'Mega Retrogaming - Déposer une annonce';
        $_SESSION['submit'] = $creation;
        header('location: '.BASE.'deposer-une-annonce/submit');       
    }
    
    public function submitAnnonce(){
        $PageTitle = 'Mega Retrogaming - Validation annonce';
        include('app/view/submitAnnonce.php');
    }
}
