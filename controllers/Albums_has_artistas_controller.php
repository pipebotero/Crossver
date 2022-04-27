<?php


/**
 *
 * @author afbotero
 */
class Albums_has_artistas_controller extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function deleteRelacion($return=false){

        $all_Albm_h_Art=$this->model->get();
        $tamAlbArt = sizeof($all_Albm_h_Art);
        for($i=0; $i<$tamAlbArt; $i++){
            if($all_Albm_h_Art[$i]["idAlbum"]==$_POST["idAlbum"]){
                $this->model->delete($_POST["idAlbum"]);
            }
        }
    }
   
}
