<?php
require_once('./public/getid3/getid3.php');
 

/**
 *
 * @author afbotero
 */
class Cancion_controller  extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render($this,"crear");
    }
    function edit(){
        $this->view->render($this,"editar");
    }
    
    function view(){
        $this->view->render($this,"view");
    }
    
    function gestionar(){
        $this->view->render($this,"gestionar");
    }
     
    function verCanciones($return = false){
        $song = $this->model->get();
        $tamSong = sizeof($song);
        $return[0]=$tamSong;
        $return[1]=$song;

        $generoCtr = new Genero_controller();
        for ($i=0; $i < $tamSong; $i++) { 
            $return[3][$i]=$generoCtr->model->getBy("idGenero", $return[1][$i]["idGenero"]);
        }

        $albmCanCtrlr= new Albums_has_canciones_controller();
        for ($i=0; $i < $tamSong; $i++) { 
            $Alb_Can[$i]=$albmCanCtrlr->model->getBy("idCancion", $return[1][$i]["idCancion"]);    
        }

        $albumCtrlr = new Album_controller();
        for ($i=0; $i < $tamSong; $i++) { 
            $return[4][$i]=$albumCtrlr->model->getBy("idAlbum", $Alb_Can[$i]["idAlbum"]);    
        }

        $artCanCtrlr= new Canciones_has_artistas_controller();
        $Can_h_Art= $artCanCtrlr->model->get(); 

       $cont_I_Art_Can=0;
       
        for ($i=0; $i < $tamSong; $i++) { 
             $countArt_Can=0;
            for ($j=0; $j < sizeof($Can_h_Art); $j++) { 
                
                if ($song[$i]["idCancion"]==$Can_h_Art[$j]["idCancion"]) {
                    $return[5][$cont_I_Art_Can][$countArt_Can]=$Can_h_Art[$j];
                    $countArt_Can=$countArt_Can+1;
                }
                
            }
            
            if(!isset($return[5][$i])){
                $return[9]="Nullo";
            }else{
                $cont_I_Art_Can=$cont_I_Art_Can+1;
            }
        }
        
        $artCtrlr = new Artista_controller();
        $artistasCan= $artCtrlr->model->get();

        for ($i=0; $i < sizeof($return[5]); $i++) { 
             $countArt_Can=0;
            for ($k=0; $k < sizeof($return[5][$i]); $k++) { 
                for ($j=0; $j < sizeof($artistasCan); $j++) { 

                    if ($return[5][$i][$k]["idArtista"]==$artistasCan[$j]["idArtista"]) {
                        $return[6][$i][$countArt_Can]=$artistasCan[$j];
                        $countArt_Can=$countArt_Can+1;
                    }
                }
            }
                
        }


        
        
        echo json_encode($return,true);
    }
    
    function sendSInfToSlct($return = false){
        $albumCtrlr = new Album_controller();
        $album = $albumCtrlr->model->get();
        
        $genderCtrlr = new Genero_controller();
        $gender = $genderCtrlr->model->get();
        
        $artistCtrlr = new Artista_controller();
        $artist = $artistCtrlr->model->get();
        
        $tamAlbm = sizeof($album);
        $tamGen = sizeof($gender);
        $tamArt = sizeof($artist);
        
        $return[0]=$tamAlbm;
        $return[1]=$album;
        $return[2]=$tamGen;
        $return[3]=$gender;
        $return[4]=$tamArt;
        $return[5]=$artist;
        

        echo json_encode($return,true);
    }
    
       
    function crear(){
        
        $numArtistas=$_POST["numArtis"];
        $tamCanciones = $this->model->get();
        $tamCanciones=  sizeof($tamCanciones);
        $idSong = $tamCanciones+1;
        
        $fileCancion = Files::upload("./public/canciones/", "srcCancion");
        $fileCancion = str_replace("./","",$fileCancion);
        $getID3 = new getID3;
        $mixinfo = $getID3->analyze($fileCancion[0]);
        $bitrate=$mixinfo["bitrate"];
        $fileSize=$mixinfo["filesize"];

        $duracion=explode(".", $mixinfo["playtime_seconds"]);
        //print_r($mixinfo);
        $objCancion= new Cancion($idSong, $_POST["nombreCancion"], $_POST["genero"], $duracion[0], 
                $_POST["year"], $bitrate, $fileCancion[1], $fileSize, $fileCancion[0], $_POST["precio"]);
        
        
        $albumtCtrlr = new Album_controller();
        $album = Album::where("idAlbum", $_POST["album"]);
        $objAlbum= new Album(null, null, null, null);
        $albumtCtrlr->model->arrayToObject($album[0],$objAlbum);
        
        $genderCtrlr = new Genero_controller();
        $gender = Genero::where("idGenero", $_POST["genero"]);
        $objGender = new Genero(null,null);
        $genderCtrlr->model->arrayToObject($gender[0],$objGender);
        
        $artistCtrlr = new Artista_controller();
        $artist = Artista::where("idArtista", $_POST["artista"]);
        $objArtist= new Artista(null, null, null);
        $artistCtrlr->model->arrayToObject($artist[0],$objArtist);
        
        $objCancion->has_one("fk_canciones_generos",$objGender);
        $objCancion->has_many("fk_canciones_has_albums_albums",$objAlbum);
        $objCancion->has_many("fk_canciones_has_artistas_artistas",$objArtist);
        
        for($i=0; $i<$numArtistas; $i++){
            $iStr = strval($i+2);
            $art = "artista".$iStr;
            $artist2 = Artista::where("idArtista", $_POST[$art]);
            $objArtist2= new Artista(null, null, null);
            $artistCtrlr->model->arrayToObject($artist2[0],$objArtist2);
            $objCancion->has_many("fk_canciones_has_artistas_artistas",$objArtist2);
        }
        
        $objCancion->create();

        header("Location: "._URL."Admin");
        
    }
    
    function formEditar($return = false){
        $cancion = $this->model->getBy("idCancion",$_POST["idCancion"]);
        
      
        $return[0]=$cancion;
        
        $albm_canCtrl = new Albums_has_canciones_controller();
        $albm = $albm_canCtrl->model->getBy("idCancion",$_POST["idCancion"]);
        $return[1]=$albm;
        
        $can_artCtrl = new Canciones_has_artistas_controller();
        $can_art = $can_artCtrl->model->get();
        $contArt = 0;
        for ($i = 0; $i<sizeof($can_art); $i++){
            if($can_art[$i]["idCancion"]==$_POST["idCancion"]){
                $return[2][$contArt]=$can_art[$i];
                $contArt=$contArt+1;
            }
        }
        
        $artistaCtrl = new Artista_controller();
        $artist = $artistaCtrl->model->get();
        $return[3]=$artist;
        echo json_encode($return,true);
        
    }
    
    function editar(){
        $numArtistas=$_POST["numArtis"];
        $fileCancion = Files::upload("./public/canciones/", "srcCancion");
        
        if($fileCancion==null){
            $cancion = $this->model->getBy("idCancion",$_POST["idCancion"]);
            $objCan= new Cancion(null, null, null, null, null, null, null, null, null, null);
            $objCancion= new Cancion($_POST["idCancion"], $_POST["nombreCancion"], $_POST["genero"], $cancion["duracion"], 
                $_POST["year"], $cancion["bitrate"], $cancion["formato"], $cancion["size"], $cancion["archivo"], $_POST["precio"]);
        
        }else{
        $fileCancion = str_replace("./","",$fileCancion);
        $getID3 = new getID3;
        $mixinfo = $getID3->analyze($fileCancion[0]);
        $bitrate=$mixinfo["bitrate"];
        $fileSize=$mixinfo["filesize"];
        $duracion=explode(".", $mixinfo["playtime_seconds"]);
        $objCancion= new Cancion($_POST["idCancion"], $_POST["nombreCancion"], $_POST["genero"], $duracion[0], 
                $_POST["year"], $bitrate, $fileCancion[1], $fileSize, $fileCancion[0], $_POST["precio"]);
        }
        
        $genderCtrlr = new Genero_controller();
        $gender = Genero::where("idGenero", $_POST["genero"]);
        $objGender = new Genero(null,null);
        $genderCtrlr->model->arrayToObject($gender[0],$objGender);
        
        $albumtCtrlr = new Album_controller();
        $album = Album::where("idAlbum", $_POST["album"]);
        $objAlbum= new Album(null, null, null, null);
        $albumtCtrlr->model->arrayToObject($album[0],$objAlbum);
        
        $artistCtrlr = new Artista_controller();
        $artist = Artista::where("idArtista", $_POST["artista"]);
        $objArtist= new Artista(null, null, null);
        $artistCtrlr->model->arrayToObject($artist[0],$objArtist);
        
        $objCancion->has_one("fk_canciones_generos",$objGender);
        $objCancion->has_many("fk_canciones_has_albums_albums",$objAlbum);
        $objCancion->has_many("fk_canciones_has_artistas_artistas",$objArtist);

        for ($i=1; $i <= $numArtistas; $i++) { 
           $art = "slctArtista".$i; 
           $artista = $artistCtrlr->model->getBy("idArtista",$_POST[$art]);
           $objArtist2= new Artista(null, null, null);
           $artistCtrlr->model->arrayToObject($artista,$objArtist2);
           $objCancion->has_many("fk_canciones_has_artistas_artistas",$objArtist2);
        }
        
        $objCancion->update();

        header("Location: "._URL."Admin");
        
    }
    
    function deleteCancion(){
        print_r($_POST["idCancion"]);
        $this->model->delete($_POST["idCancion"]);
    }

    function getCancion($return=false){
        $Song = $this->model->getBy("idCancion", $_POST["idCancion"]);
        $return = $Song;
        echo json_encode($return,true);
    }
    
}
