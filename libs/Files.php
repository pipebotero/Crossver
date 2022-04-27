<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Files {
    
    public static function upload($target_dir,$file){
        
        //print_r($_FILES);
        
        if($status = $_FILES[$file]["error"]>0){
            switch ($_FILES[$file]["error"]){
                case 1:
                    exit("El fichero subido excede la directiva");
                break;
            }
        }
        $extension = end(explode(".",basename($_FILES[$file]["name"])));
        $target_file = basename($_FILES[$file]["name"]);
        
        if(move_uploaded_file($_FILES[$file]["tmp_name"], $target_dir.$target_file)){
            $data[0]=$target_dir.$target_file;
            $data[1]=$extension;
            return $data;
            
        }else{
            
            return false;
        }
        
    }
    
}
