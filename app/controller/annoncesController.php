<?php

class annoncesController {
    
    public function indexAction() {
    
        include('/app/view/index.php');
        
    }
    
    public function listAction($id) {
    
       include('/app/view/home.php');
        
    }
    
    public function listPostAction() {
        
       if(isset($_POST['submit'])) {
           $message = 'complet';
       }
       else {
        $message = 'Incomplet';
       }
        include('/app/view/homePOST.php');
    }
}
