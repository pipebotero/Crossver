<?php

/**
 *
 * @author afbotero
 */
class Album_controller extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->render($this,"albumes","Crossver");
    }
    
    function crea(){
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

    function verAlbums($return = false){
        $album = $this->model->get();
        $tam = sizeof($album);
        $genderCtrlr = new Genero_controller();
        $gender = $genderCtrlr->model->get();
        
        for ($i=0; $i< sizeof($album); $i++){
            $return[6][$i]=$genderCtrlr->model->getBy("idGenero",$album[$i]["idGenero"]);
        }
        
        $return[0]=$tam;
        $return[1]=$album;
        $return[2]=sizeof($gender);
        $return[3]=$gender;
        
        $AlbmartisCtrol = new Albums_has_artistas_controller();
        $AlbmArtist=$AlbmartisCtrol->model->get();
        
        $albm=0;
        for($i=0; $i<  sizeof($album); $i++){
             $AlbArt=0;
            for($j=0; $j < sizeof($AlbmArtist); $j++){
                if($album[$i]["idAlbum"]==$AlbmArtist[$j]["idAlbum"]){
                    $return[4][$albm][$AlbArt]=$AlbmArtist[$j];
                    $AlbArt=$AlbArt+1;
                }
            }
            if(!isset($return[4][$i])){
                
            }else{
                $albm=$albm+1;
            }
        }
        
        $ArtistasCtrl = new Artista_controller();
        
        for ($i=0; $i<  sizeof($return[4]); $i++){
            
            for ($j=0; $j<  sizeof($return[4][$i]); $j++){
                $return[5][$i][$j]=$ArtistasCtrl->model->getBy("idArtista",$return[4][$i][$j]["idArtista"]);
            }
        }
        
        $AlbmCanCtrl = new Albums_has_canciones_controller();
        $AlbmCan=$AlbmCanCtrl->model->get();
        
        for ($i=0; $i<  sizeof($return[1]); $i++){
            $ContAlbCan=0;
            for ($j=0; $j<  sizeof($AlbmCan); $j++){
                if($return[1][$i]["idAlbum"]==$AlbmCan[$j]["idAlbum"]){
                    $return[7][$i][$ContAlbCan]=$AlbmCan[$j];
                    $ContAlbCan=$ContAlbCan+1;
                }
            }
        }
        $CancionCtrl = new Cancion_controller();
        
        for ($i=0; $i<  sizeof($return[7]); $i++){
            
            for ($j=0; $j<  sizeof($return[7][$i]); $j++){
                $return[8][$i][$j]=$CancionCtrl->model->getBy("idCancion",$return[7][$i][$j]["idCancion"]);
            }
        }
        

        echo json_encode($return,true);
    }
    
    function sendSInfoSlct($return = false){
        $genderCtrlr = new Genero_controller();
        $gender = $genderCtrlr->model->get();
        
        $artistCtrlr = new Artista_controller();
        $artist = $artistCtrlr->model->get();
        
        
        $tamGen = sizeof($gender);
        $tamArt = sizeof($artist);
        $return[0]=$tamGen;
        $return[1]=$gender;
        $return[2]=$tamArt;
        $return[3]=$artist;
        

        echo json_encode($return,true);
    }
       
    function crear(){
        $numArtistas=$_POST["numArtis"];
        $img = Image::upload("./public/productos/", "imgAlbum");
        $img = str_replace("./","",$img);
        $tamAlbum = $this->model->get();
        $tamAlbum=  sizeof($tamAlbum);
        $idAlmb = $tamAlbum+1;
        $objAlbum= new Album($idAlmb,$_POST["nombreAlbum"],$_POST["genero"],$img);
        
        $genderCtrlr = new Genero_controller();
        $gender = Genero::where("idGenero", $_POST["genero"]);
        $objGender = new Genero(null,null);
        $genderCtrlr->model->arrayToObject($gender[0],$objGender);
        
        $artistCtrlr = new Artista_controller();
        $artist = Artista::where("idArtista", $_POST["artista"]);
        $objArtist= new Artista(null, null, null);
        $artistCtrlr->model->arrayToObject($artist[0],$objArtist);
        
        $objAlbum->has_one("fk_albums_generos",$objGender);
        
        
        $objAlbum->has_many("fk_albums_has_artistas_artistas",$objArtist);
        
        for($i=0; $i<$numArtistas; $i++){
            $iStr = strval($i+2);
            $art = "artista".$iStr;
            $artist2 = Artista::where("idArtista", $_POST[$art]);
            $objArtist2= new Artista(null, null, null);
            $artistCtrlr->model->arrayToObject($artist2[0],$objArtist2);
            $objAlbum->has_many("fk_albums_has_artistas_artistas",$objArtist2);
        }
        
        $objAlbum->create();

        header("Location: "._URL."Admin");
    }
    
    function deleteAlbum(){
        $this->model->delete($_POST["idAlbm"]);
    }
    
    function formEditar($return = false){
        $albm = $this->model->getBy("idAlbum",$_POST["idAlbum"]);
        $return[0]=$albm;
        $Albm_has_Art_Ctrl = new Albums_has_artistas_controller();
        $all_Albm_h_Art=$Albm_has_Art_Ctrl->model->get();
        $tamAlbArt = sizeof($all_Albm_h_Art);
        $return[1]=$tamAlbArt;
        $return[2]=$all_Albm_h_Art;
        $count = 0;
        
        for($i=0; $i<$tamAlbArt; $i++){
            if($all_Albm_h_Art[$i]["idAlbum"]==$_POST["idAlbum"]){
                $return[3][$count]=$all_Albm_h_Art[$i];
                $count=$count+1;
            }
        }

        for($i=0; $i<$tamAlbArt; $i++){
            if($all_Albm_h_Art[$i]["idAlbum"]==$_POST["idAlbum"] && $all_Albm_h_Art[$i]["idArtista"]==$return[3][0]["idArtista"]){
                unset($all_Albm_h_Art[$i]);
                $i=$tamAlbArt;
            }
        }
        $return[2]=$all_Albm_h_Art;
        $return[4]=sizeof($return[3]);
        $Arts_Ctrl = new Artista_controller();
        $Artistas=$Arts_Ctrl->model->get();
        $return[5]=sizeof($Artistas);
        $return[6]=$Artistas;
        echo json_encode($return,true);
    }

    function editar(){

        $img = Image::upload("./public/productos/", "imgAlbum");
        $img = str_replace("./","",$img);
        if ($img=="public/productos/"){
            $Albm=$this->model->getBy("idAlbum",$_POST["numID"]);
            $img=$Albm["imagen"];
        }
        $objAlbum= new Album($_POST["numID"],$_POST["nombreAlbum"],$_POST["genero"],$img);
        
        
        $Albm_h_artCtrl = new Albums_has_artistas_controller();
        $all_Albm_h_Art=$Albm_h_artCtrl->model->get();
        $tamAlbArt = sizeof($all_Albm_h_Art);
        for($i=0; $i<$tamAlbArt; $i++){
            if($all_Albm_h_Art[$i]["idAlbum"]==$_POST["numID"]){
                echo "Se elimino: ";
                print_r($all_Albm_h_Art[$i]);
                $this->model->delete($_POST["numID"]);
            }
        }
        
        $genderCtrlr = new Genero_controller();
        $gender = Genero::where("idGenero", $_POST["genero"]);
        $objGender = new Genero(null,null);
        $genderCtrlr->model->arrayToObject($gender[0],$objGender);
        
        
        $artistCtrlr = new Artista_controller();
        $artist = Artista::where("idArtista", $_POST["artista"]);
        $objArtist= new Artista(null, null, null);
        $artistCtrlr->model->arrayToObject($artist[0],$objArtist);
        echo "Se creo 1 :";
            print_r($objArtist);
        $objAlbum->has_one("fk_albums_generos",$objGender);
        
        
        $objAlbum->has_many("fk_albums_has_artistas_artistas",$objArtist);
        
        $numArtistas=$_POST["numArtis"];
        
        for($i=0; $i<$numArtistas; $i++){
            $iStr = strval($i+1);
            $art = "artista".$iStr;
            echo $art;
            $artist2 = Artista::where("idArtista", $_POST[$art]);
            $objArtist2= new Artista(null, null, null);
            $artistCtrlr->model->arrayToObject($artist2[0],$objArtist2);
            echo "Se creo :";
            print_r($objArtist2);
            $objAlbum->has_many("fk_albums_has_artistas_artistas",$objArtist2);
        }
        
        $objAlbum->update();
        
        header("Location: "._URL."Admin");
 
    }

}
