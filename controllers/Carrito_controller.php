<?php

 

/**
 *
 * @author afbotero
 */

class Carrito_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"view","Ver Compras");
    }

    function addProducto($return = false){
    	if(Session::get("idUsuario")){



            $usrCtrlr = new Usuario_controller();
            $usr = $usrCtrlr->model->getBy("idUsuario",  Session::get("idUsuario"));
            $UsrObj = new Usuario(null,null,null,null,null,null);
            $usrCtrlr->model->arrayToObject($usr,$UsrObj);

            $cancionCtrlr = new Cancion_controller();
            $song = $cancionCtrlr->model->getBy("idCancion", $_POST["idProducto"]);
            $SongObj = new Cancion(null,null,null,null,null,null,null,null,null,null);
            $cancionCtrlr->model->arrayToObject($song,$SongObj);
            $return=$SongObj;
            $Carro = new Carrito($usr["idUsuario"],$song["idCancion"]);

            $Carro->create();
            //$UsrObj->has_many("fk_carritos_canciones",$SongObj);
        }

        echo json_encode($return,true);
    }

    function verProductosComprados($return=false){
        $productos = $this->model->get();
        $return[0] = $productos;

        for ($i=0; $i < sizeof($productos); $i++) { 
            if(Session::get("idUsuario")==$productos[$i]["idUsuario"]){
                $return[1][$i]=$productos[$i];
            }
        }

        $cancionCtrlr = new Cancion_controller();
        $canciones = $cancionCtrlr->model->get();

        $contCanciones =0;

       for ($i=0; $i < sizeof($return[0]); $i++) {

            for ($j=0; $j < sizeof($canciones); $j++) { 

                 if($return[0][$i]["idCancion"]==$canciones[$j]["idCancion"]){
                    $return[1][$contCanciones]=$canciones[$j];
                    $contCanciones=$contCanciones+1;
                }
            }
           
        }

        echo json_encode($return,true);

    }

}