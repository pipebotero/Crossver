<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Carrito_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("carritos");
    }

}
