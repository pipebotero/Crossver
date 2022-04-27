<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Canciones_has_artistas_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("canciones_has_artistas");
    }
}