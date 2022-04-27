<?php

/**
 * Description of Usuario_model
 *
 * @author afbotero
 */
class Producto_model extends Model{
    public function __construct() {
        parent::__construct();
        $this->setTable("productos");
    }
    /*
    function toObject($arr){
        //$arr = get_object_vars($this);
        $obj = json_decode(json_encode($arr), FALSE);
        $object = new Producto($obj->idProduct,$obj->productname,$obj->price,$obj->calificacion,$obj->stock,$obj->descripcion);
        return $object;
    }*/
}
