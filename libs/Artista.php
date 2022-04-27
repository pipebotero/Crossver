<?php

/**
 *
 * @author afbotero
 */
class Artista extends ORM{
    
    
    protected static $table="artistas";
    
    public $idArtista,$nombreArtista,$imagen;
    
    
    public function __construct($idArtista,$nombreArtista,$imagen) {
        $this->idArtista = $idArtista;
        $this->nombreArtista = $nombreArtista;
        $this->imagen = $imagen;
    }
    function getIdArtista() {
        return $this->idArtista;
    }

    function getNombreArtista() {
        return $this->nombreArtista;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdArtista($idArtista) {
        $this->idArtista = $idArtista;
    }

    function setNombreArtista($nombreArtista) {
        $this->nombreArtista = $nombreArtista;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }
}