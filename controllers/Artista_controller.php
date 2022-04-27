<?php

/**
 *
 * @author afbotero
 */
class Artista_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear");
    }
    
    function view(){
        $this->view->render($this,"view");
    }
     
    function verArtistas($return = false){
        $artist = $this->model->get();
        $tam = sizeof($artist);
        $return[0]=$tam;
        $return[1]=$artist;

        $AlbmArtCrtl = new Albums_has_artistas_controller();
        $AlbmArt = $AlbmArtCrtl->model->get();
        $return[5]=$AlbmArt;
        
        $countArt=0;
        for ($i=0; $i < sizeof($artist); $i++) { 
            $countAlbArt=0;
            for ($j=0; $j < sizeof($AlbmArt); $j++) { 
                
                if ($artist[$i]["idArtista"]==$AlbmArt[$j]["idArtista"]) {
                    $return[3][$countArt][$countAlbArt]=$AlbmArt[$j];
                    $countAlbArt=$countAlbArt+1;
                }
            }
            if(!isset($return[3][$i])){
                
            }else{
                $countArt=$countArt+1;
            }
        }

        $AlbumsCtrl = new Album_controller();
        
        for ($i=0; $i<  sizeof($return[3]); $i++){
            
            for ($j=0; $j<  sizeof($return[3][$i]); $j++){
                $return[4][$i][$j]=$AlbumsCtrl->model->getBy("idAlbum",$return[3][$i][$j]["idAlbum"]);
            }
        }



        echo json_encode($return,true);
    }
       
    function crear(){
        $img = Image::upload("./public/artistas/", "imgArtista");
        $img = str_replace("./","",$img);
        $objImg= new Artista(null,$_POST["nombreArtista"],$img);
        print_r($objImg);
        $data = $objImg->toArray();
        $this->model->save($data);
        header("Location: "._URL."Admin");
        
    }

}
