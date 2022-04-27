<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Cancion_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("canciones");
    }

}
