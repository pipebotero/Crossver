<?php

/**
 *
 * @author afbotero
 */
class Genero extends ORM{
    
    
    protected static $table="generos";
    
    public $idGenero,$genero;
    
    
    public function __construct($idGenero,$genero) {
        $this->idGenero = $idGenero;
        $this->genero = $genero;
    }
    function getIdGenero() {
        return $this->idGenero;
    }

    function getGenero() {
        return $this->genero;
    }

    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }
}