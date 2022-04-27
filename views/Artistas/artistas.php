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
				
				<div id="Carro"></div>
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





				<div id="WrapArtistas">
					
					<div id="PadreContenedorArtistas">

						<div id="ContenedorArtistas">



							<div class="ContenidoArtistas">
								
								<div class="ContenidoSuperiorArtistas">
								<div class="FotoArtista">
									<div class="FotoArt"></div>
									<div class="NombreArtista"> Dimitri Vegas & Like Mike </div>
								</div>


								<div class="ArtistasAlbum">

									<div class="TituloAlbumes">Álbumes</div>

									<div class="ContenedorAlbumesArtistas">

										<div class="Album">
											<div class="FotoAlbum"></div>
											<div class="InformacionAlbum">
												<font color="#16A085">Nombre:</font> Mammoth
												<font color="#16A085">Artista:</font> Dimitri Vegas
												<font color="#16A085">Precio:</font> 1000
												<div class="CarroArtistas"></div>
											</div>
											

										</div>


										<div class="Album">
											<div class="FotoAlbum"></div>
											<div class="InformacionAlbum">
												<font color="#16A085">Nombre:</font> Mammoth
												<font color="#16A085">Artista:</font> Dimitri Vegas
												<font color="#16A085">Precio:</font> 1000
												<div class="CarroArtistas"></div>
											</div>
											

										</div>


										<div class="Album">
											<div class="FotoAlbum"></div>
											<div class="InformacionAlbum">
												<font color="#16A085">Nombre:</font> Mammoth
												<font color="#16A085">Artista:</font> Dimitri Vegas
												<font color="#16A085">Precio:</font> 1000
												<div class="CarroArtistas"></div>
											</div>
											

										</div>
										


									</div>
									


									</div>
								</div>







								<div class="ArtistasCanciones">
									<div class="TituloCancionesArtistas">Canciones</div>

									<div class="ContenedorCancionesArtistas">

										<div class="CancionArtistas">
											<div class="FotoCancionArtista"></div>
												<div class="InformacionCancionArtista">
													<font color="#16A085">Nombre:</font> Mammoth
													<font color="#16A085">Artista:</font> Dimitri Vegas
													<font color="#16A085">Precio:</font> 1000
													<div class="CarroArtistas"></div>
												</div>
										</div>

										<div class="CancionArtistas">
											<div class="FotoCancionArtista"></div>
												<div class="InformacionCancionArtista">
													<font color="#16A085">Nombre:</font> Mammoth
													<font color="#16A085">Artista:</font> Dimitri Vegas
													<font color="#16A085">Precio:</font> 1000
													<div class="CarroArtistas"></div>
												</div>
										</div>

										<div class="CancionArtistas">
											<div class="FotoCancionArtista"></div>
												<div class="InformacionCancionArtista">
													<font color="#16A085">Nombre:</font> Mammoth
													<font color="#16A085">Artista:</font> Dimitri Vegas
													<font color="#16A085">Precio:</font> 1000
													<div class="CarroArtistas"></div>
												</div>
										</div>

										<div class="CancionArtistas">
											<div class="FotoCancionArtista"></div>
												<div class="InformacionCancionArtista">
													<font color="#16A085">Nombre:</font> Mammoth
													<font color="#16A085">Artista:</font> Dimitri Vegas
													<font color="#16A085">Precio:</font> 1000
													<div class="CarroArtistas"></div>
												</div>
										</div>


									</div>
									



								</div>






						</div><!--FINAL CONTENEDOR ARTISTAS-->	
						

					</div><!--FINAL PADRE CONTENOR-->	
	
				</div><!--FINAL WRAP-->	


	</body>

<script type="text/javascript">


 $(document).on("ready", verArtistas);
            
            function verArtistas(){

            	$("#HeaderDerecho").append("<div id='contProductos'>0</div>");
            	$("#contProductos").insertBefore(".Cuentas");

               // $("#PadreContenedorArtistas").append("<div id='ContenedorAlbumes"+json[1][i]['idAlbum']+"' class='ContenedorAlbumes'></div>");

                $.ajax({
                    url:"<?php echo _URL; ?>Artista/verArtistas",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);

                    

                    for(var i = 0; i < json[0]; i++) {
                    	console.log(json[3][i]);
                    	$("#ContenedorArtistas").append("<div id='ContenidoArtistas"+json[1][i]['idArtista']+"' class='ContenidoArtistas'></div>");
                    	$("#ContenidoArtistas"+json[1][i]['idArtista']).append("<div id='ContenidoSuperiorArtistas"+json[1][i]['idArtista']+"' class='ContenidoSuperiorArtistas'></div>");
                    	$("#ContenidoSuperiorArtistas"+json[1][i]['idArtista']).append("<div id='FotoArtista"+json[1][i]['idArtista']+"' class='FotoArtista'></div>");
                    	$("#FotoArtista"+json[1][i]['idArtista']).append("<img id='FotoArt"+json[1][i]['idArtista']+"' class='FotoArt'>");

                    	$("#FotoArt"+json[1][i]['idArtista']).attr("src","<?php _URL ?>"+json[1][i]["imagen"]);

                    	$("#FotoArtista"+json[1][i]['idArtista']).append("<div id='NombreArtista"+json[1][i]['idArtista']+"' class='NombreArtista'>"+json[1][i]['nombreArtista']+"</div>");
                    	$("#ContenidoSuperiorArtistas"+json[1][i]['idArtista']).append("<div id='ArtistasAlbum"+json[1][i]['idArtista']+"' class='ArtistasAlbum'></div>");
                    	$("#ArtistasAlbum"+json[1][i]['idArtista']).append("<div id='TituloAlbumes"+json[1][i]['idArtista']+"' class='TituloAlbumes'>Álbumes</div>");
                    	$("#ArtistasAlbum"+json[1][i]['idArtista']).append("<div id='ContenedorAlbumesArtistas"+json[1][i]['idArtista']+"' class='ContenedorAlbumesArtistas'></div>");

                    	/*for (var j = 0; j < json[4][i].length; j++) {
                    		$("#ContenedorAlbumesArtistas"+json[1][i]['idArtista']).append("<div id='Album"+json[4][i][j]['idAlbum']+"' class='Album'></div>");
                    		$("#Album"+json[4][i][j]['idAlbum']).append("<div id='FotoAlbum"+json[4][i][j]['idAlbum']+"' class='FotoAlbum'></div>");
                    		$("#FotoAlbum"+json[4][i][j]['idAlbum']).attr("src",json[4][i][j]['imagen']);
                    		$("#Album"+json[4][i][j]['idAlbum']).append("<div id='InformacionAlbum"+json[4][i][j]['idAlbum']+"' class='InformacionAlbum'></div>");
                    	};
                    	*/


                    	$("#ContenidoArtistas"+json[1][i]['idArtista']).append("<div id='ArtistasCanciones"+json[1][i]['idArtista']+"' class='ArtistasCanciones'></div>");
                    	$("#ArtistasCanciones"+json[1][i]['idArtista']).append("<div id='TituloCancionesArtistas"+json[1][i]['idArtista']+"' class='TituloCancionesArtistas'>Canciones</div>");
                    	$("#ArtistasCanciones"+json[1][i]['idArtista']).append("<div id='ContenedorCancionesArtistas"+json[1][i]['idArtista']+"' class='ContenedorCancionesArtistas'></div>");
                    	$("#ContenedorCancionesArtistas"+json[1][i]['idArtista']).append("<div id='CancionArtistas"+json[1][i]['idArtista']+"' class='CancionArtistas'></div>");
                    	$("#CancionArtistas"+json[1][i]['idArtista']).append("<div id='FotoCancionArtista"+json[1][i]['idArtista']+"' class='FotoCancionArtista'></div>");
                    	$("#CancionArtistas"+json[1][i]['idArtista']).append("<div id='InformacionCancionArtista"+json[1][i]['idArtista']+"' class='InformacionCancionArtista'></div>");


                    }
                   /* for(var i = 0; i < json[0]; i++) {
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
                        	}
                        	//$("#filaCancion"+json[8][i][j]['idCancion']).append("<div id='CarroCancionesFromAlbum"+json[8][i][j]['idCancion']+"' class='CarroCancionesFromAlbum' ></div>");

                        	$("#filaCancion"+json[8][i][j]['idCancion']).append("<audio id='song"+json[8][i][j]['idCancion']+"'><source src='"+"<?php _URL ?>"+json[8][i][j]["archivo"]+"' type='audio/wav'></audio>");


                        	
                        };
                        
					}
        */        
                });
            }


</script>

</html>