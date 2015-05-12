<?php

    /*** class Loader ***/
class Loader {
    
    public static function controllerLoader($class)
    {
        $path = 'app/controller/';
        include $path.$class.'.php';
    }

    public static function modelLoader($class)
    {
        $path = 'app/model/';
        include $path.$class.'.class.php';
    }
}

/*** register the loader functions ***/
spl_autoload_register('Loader::controllerLoader');
spl_autoload_register('Loader::modelLoader');
