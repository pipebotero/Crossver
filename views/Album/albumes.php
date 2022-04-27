<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

		<title>Crossver</title>
		<meta name="description" content="Ejemplo de un sitio con diseño Fixed">
		<meta name="author" content="Ldgrisales">

		<link rel="stylesheet" href="./css/stylesheet.css">
		<link rel="shortcut icon" href="assets/Pestana.png" type="image/png">

	

	</head>
	<body>
		<!-- PADRE 1 -->
		<header>
		<div id="Wrap">
			<div id="HeaderIzquierdo">
				<div id="Logo"></div>
			</div>
			<div id="HeaderCentro">
				<div id="Search">
					<form>
						<input	placeholder="Buscar">
					
						</input>
					</form>
				</div>
				<div id="BtnBuscar">
					<button>Buscar</button>

					
				</div>

				<div id="Navegacion">
					<nav>
						<ul>
							<li>
							<a id="InicioBtn" href="<?php echo _URL; ?>">Inicio</a>
						

							</li>
							<li>
							<a id="CancionesBtn" href="<?php echo _URL; ?>Canciones">Canciones</a>
						
							</li>
							<li>
							<a id="ArtistasBtn" href="<?php echo _URL; ?>Artistas">Artistas</a>
							</li>
							<li>
							<a id="AlbumesBtn" href="<?php echo _URL; ?>Album">Álbumes</a>
							</li>
					
						</ul>
					</nav>
				</div>
			</div>
			
			<div id="HeaderDerecho">
				<a href="<?php echo _URL; ?>Carrito">
				<div id="Carro">
					
				</div>
				</a>
				<div class="Cuentas">

                                            <?php if(Session::get("idUsuario")) : ?>
                                                    <div id="Bienvenido"><?php print("Hola ".Session::get("nombreUsuario"));?></div>
                                                    <div id="Logout"> <a href="<?php echo _URL; ?>Usuario/logout">Cerrar Sesión</a> </div>
                                            <?php else : ?>
                                                    <div id="CrearCuenta">
                                                            <a href="<?php echo _URL; ?>Usuario/">Crear Usuario</a>
                                                    </div>
                                                    <div id="LoginIn">
                                                            <a> <!--href="<?php echo _URL; ?>Usuario/login/"-->Login</a>
                                                    </div>
                                                    
                                            <?php endif; ?>
                                        </div>
				</div>

		</div>

				
				
		</header>


		<div id="WrapAlbumes">
			
			<div id="PadreContenedorAlbumes">
					

			</div>	
		</div>


	</body>
        
        <script>
            
            $(document).on("ready", verAlbumes);
            
            function verAlbumes(){

            	$("#HeaderDerecho").append("<div id='contProductos'>0</div>");
            	$("#contProductos").insertBefore(".Cuentas");

                $.ajax({
                    url:"<?php echo _URL; ?>Album/verAlbums",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    console.log(json[8]);
                    for(var i = 0; i < json[0]; i++) {
                        $("#PadreContenedorAlbumes").append("<div id='ContenedorAlbumes"+json[1][i]['idAlbum']+"' class='ContenedorAlbumes'></div>");
                        $("#ContenedorAlbumes"+json[1][i]['idAlbum']).append("<div id='ContendorSuperiorAlbumes"+json[1][i]['idAlbum']+"' class='ContendorSuperiorAlbumes'></div>");
                        $("#ContenedorAlbumes"+json[1][i]['idAlbum']).append("<div id='ContenedorCancionesAlbum"+json[1][i]['idAlbum']+"' class='ContenedorCancionesAlbum'></div>");
                        $("#ContendorSuperiorAlbumes"+json[1][i]['idAlbum']).append("<div id='ContenedorFotoAlbum"+json[1][i]['idAlbum']+"' class='ContenedorFotoAlbum'></div>");
                        $("#ContenedorFotoAlbum"+json[1][i]['idAlbum']).append("<img id='AlbumFoto"+json[1][i]['idAlbum']+"' class='AlbumFoto'>");
                        $("#AlbumFoto"+json[1][i]['idAlbum']).attr("src", "<?php _URL ?>"+json[1][i]['imagen']);

                        $("#ContenedorFotoAlbum"+json[1][i]['idAlbum']).append("<div id='ContenedorInformacionAlbum"+json[1][i]['idAlbum']+"' class='ContenedorInformacionAlbum'></div>");
        				$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append("<font color='#16A085'>Nombre: </font>"+json[1][i]["nombreAlbum"]+"<br>");
        				$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append("<font color='#16A085'>Artista: </font>");
        				for (var j = 0; j < json[5][i].length; j++) {
        					$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append(json[5][i][j]['nombreArtista']+"</br>");
        				};
        				$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append("<font color='#16A085'>Género : </font>"+json[6][i]["genero"]+"<br>");
        				$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append("<font color='#16A085'>Precio : </font>"+"2000");
        				$("#ContenedorInformacionAlbum"+json[1][i]['idAlbum']).append("<div id='CarroAlbumes"+json[1][i]['idAlbum']+"' class='CarroAlbumes' ></div>");
        				
        				$("#ContenedorCancionesAlbum"+json[1][i]['idAlbum']).append("<div id='TituloCanciones"+json[1][i]['idAlbum']+"' class='TituloCanciones'></div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div class='artNomfromAlbm'>Nombre</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Año</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Duración</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Bitrate</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Formato</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Tamaño</div>");
        				$("#TituloCanciones"+json[1][i]['idAlbum']).append("<div>Precio</div>");
    					
    					$("#ContenedorCancionesAlbum"+json[1][i]['idAlbum']).append("<div id='ContenidoCanciones"+json[1][i]['idAlbum']+"' class='ContenidoCanciones'></div>");

                        for(var j=0; j<json[8][i].length; j++){
                        	$("#ContenidoCanciones"+json[1][i]['idAlbum']).append("<div id='filaCancion"+json[8][i][j]['idCancion']+"' class='filaCancion'></div>");
                        	var btnPlay = document.createElement('div');
                        	btnPlay.innerHTML=">"; btnPlay.id="playCanfromAlbm"+json[8][i][j]['idCancion'];
                        	btnPlay.className="playCanfromAlbm";
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append(btnPlay);
                        	btnPlay.onclick = function() { 
                            playSong(this.id); 
                        }
                        	//$("#filaCancion"+json[8][i][j]['idCancion']).append("<div id='playCanfromAlbm"+json[8][i][j]['idCancion']+"' class='playCanfromAlbm'>"+">"+"</div>");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div class='nomCancionfromAlbm' >"+json[8][i][j]["nombreCancion"]+"</div>");

                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>"+json[8][i][j]["year"]+"</div>");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>"+json[8][i][j]["duracion"]+" s"+"</div>");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>"+(json[8][i][j]["bitrate"])+"</div>");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>"+json[8][i][j]["formato"]+"</div>");
                            var tamano =(json[8][i][j]["size"])/1000000; tamano = tamano.toString();
                            var tam = tamano.split(".");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>"+tam[0]+" Mb"+"</div>");
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<div>$"+json[8][i][j]["precio"]+"</div>");

                        	var carroCancion = document.createElement('div');
                        	carroCancion.id="CarroCancionesFromAlbum"+json[8][i][j]['idCancion'];
                        	carroCancion.className="CarroCancionesFromAlbum";
                        	$("#filaCancion"+json[8][i][j]['idCancion']).append(carroCancion);

                        	carroCancion.onclick = function() { 
                            addCar(this.id); 
                            contadorCarro();
                        	}
                        	//$("#filaCancion"+json[8][i][j]['idCancion']).append("<div id='CarroCancionesFromAlbum"+json[8][i][j]['idCancion']+"' class='CarroCancionesFromAlbum' ></div>");

                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<audio id='song"+json[8][i][j]['idCancion']+"'><source src='"+"<?php _URL ?>"+json[8][i][j]["archivo"]+"' type='audio/wav'></audio>");


                        	
                        };
                        
    }
                
                });
            }

            function playSong(idSong){
            	var idSend = idSong.replace(/^\D+/g, "");
            	console.log(idSend);
            	var iDeAudio = "song"; iDeAudio=iDeAudio.concat(idSend);
            	var iDeButton = "playCanfromAlbm"; iDeButton=iDeButton.concat(idSend);
            	var audio = document.getElementById(iDeAudio);
            	var btnPlay = document.getElementById(iDeButton);

            	if(audio.paused){

            	audio.play();
            	btnPlay.innerHTML="| |";

            	}else{
            		audio.pause();
            		btnPlay.innerHTML=">";
            	}


            }

             function addCar(idSong){
             	var idSend = idSong.replace(/^\D+/g, "");

             	$.ajax({
                    url:"<?php echo _URL; ?>Carrito/addProducto",
                    method:"POST",
                    data: {idProducto: idSend}
                }).done(function(r){
                	var json = JSON.parse(r);
                	console.log(json);
                });
            }
            
        
        </script>
</html>