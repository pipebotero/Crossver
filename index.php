<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
require 'config.php';

//var = ( condición) ? si es verdadero : si es falso;
$url = ( isset($_GET["url"]) ) ? $_GET["url"] : "Index/index";
$url = explode("/", $url);

$controller = ( isset($url[0]) ) ? $url[0]."_controller" : "Index_controller";
$method = ( isset($url[1]) && $url[1] != null) ? $url[1] : "index";
$params = ( isset($url[2]) && $url[2] != null) ? $url[2] : null;


spl_autoload_register(function($class){
    if(file_exists(_LIBS.$class.".php")){
        require _LIBS.$class.".php";
    }
});

$path = "./controllers/".$controller.".php";

if(file_exists($path)){
    require $path;
    $controller = new $controller();
    
    
    if(isset($method)){
        if(method_exists($controller, $method)){
            if(isset($params) && $params != null){
                $controller->{$method}($params);
            }else{
                $controller->{$method}();
            }
        }else{
            exit("Invalid Method");
        }
      
    }
    
}else{
    exit("Invalid Controller");
}
