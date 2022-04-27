<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Subcategoria_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("subcategorias");
    }
}

