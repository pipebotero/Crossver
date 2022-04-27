<?php

/**
 *
 * @author afbotero
 */
class Rol extends ORM{
    
    
    protected static $table="roles";
    
    public $idRol,$rol;
    
    public function __construct($idRol,$rol) {
        $this->idRol = $idRol;
        $this->rol = $rol;
    }
    function getIdRol() {
        return $this->idRol;
    }

    function getRol() {
        return $this->rol;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }
}