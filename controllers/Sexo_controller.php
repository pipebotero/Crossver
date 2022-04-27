<?php

/**
 *
 * @author afbotero
 */
class Sexo_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear");
    }
    
    function view(){
        $this->view->render($this,"view");
    }
    
    function crear(){
        
        $sexo = new Sexo(null,$_POST["sexo"]);
        print_r($sexo);
        $data = $sexo->toArray();
        $this->model->save($data);
    }
    
    function verSexos($return = false){
        $sexos = $this->model->get();
        $tam = sizeof($sexos);
        $return[0]=$tam;
        $return[1]=$sexos;
        echo json_encode($return,true);
    }
           
}
