<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>


        <form id="formAlbum" class="formularios forms" action="<?php echo _URL; ?>Album/editar" method="POST" enctype="multipart/form-data">
            <input id="iptNomAlbm" name="nombreAlbum" type="text" placeholder="Álbum" >
            <select id="slctGenero" name="genero">
			<option value="">Seleccione Genero</option>
            </select>
            <select id="slctArtista" name="artista">
			<option value="">Seleccione Artista</option>
            </select>
            
            <input id="imgAlbum" name="imgAlbum" type="file">
            <input type="submit" value="">
        </form>
        <button onclick="fcnAddArtista()">Añadir otro Artista</button>
        <script>
            
            $(document).on("ready", fcnVerGeneros);
            
            var acumulador=1;
            
            function fcnVerGeneros(){
            $.ajax({
                    url:"<?php echo _URL; ?>Album/sendSInfoSlct",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    for(var i = 0; i < json[0]; i++) {
                        var slctGenero = document.createElement("option");
                        slctGenero.value=json[1][i]["idGenero"];
                        slctGenero.innerHTML=json[1][i]["genero"];
                        document.getElementById("slctGenero").appendChild(slctGenero);
                    }
                    
                    for(var i = 0; i < json[2]; i++) {
                        var slctArtista = document.createElement("option");
                        slctArtista.value=json[3][i]["idArtista"];
                        slctArtista.innerHTML=json[3][i]["nombreArtista"];
                        document.getElementById("slctArtista").appendChild(slctArtista);
                    }
                    
                    
                });   
        }        
        
            function fcnAddArtista(){
                
                acumulador+=1;
                var selectArtista = document.createElement("select");
                var nombre = "artista"; nombre = nombre.concat(acumulador);
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
                    
                    sendNumArt.value=acumulador-1;
                    
            }
            var sendNumArt = document.createElement("input");
            sendNumArt.name="numArtis";
            sendNumArt.className="oculto";
            $(".formularios").append(sendNumArt);

                    
       </script>
    </body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

