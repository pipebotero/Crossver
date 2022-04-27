<?php

 

/**
 *
 * @author afbotero
 */
class Albums_has_canciones_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function deleteRelacion($return=false){

        $all_Can_h_Albm=$this->model->get();
        $tamCanAlbm = sizeof($all_Can_h_Albm);
        for($i=0; $i<$tamCanAlbm; $i++){
            if($all_Can_h_Albm[$i]["idCancion"]==$_POST["idCancion"]){
               $return[$i]=$all_Can_h_Albm[$i];
                $this->model->delete($_POST["idCancion"]);
            }
        }
        echo json_encode($return,true);
    }
   
}
