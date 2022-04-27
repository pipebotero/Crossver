<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Artista_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("artistas");
    }
}

