<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Tipo_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("tipos");
    }
}
