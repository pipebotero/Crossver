<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Album_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("albums");
    }
}

