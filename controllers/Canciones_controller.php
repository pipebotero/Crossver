<?php

/**
 * Description of Index
 *
 * @author afbotero
 */
class Canciones_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->render($this,"canciones","Crossver");
    }
    
    
}
