<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>
        <div id="cancionesPanelAdmin">
        </div>
    </body>
    <script type="text/javascript">

    $(document).on("ready", verCacniones);

    function verCacniones(){

    	$("#cancionesPanelAdmin").append("<h1>Canciones</h1>");

    	var divContenCanciones = document.createElement("div");
    	divContenCanciones.id="divContenCanciones";

    	var divNomAtributos = document.createElement("div");
    	divNomAtributos.id="divNomAtributosCan";


    	$("#cancionesPanelAdmin").append(divContenCanciones);
    	//$("#divContenCanciones").append(divNomAtributos);

    	$.ajax({
                    url:"<?php echo _URL; ?>Cancion/verCanciones",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    console.log(json);
                    for(var i = 0; i < json[0]; i++) {
                    	

                    	var I=i+1;
                    	$("#divContenCanciones").append("<div id='divCancion"+I+"' class='divCancion'></div>");
                    	var filaSong = document.getElementById("divCancion"+I);

                    	//<font color='#1ABC9C'>Genero: </font>
                        
                    	$("#divCancion"+I).append("<div id='divImgCancion"+I+"' class='divImgCancion'></div>");
                    	$("#divImgCancion"+I).append("<img id='imgCacion"+I+"' class='imgCacion'>");
                    	$("#divCancion"+I).append("<div id='divInfoCancion"+I+"' class='divInfoCancion'></div>");
                    	$("#divInfoCancion"+I).append("<div class='nomCancion'>"+"<font color='#1ABC9C'>Nombre: </font>"+json[1][i]["nombreCancion"]+"</div>");
                    	$("#divInfoCancion"+I).append("<div class='genCancion'>"+"<font color='#1ABC9C'>Genero: </font>"+json[3][i]["genero"]+"</div>");
                    	$("#divInfoCancion"+I).append("<div class='albmCancion'>"+"<font color='#1ABC9C'>Álbum: </font>"+json[4][i]["nombreAlbum"]+"</div>");
                    	$("#divInfoCancion"+I).append("<div id='artCancion"+I+"'' class='artCancion'></div>");
                    	$("#artCancion"+I).append("<div class='divContArtCan'><font color='#1ABC9C'>Artistas:</font></div>");
                    	
                        if (typeof json[6][i] != "undefined") {
                            for (var j = 0; j < json[6][i].length; j++) {
                    		$("#artCancion"+I).append("<div class='divNomArts'>"+json[6][i][j]["nombreArtista"]+".</div>");
                            };
                        }   
                        
                    	$("#divInfoCancion"+I).append("<div id='year"+I+"'' class='year'>"+"<font color='#1ABC9C'>Año: </font>"+json[1][i]["year"]+"</div>");
                    	$("#divInfoCancion"+I).append("<div id='precio"+I+"'' class='precio'>"+"<font color='#1ABC9C'>Precio: </font>$"+json[1][i]["precio"]+"</div>");
                    	var uriImg = "<?php _URL?>"; uriImg= uriImg.concat(json[4][i]["imagen"]);
                    	$("#imgCacion"+I).attr("src",uriImg);


                    	var btnEliminar = document.createElement("div");
                        btnEliminar.className="btnEliminar";
                        btnEliminar.id="btnEliminar"+json[1][i]["idCancion"];
                        btnEliminar.onclick = function() { 
                            deleteCancion(this.id); 
                        };
                        

                        var btnEditar = document.createElement("div");
                        btnEditar.className="btnEditar";
                        btnEditar.id="btnEditar"+json[1][i]["idCancion"];
                        btnEditar.onclick = function() { 
                            editCancion(this.id); 
                        };
                        $("#divCancion"+I).append(btnEditar);
                        $("#divCancion"+I).append(btnEliminar);

                    }

                });
    }


    function editCancion(idBtn){
            var idSend = idBtn.replace(/^\D+/g, "");

            $.ajax({
                    url:"<?php echo _URL; ?>Cancion/formEditar",
                    method:"POST",
                    data: {idCancion: idSend}
                }).done(function(r){
                    var json = JSON.parse(r);
                    //console.log(json[3]);

                    var divOpaca = "<div id='divOpaca'></div>";
                     var contentForm= "<div id='contentForm' class='contenedorForm'></div>";

                     $("#ContenedorLateralDerecho").append(divOpaca);
                     $("#divOpaca").append(contentForm);
                     var elementExists = document.getElementById("contentForm");
                        if (elementExists!=null) {
                            $("#contentForm").remove();
                            $("#divOpaca").append(contentForm);
                        }
                        $("#contentForm").load("Cancion/edit");

                        setTimeout(
                          function() 
                          {
                          	var nomCancionEdit = document.getElementById('nomCancionEdit');
                          	nomCancionEdit.value = json[0]["nombreCancion"];

                          	var yearCancionEdit = document.getElementById('yearCancionEdit');
                          	yearCancionEdit.value = json[0]["year"];

                          	var precioCancionEdit = document.getElementById('precioCancionEdit');
                          	precioCancionEdit.value = json[0]["precio"];

                          	var slctGenero = document.getElementById('slctGenero');
                          	slctGenero.value = json[0]["idGenero"];
                          	
                          	var slctAlbum = document.getElementById('slctAlbum');
                          	slctAlbum.value = json[1]["idAlbum"];
                          	
                          	var slctArtista = document.getElementById('slctArtista');
                          	slctArtista.value = json[2][0]["idArtista"];

                          	for (var i = 1; i < json[2].length; i++) {
                          		var slctArtistaAdicional = document.createElement("select");
                          		slctArtistaAdicional.id="slctArtista"+i;
                          		slctArtistaAdicional.name="slctArtista"+i;
                          		$("#formCancion").append(slctArtistaAdicional);
                          		//slctArtistaAdicional.value = json[2][1]["idArtista"];
                          		$("#slctArtista"+i).append("<option>Seleccione Artista</option>");
                          		for (var j = 0; j < json[3].length; j++) {
                          			$("#slctArtista"+i).append("<option value='"+json[3][j]["idArtista"]+"'>"+json[3][j]["nombreArtista"]+"</option>");
                          		};
                          		slctArtistaAdicional.value=json[2][i]["idArtista"];
                          		//console.log();
                          		$("#slctArtista"+i).insertBefore("#yearCancionEdit");
                          	};

                          	fcnSetAcum(json[2].length-1);
                          	
                          	$("#formCancion").append("<input class='oculto' name='idCancion' value="+idSend+">");
                          	
                          	}, 300);


                });
        }

        function deleteCancion(idBtn){

            var idSend = idBtn.replace(/^\D+/g, "");
                console.log("Entro");
                $.ajax({
                    url:"<?php echo _URL; ?>Canciones_has_artistas/deleteRelacion",
                    method:"POST",
                    data: {idCancion: idSend}
                }).done(function(r){
                	var json1 = JSON.parse(r);
                	console.log(json1);
                $.ajax({
                    url:"<?php echo _URL; ?>Albums_has_canciones/deleteRelacion",
                    method:"POST",
                    data: {idCancion: idSend}
                }).done(function(s){	
                    var json2 = JSON.parse(s);
                	console.log(json2);
                   $.ajax({
                    url:"<?php echo _URL; ?>Cancion/deleteCancion",
                    method:"POST",
                    data: {idCancion: idSend}
                }).done(function(l){
                    var json3 = JSON.parse(l);
                	console.log(json3);

                    $("#btnGestionarCancion").trigger('click');
                    
                    });

                    });
                });
        
        }
                    
    </script>
</html>

