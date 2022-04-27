<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>

        <form id="formCancion" class="formularios forms" action="<?php echo _URL; ?>Cancion/editar" method="POST" enctype="multipart/form-data">
            <input id="nomCancionEdit" name="nombreCancion" type="text" placeholder="Canción" >
            <select id="slctAlbum" name="album">
			<option value="">Seleccione Álbum</option>
            </select>
            <select id="slctGenero" name="genero">
			<option value="">Seleccione Genero</option>
            </select>
            <select id="slctArtista" name="artista">
			<option value="">Seleccione Artista</option>
            </select>
                   <input id="yearCancionEdit" name="year" type="text" placeholder="Año" >
            <input id="srcCancion" name="srcCancion" type="file">
            <input id="precioCancionEdit" name="precio" type="text" placeholder="Precio" >
            <input type="submit" value="">
        </form>
        <button onclick="fcnAddArtista()">Añadir otro Artista</button>
        <script>
            var acumulador=1;
            
            function fcnVerSelects(){
            $.ajax({
                    url:"<?php echo _URL; ?>Cancion/sendSInfToSlct",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    
                    for(var i = 0; i < json[0]; i++) {
                        var slctAlbum = document.createElement("option");
                        slctAlbum.value=json[1][i]["idAlbum"];
                        slctAlbum.innerHTML=json[1][i]["nombreAlbum"];
                        document.getElementById("slctAlbum").appendChild(slctAlbum);
                    }
                    
                    for(var i = 0; i < json[2]; i++) {
                        var slctGenero = document.createElement("option");
                        slctGenero.value=json[3][i]["idGenero"];
                        slctGenero.innerHTML=json[3][i]["genero"];
                        document.getElementById("slctGenero").appendChild(slctGenero);
                    }
                    
                    for(var i = 0; i < json[4]; i++) {
                        var slctArtista = document.createElement("option");
                        slctArtista.value=json[5][i]["idArtista"];
                        slctArtista.innerHTML=json[5][i]["nombreArtista"];
                        document.getElementById("slctArtista").appendChild(slctArtista);
                    }
                    
                    
                });   
        }     
        
        function fcnAddArtista(){
                
                acumulador+=1;
                var selectArtista = document.createElement("select");
                var nombre = "slctArtista"; nombre = nombre.concat(acumulador);
                selectArtista.name=nombre;
                selectArtista.id=nombre; selectArtista.className="selector";
                var opt = document.createElement("option");
                opt.innerHTML="Seleccione Artista";
                selectArtista.appendChild(opt);
                
                
                $.ajax({
                    url:"<?php echo _URL; ?>Album/sendSInfoSlct",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                for(var i = 0; i < json[2]; i++) {
                        var slctArtista = document.createElement("option");
                        slctArtista.value=json[3][i]["idArtista"];
                        slctArtista.innerHTML=json[3][i]["nombreArtista"];
                        selectArtista.appendChild(slctArtista);
                    }
                    $(".formularios").append("<br>");
                    $(".formularios").append(selectArtista);
                    
                    });
                    
                    sendNumArt.value=acumulador;
                    
            }
            var sendNumArt = document.createElement("input");
            sendNumArt.name="numArtis";
            sendNumArt.className="oculto";
            $(".formularios").append(sendNumArt);
                    
                    $(document).on("ready", fcnVerSelects);
                    
        
        function fcnSetAcum(acum){
        console.log("RN");
            acumulador=acum;
            sendNumArt.value=acumulador;
        }
                    
       </script>
    </body>
</html>