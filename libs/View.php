<?php

/**
 * Description of View
 *
 * @author afbotero
 */
class View {
    
    function render($controller,$view,$title = ""){
        $controller = get_class($controller);
        $controller = substr($controller, 0, -11); // returns "d"
        $path = './views/'.$controller.'/'.$view;
        
        if(file_exists($path.".php")){
            if ($title != "") {
                $this->title = $title;
                require "./views/modules/header.php";
            }
            require $path.".php";
        }elseif (file_exists($path.".html")) {
            if ($title != "") {
                $this->title = $title;
                require "./views/modules/header.php";
            }
            require $path.".html";
        }else{
            echo "Error: Invalid view ".$view." to render";
        }
    }
    
}
