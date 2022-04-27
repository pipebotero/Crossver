<?php

/**
 * Description of Index
 *
 * @author afbotero
 */
class Albumes_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->render($this,"albumes","Crossver");
    }
    
    
}
