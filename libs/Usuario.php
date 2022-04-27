<?php

/**
 * Description of idUsuario
 *
 * @author afbotero
 */
class Usuario extends ORM{
    
    protected static $table="usuarios";
    
    public $idUsuario,$nombreUsuario,$correo,$password,$idSexo,$idRol;
    
    public $has_one = array(
    	'fk_usuarios_sexo'=>array(
    		    'class'=>'Sexo',
	            'join_as'=>'idSexo',
	            'join_with'=>'idSexo',
	            'fkey_table'=>'sexo'
    		),
        'fk_usuarios_roles'=>array(
                'class'=>'Rol',
                'join_as'=>'idRol',
                'join_with'=>'idRol',
                'fkey_table'=>'roles'
            ));

    public $has_many = array(
        'fk_carritos_canciones'=>array(
            'class'=>'Cancion', 
            'join_self_as'=>'idUsuario',
            'join_other_as'=>'idCancion', 
            'join_table' => 'carritos'));
    
    public function __construct($idUsuario,$nombreUsuario,$correo,$password,$idSexo,$idRol) {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->correo = $correo;
        $this->password = $password;
        $this->idSexo = $idSexo;
        $this->idRol = $idRol;
    }
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getIdSexo() {
        return $this->idSexo;
    }

    function getIdRol() {
        return $this->idRol;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setIdSexo($idSexo) {
        $this->idSexo = $idSexo;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }
    
    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }

}
