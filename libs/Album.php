<?php

/**
 *
 * @author afbotero
 */
class Album extends ORM{
    
    
    protected static $table="albums";
    
    public $idAlbum,$nombreAlbum,$idGenero,$imagen;
    
    public $has_one = array(
    	'fk_albums_generos'=>array(
    		    'class'=>'Genero',
	            'join_as'=>'idGenero',
	            'join_with'=>'idGenero',
	            'fkey_table'=>'generos'
    		));
    
    public $has_many = array(
        'fk_albums_has_artistas_artistas'=>array(
            'class'=>'Artista', 
            'join_self_as'=>'idAlbum',
            'join_other_as'=>'idArtista', 
            'join_table' => 'albums_has_artistas'));
    
    
    public function __construct($idAlbum,$nombreAlbum,$idGenero,$imagen) {
        $this->idAlbum = $idAlbum;
        $this->nombreAlbum = $nombreAlbum;
        $this->idGenero = $idGenero;
        $this->imagen = $imagen;
    }
    function getIdAlbum() {
        return $this->idAlbum;
    }

    function getNombreAlbum() {
        return $this->nombreAlbum;
    }

    function getIdGenero() {
        return $this->idGenero;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdAlbum($idAlbum) {
        $this->idAlbum = $idAlbum;
    }

    function setNombreAlbum($nombreAlbum) {
        $this->nombreAlbum = $nombreAlbum;
    }

    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
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