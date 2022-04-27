<?php

/**
 *
 * @author afbotero
 */
class Rol_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear","Rol-Crear");
    }
    
    function view(){
        $this->view->render($this,"view","Rol-View");
    }
    
    function crear(){
        
        $rol = new Rol(null,$_POST["rol"]);
        print_r($rol);
        $data = $rol->toArray();
        $this->model->save($data);
    }
    
    function verRoles($return = false){
        $roles = $this->model->get();
        $tam = sizeof($roles);
        $return[0]=$tam;
        $return[1]=$roles;
        echo json_encode($return,true);
    }
           
}
