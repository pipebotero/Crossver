<?php

/**
 * Description of Controller
 *
 * @author afbotero
 */
class Controller {
    
    function __construct() {
        $this->view = new View();
        $this->loadModel();
        Session::init();
    }
    
    function loadModel(){
        $model = substr(get_class($this), 0, -11)."_model";
        $path = './models/'.$model.'.php';
        
        if(file_exists($path)){
            require $path;
            $this->model = new $model();
        }
    }
    
    function validateKeys($keys,$where){
        foreach ( $keys as $key ){
            if(empty($where[$key]) or !isset($where[$key])){
                exit("No se encuentra el campo ".$key."!");
            }
        }
        return true;
    }
    
    
    
}

spl_autoload_register(function($class){
    if(file_exists("./controllers/".$class.".php")){
        require "./controllers/".$class.".php";
    }
});
