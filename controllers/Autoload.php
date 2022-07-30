<?php

class Autoload{
    public function __construct(){
        //https://www.php.net/manual/es/function.spl-autoload-register.php
    spl_autoload_register(function($class_name){
        $models_path = './models/'.$class_name.'.php';
        $controllers_path = './controllers/'.$class_name.'.php';
        
        if(file_exists($models_path)){
            
            require_once($models_path);
            //echo "<p>$models_path</p>";
        }
        if(file_exists($controllers_path)){
            
            require_once($controllers_path);
           // echo "<p>$controllers_path</p>";

        }
    });
}

    public function __destruct(){
    unset($this->model);
}
}
