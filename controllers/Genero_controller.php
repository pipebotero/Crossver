<?php

/**
 *
 * @author afbotero
 */
class Genero_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear");
    }
    
    function view(){
        $this->view->render($this,"view");
    }
     
    function verGeneros($return = false){
        $gen = $this->model->get();
        $tam = sizeof($gen);
        $return[0]=$tam;
        $return[1]=$gen;
        echo json_encode($return,true);
    }
       
    function crear(){
        $gen= new Genero(null,$_POST["genero"]);
        print_r($gen);
        $data = $gen->toArray();
        $this->model->save($data); 
        header("Location: "._URL."Admin");
    }
}
