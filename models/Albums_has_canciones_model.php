<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Albums_has_canciones_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("albums_has_canciones");
    }
}

