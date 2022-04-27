<?php

/**
 * Description of Index
 *
 * @author afbotero
 */
class Artistas_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->render($this,"artistas","Crossver");
    }
    
    
}
