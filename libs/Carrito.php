<?php

/**
 * Description of idUsuario
 *
 * @author afbotero
 */
class Carrito extends ORM{
    
    protected static $table="carritos";
    
    public $idUsuario,$idCancion;
    
    
    public function __construct($idUsuario,$idCancion) {
        $this->idUsuario = $idUsuario;
        $this->idCancion = $idCancion;

    }


}
