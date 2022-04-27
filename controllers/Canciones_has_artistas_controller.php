<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Canciones_has_artistas_controller extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    function deleteRelacion($return=false){

        $all_Can_h_Art=$this->model->get();

        $tamCanArt = sizeof($all_Can_h_Art);
        for($i=0; $i<$tamCanArt; $i++){
            if($all_Can_h_Art[$i]["idCancion"]==$_POST["idCancion"]){
                $return[$i]=$all_Can_h_Art[$i];
                $this->model->delete($_POST["idCancion"]);
            }
        }
        echo json_encode($return,true);
        
    }
}