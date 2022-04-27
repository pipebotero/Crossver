<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Hash {
    
    public static function create($data,$algo = "sha512"){
        
        $context = hash_init($algo, HASH_HMAC, _KEY);
        hash_update($context, $data);
        
        return hash_final($context);
        
    }
    
}
