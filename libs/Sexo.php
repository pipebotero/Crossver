<?php

/**
 *
 * @author afbotero
 */
class Sexo extends ORM{
    
    
    protected static $table="sexo";
    
    public $idSexo,$sexo;
    
    public function __construct($idSexo,$sexo) {
        $this->idSexo = $idSexo;
        $this->sexo = $sexo;
    }
    function getIdSexo() {
        return $this->idSexo;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setIdSexo($idSexo) {
        $this->idSexo = $idSexo;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }
}