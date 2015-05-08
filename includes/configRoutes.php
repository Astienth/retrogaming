<?php

$router = new Router();
$router->setBasePath('/CoinRetrogaming'); //a modifier en prod

//liste des routes :

$router->map( 'GET', '/', 'annoncesController#indexAction');
$router->map( 'GET', '/list/[i:id]/[i:annonce]', 'annoncesController#listAction');
$router->map( 'POST', '/listPost', 'annoncesController#listPostAction');
  
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
    echo 'Error: no route was matched'; 
    //possibly throw a 404 error
    } else {
    echo 'Error: can not call '.$controller.'#'.$action; 
    //possibly throw a 404 error
    }
}