<?php
/**
 * Description of Admin
 *
 * @author afbotero
 */
class Admin_controller extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if(Session::get("idUsuario")){
            $usrCtrlr = new Usuario_controller();
            $usr = $usrCtrlr->model->getBy("idUsuario",  Session::get("idUsuario"));
            if($usr["idRol"]>1){
                $this->view->render($this,"index","Crossver | Admin Panel");
            }else{
                header("Location: "._URL);
            }
        }else{
            header("Location: "._URL."Admin/login");
        }
        
    }
    
     public function login(){
        $this->view->render($this,"login","Admin - Login");
    }
    
    public function logMeIn(){
       $usrCtrlr = new Usuario_controller();
       
       $usr = $usrCtrlr->validateLogin();
        
        if($usr != false){
            $usrCtrlr->crearSesion($usr);
            header("Location: "._URL."Admin");
        }else{
            header("Location: "._URL."Admin/login");
        }
    } 
    
    function checkAcces($return=false){
        if(Session::get("idUsuario")){
            $usrCtrlr = new Usuario_controller();
            $usr = $usrCtrlr->model->getBy("idUsuario",  Session::get("idUsuario"));
            $userToEdit = $usrCtrlr->model->getBy("idUsuario",  $_POST["idUsua"]);
            if($usr["idRol"]<3 && $userToEdit["idRol"]==3){
                echo 0;
            }else if ($usr["idRol"]<3 && $userToEdit["idRol"]==2){
                echo 0;
            }else{
                echo 1;
            }
        }else{
            echo "¿?";
        }
    }

}
