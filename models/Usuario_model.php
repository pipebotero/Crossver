<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Usuario_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("usuarios");
    }
}
