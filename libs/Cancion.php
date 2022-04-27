<?php

/**
 * Description of Usuario
 *
 * @author afbotero
 */
class Cancion extends ORM{
    
    public $idCancion,$nombreCancion,$idGenero,$duracion,$year,$bitrate,$formato,$size,$archivo,$precio;

    protected static $table="canciones";
    
    public $has_one = array(
    	'fk_canciones_generos'=>array(
    		    'class'=>'Genero',
	            'join_as'=>'idGenero',
	            'join_with'=>'idGenero',
	            'fkey_table'=>'generos'
    		));
    
    public $has_many = array(
        'fk_canciones_has_artistas_artistas'=>array(
            'class'=>'Artista', 
            'join_self_as'=>'idCancion',
            'join_other_as'=>'idArtista', 
            'join_table' => 'canciones_has_artistas'),
        
        'fk_canciones_has_albums_albums'=>array(
            'class'=>'Album', 
            'join_self_as'=>'idCancion',
            'join_other_as'=>'idAlbum', 
            'join_table' => 'albums_has_canciones'));
    
    public function __construct($idCancion,$nombreCancion,$idGenero,$duracion,$year,$bitrate,$formato,$size,$archivo,$precio) {
        $this->idCancion = $idCancion;
        $this->nombreCancion = $nombreCancion;
        $this->idGenero = $idGenero;
        $this->duracion = $duracion;
        $this->year = $year;
        $this->bitrate = $bitrate;
        $this->formato = $formato;
        $this->size = $size;
        $this->archivo = $archivo;
        $this->precio = $precio;
    }
    
    function getIdCancion() {
        return $this->idCancion;
    }

    function getNombreCancion() {
        return $this->nombreCancion;
    }

    function getIdGenero() {
        return $this->idGenero;
    }
    
    function getDuracion() {
        return $this->duracion;
    }

    function getYear() {
        return $this->year;
    }
    
    function getBitrate() {
        return $this->bitrate;
    }

    function getFormato() {
        return $this->formato;
    }

    function getSize() {
        return $this->size;
    }
    
    function getArchivo() {
        return $this->archivo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setIdCancion($idCancion) {
        $this->idCancion = $idCancion;
    }

    function setNombreCancion($nombreCancion) {
        $this->nombreCancion = $nombreCancion;
    }

    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }
    
    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setYear($year) {
        $this->year = $year;
    }
    
    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }


    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setSize($size) {
        $this->size = $size;
    }
    
    function setBitrate($bitrate) {
        $this->bitrate = $bitrate;
    }


    function setFormato($formato) {
        $this->formato = $formato;
    }
    
    function toArray(){
        $arr = get_object_vars($this);
        foreach ($arr as $key => $value) {
            $arr[$key] = $this->{"get".ucfirst($key)}();
        }
        return $arr;
    }

}
