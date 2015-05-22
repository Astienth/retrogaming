<?php

$router = new Router();
$router->setBasePath('/CoinRetrogaming'); //a modifier en prod

//liste des routes :

$router->map( 'GET', '/', 'annoncesController#indexAction');
$router->map( 'GET', '/index.php', 'annoncesController#indexAction');
$router->map('GET', '/list', 'annoncesController#listAction');
$router->map('GET', '/consulter-les-annonces', 'annoncesController#listAction');
$router->map('GET', '/consulter-les-annonces/[i:page]', 'annoncesController#listAction');
$router->map( 'GET', '/annonce/[titre:titre]/[i:id]', 'annoncesController#annonceAction');
$router->map('POST', '/annonce/[titre:titre]/[i:id]', 'annoncesController#reponseAnnonceAction');
$router->map('GET', '/deposer-une-annonce', 'annoncesController#createFormAction');
$router->map('POST', '/deposer-une-annonce', 'annoncesController#createAction');
$router->map('GET', '/deposer-une-annonce/submit', 'annoncesController#submitAnnonce');
  
//List des type match (ex [i:id]

$router->addMatchTypes(array('titre' => '[a-zA-Z0-9-]++'));
 
 

  /* Match the current request */
$match = $router->match();

if ($match) {
  list( $controller, $action ) = explode( '#', $match['target'] );
  if ( is_callable(array($controller, $action)) ) {
      $obj = new $controller();
      call_user_func_array(array($obj,$action), array($match['params']));
 } 
}
else {
    if ($match['target']==''){
        $PageTitle = 'Oups !';
    include('app/view/404.php'); 
    //possibly throw a 404 error
    } else {
        $PageTitle = 'Oups !';
    include('app/view/404.php'); 
    //possibly throw a 404 error
    }
}