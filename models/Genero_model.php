<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Genero_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("generos");
    }

}
