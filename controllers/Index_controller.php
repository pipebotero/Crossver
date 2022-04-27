<?php

/**
 * Description of Index
 *
 * @author afbotero
 */
class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->render($this,"index","Crossver");
    }
    
}
