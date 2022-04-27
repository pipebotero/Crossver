<?php

/**
 * Description of Image
 *
 * @author afbotero
 */
class Image extends Files{
    
    public static function upload($target_dir,$file){
        
        parent::upload($target_dir, $file);
        $target_file = basename($_FILES[$file]["name"]);
        return $target_dir.$target_file;
        
    }
    
}
