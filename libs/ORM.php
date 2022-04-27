<?php

class ORM{

	private static $db;
	protected static $table;

	private static function getConnection(){
		self::$db = new Database(_DB_TYPE,_DB_HOST,_DB_NAME,_DB_USER,_DB_PASS);
	}

	public function getAll(){
		self::getConnection();
		$sql = "SELECT * FROM ".static::$table.";";
		return $results = self::$db->select($sql);
	}
        
        public function getBy($field,$value){
            self::getConnection();
            $sql = "SELECT * FROM ".static::$table." WHERE ".$field." = :".$field;
            $results = self::$db->select($sql, array(":".$field=>$value) );
            return $results;
    }
    


	public static function where($field, $value){
		self::getConnection();

		//Logger::debug("db",self::$db,"where");

		$sql = "SELECT * FROM ".static::$table." WHERE ".$field." = :".$field;
		$results = self::$db->select($sql, array(":".$field=>$value) );

		return $results;
	}


 


	public function create(){
		self::getConnection();

		$values = get_object_vars($this);

		$has_many = self::checkRelationship("has_many",$values);
		$has_one = self::checkRelationship("has_one",$values);

		$result = self::$db->insert(static::$table,$values);

		if($result){
			$result = array('error'=>0,'getID'=> self::$db->getInsertedId(),'message'=>'Objeto Creado');
                        $this->{"id".get_class($this)} = $result["getID"];
                        
		}else{
			$result = array('error'=>1,'getID'=> null,'message'=> self::$db->getError());
		}

		if($has_many){ 
			$rStatus = self::saveRelationships($has_many); 
			if($rStatus["error"]){
				Logger::alert("Error saving relationships",$rStatus["trace"],"create");
			}
		}

		return $result;
	}

	public function update(){
		self::getConnection();
                
		$values = get_object_vars($this);
                
		$has_many = self::checkRelationship("has_many",$values);
		$has_mone = self::checkRelationship("has_one",$values);

		$result = self::$db->update(static::$table,$values,"id".get_class($this)." = ".$values["id".get_class($this)]);
  
		if($result){
			$result = array('error'=>0,'message'=>'Objeto Actualizado');
		}else{
			$result = array('error'=>1,'message'=> self::$db->getError());
		}

		if($has_many){ 
			$rStatus = self::saveRelationships($has_many); 
			if($rStatus["error"]){
				Logger::alert("Error saving relationships",$rStatus["trace"],"save");
			}
		}
		Logger::debug("result",$result,"save");

		return $result;
	}

	public function saveRelationships($relationships){
            $log = array("error"=>0,"trace"=>array());
        	foreach ($relationships as $name => $rules) {
        		
        		if(isset($rules["relationships"])){
        			foreach ($rules["relationships"] as $key => $relacion) {
	        			$table = $rules["join_table"];
                                        $result = self::$db->insert($table,$relacion);
                                        /*if(!$result){
                                            $log["error"] = 1;
                                            $log["trace"][] = array('relationship'=> $name,'message'=> self::$db->getError());
                                        }*/
	        		}
        		}

        	}
        	return $log;
        }

     public function has_many($rName,$obj){
            if( isset($this->has_many[$rName]) ){
            
                $rule = $this->has_many[$rName];
                if(get_class($obj) == $rule["class"]){
                    $si= $this->{"id".get_class($this)};
                    if( isset($this->{"id".get_class($this)}) && isset($obj->{"id".get_class($obj)}) ){
                        $rule["relationships"][] = array(
                          $rule['join_self_as']=>$this->{"id".get_class($this)},//id_user=>1
                          $rule['join_other_as']=>$obj->{"id".get_class($obj)}
                        );
                        $this->has_many[$rName] = $rule;
                    }else{
                        print("Se requieren llaves primarias para la relación");
                    }
                }else{
                    print("No se cumple con el tipo de objeto");
                }
                
            }else{
                print("No existe este tipo de relación");
            }
            
        }

        public function has_one($rName,$obj){
            
            if( isset($this->has_one[$rName]) ){        
                $rule = $this->has_one[$rName];
                if(get_class($obj) == $rule["class"]){
                   $this->{$rule["join_as"]} = $obj->{$rule["join_with"]};
                   }else{
                    print("No se cumple con el tipo de objeto");
                }  
            }else{
                print("No existe este tipo de relación");
            }
            
        }

	public function set($attr,$value){
		$this->{$attr} = $value;
	}

	public function checkRelationship($rType,&$data){

            if( isset($data[$rType]) ){
            	$relationship = $data[$rType];
            	unset($data[$rType]);
            	return $relationship;
            }else{
            	return false;
            }

        }
        
        function toObject($arr,$obj){
        
        foreach ($arr as $key => $value)
        {
            $obj->$key = $value;
        }
        return $obj;
    }

}

















