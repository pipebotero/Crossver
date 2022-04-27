<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Rol_model extends Model{
    
    public function __construct() {
        parent::__construct();
        $this->setTable("roles");
    }
    
}
