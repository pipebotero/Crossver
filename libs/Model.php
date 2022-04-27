<?php

/**
 * Description of Model
 *
 * @author afbotero
 */
class Model extends ORM{
    
    protected static $table;
    
    function __construct() {
        //$this->db = new MySQLiManager(DB_HOST,DB_USER,DB_PASS,DB_NAME); //MySQLiManager
        $this->db = new Database(_DB_TYPE, _DB_HOST, _DB_NAME, _DB_USER, _DB_PASS);//PDO
    }
    
    function get(){
        return $this->db->select('SELECT * from '.self::$table);
    }
    
    function save($data){
        //print_r($data);
        return $this->db->insert(self::$table,$data);
    }
    
    function update($data,$where){
        return $this->db->update(self::$table,$data,$where);
    }
    
    function toma($id){
        return $id;
    }
            
    function delete($id){
        if(substr(get_class($this), 0, -6)=="Albums_has_artistas"){
            return $this->db->delete(self::$table,"id".substr(get_class($this), 0, -20)." = ".$id);
        }
        elseif(substr(get_class($this), 0, -6)=="Canciones_has_artistas"){
            return $this->db->delete(self::$table,"id".substr(get_class($this), 0, -21)." = ".$id);
        }
        elseif(substr(get_class($this), 0, -6)=="Albums_has_canciones"){
            return $this->db->delete(self::$table,"id".substr(get_class($this), 0, -21)." = ".$id);
        }
        else{
            return $this->db->delete(self::$table,"id".substr(get_class($this), 0, -6)." = ".$id);
        }
        return $id;
    }

            function getBy($field,$value){
        return array_shift($this->db->select('SELECT * from '.self::$table.' WHERE '.$field.' = :'.$field,
                                array(":".$field=> $value)));
    }
    
    public static function setTable($table){
        self::$table = $table;
    }

    function arrayToObject($arr,$obj){
        
        foreach ($arr as $key => $value)
        {
            $obj->$key = $value;
        }
    }
}
