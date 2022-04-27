<?php

/**
 *
 * @author afbotero
 */
class Usuario_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear");
    }
    
    function view(){
        $this->view->render($this,"view");
    }
    
    function crearAdmin(){
        $this->view->render($this,"crearPanelAdmin");
    }
    
    
    function gestionar(){
        $this->view->render($this,"gestionar");
    }
    
    function verUsuarios($return = false){
        $users = $this->model->get();
        $tam = sizeof($users);
        $return[0]=$tam;
        $return[1]=$users;
        
        $sexCtrl= new Sexo_controller();
        $sexos=$sexCtrl->model->get();
        $tamSex = sizeof($sexos);
        $return[2]=$tamSex;
        $return[3]=$sexos;

        $rolCtrl= new Rol_controller();
        $roles=$rolCtrl->model->get();
        $tamrol = sizeof($roles);
        $return[4]=$tamrol;
        $return[5]=$roles;

        echo json_encode($return,true);
    } 
    
    function crear(){
        $password = Hash::create(filter_input(INPUT_POST, "password"));
        $user = new Usuario(null,$_POST["nombreUsuario"],$_POST["email"],$password,$_POST["sexo"],1);
        
        $sex = new Sexo_controller();
        $arrSexo = Sexo::where("idSexo", $_POST["sexo"]);
        $objSexo = new Sexo(null,null);
        $sex->model->arrayToObject($arrSexo[0],$objSexo);
        
        $rol = new Rol_controller();
        $arrRol = $rol->model->getBy("idRol",1);
        $objRol = new Rol(null,null);
        $rol->model->arrayToObject($arrRol,$objRol);
        
        print_r($user);
        $user->has_one("fk_usuarios_sexo",$objSexo);
        $user->has_one("fk_usuarios_roles",$objRol);
        $user->create();
    }
    
    function crearUserAdmin(){
        $password = Hash::create(filter_input(INPUT_POST, "password"));
        $user = new Usuario(null,$_POST["nombreUsuario"],$_POST["email"],$password,$_POST["sexo"],1);
        
        $sex = new Sexo_controller();
        $arrSexo = Sexo::where("idSexo", $_POST["sexo"]);
        $objSexo = new Sexo(null,null);
        $sex->model->arrayToObject($arrSexo[0],$objSexo);
        
        $rol = new Rol_controller();
        $arrRol = Rol::where("idRol", 1);
        $objRol = new Rol(null,null);
        $rol->model->arrayToObject($arrRol[0],$objRol);
        
        $user->has_one("fk_usuarios_sexo",$objSexo);
        $user->has_one("fk_usuarios_roles",$objRol);
        $user->create();
    }
    
    function crearfromAdmin(){
        $password = Hash::create(filter_input(INPUT_POST, "password"));
        $user = new Usuario(null,$_POST["nombreUsuario"],$_POST["email"],$password,$_POST["sexo"],$_POST["rol"]);
        
        $sex = new Sexo_controller();
        $arrSexo = Sexo::where("idSexo", $_POST["sexo"]);
        $objSexo = new Sexo(null,null);
        $sex->model->arrayToObject($arrSexo[0],$objSexo);
        
        $rol = new Rol_controller();
        $arrRol = Rol::where("idRol", $_POST["rol"]);
        $objRol = new Rol(null,null);
        $rol->model->arrayToObject($arrRol[0],$objRol);

        $user->has_one("fk_usuarios_sexo",$objSexo);
        $user->has_one("fk_usuarios_roles",$objRol);
        $user->create();
        
        header("Location: "._URL."Admin");
        
    }
    
    function irAdminPanel(){
        $AdminPanel = new Admin_controller();
        $AdminPanel->view->render($AdminPanel,"index","Admin | Panel");
    }
            
    function formEditar(){

        $userToEdit[0] = $this->model->getBy("idUsuario",$_POST["idUsr"]);
        $sexCtrl= new Sexo_controller();
        $sexos=$sexCtrl->model->get();
        $userToEdit[1] = sizeof($sexos);
        $userToEdit[2]=$sexos;
        $rolCtrl= new Rol_controller();
        $roles=$rolCtrl->model->get();
        $userToEdit[3] = sizeof($roles);
        $userToEdit[4]=$roles;
        $userToEdit[5]=_URL;
        
        echo json_encode($userToEdit,false);
        }
        
        
        
        /***** EDITAR USUARIO *****/
        
    function editar(){
        echo "Si edito";
        $userToEdit = $this->model->getBy("idUsuario",$_POST["idUsuario"]);
        $user = new Usuario($_POST["idUsuario"],$_POST["nombreUsuario"],$_POST["email"],$userToEdit["password"],$_POST["sexo"],$_POST["rol"]);
        print_r($user);
        $sex = new Sexo_controller();
        $arrSexo = Sexo::where("idSexo", $_POST["sexo"]);
        $objSexo = new Sexo(null,null);
        $sex->model->arrayToObject($arrSexo[0],$objSexo);
        print_r($objSexo);
        $rol = new Rol_controller();
        $arrRol = Rol::where("idRol", $_POST["rol"]);
        $objRol = new Rol(null,null);
        $rol->model->arrayToObject($arrRol[0],$objRol);
        print_r($objRol);
        
        $user->has_one("fk_usuarios_sexo",$objSexo);
        $user->has_one("fk_usuarios_roles",$objRol);
        $user->update();
        
        header("Location: "._URL."Admin");
    }

    function eliminar(){
        $this->model->delete($_POST["idUsr"]);
    }
    
    
    public function login(){
        $this->view->render($this,"login");
    }
    
    public function logMeIn(){
        
        $usr = $this->validateLogin();
        
        if($usr != false){
            $this->crearSesion($usr);
            header("Location: "._URL);
        }else{
            header("Location: "._URL);
        }
    }
    
    public function validateLogin(){
        $keys = array('email','password');
        $this->validateKeys($keys, filter_input_array(INPUT_POST));
        
        $password = Hash::create(filter_input(INPUT_POST, "password"));

        if(!$this->checkEmail(true)){
            exit("Usuario no existente");
        } 
        
        $usr = $this->model->getBy("correo",filter_input(INPUT_POST, "email"));
        
        if($password == $usr["password"]){
            return $usr;
        }else{
            return false;
        }
    }
    
     public function checkEmail($return = false){
        if(null == (filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL))){
            exit("No se disponen de datos necesarios");
        }
        $coincidences = sizeof($this->model->getBy("correo",filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)));
        
        $r = ($coincidences>0) ? 1 : 0;
        if (!$return) {
            print($r);
        } else
            return $r;
    }
    
    public function crearSesion($usr){
        Session::set("idUsuario", $usr["idUsuario"]);
        Session::set("nombreUsuario", $usr["nombreUsuario"]);
        Session::set("email", $usr["email"]);
    }
    
    public function logout(){
        Session::destroy();
        header("Location: "._URL);
    }
    
}
