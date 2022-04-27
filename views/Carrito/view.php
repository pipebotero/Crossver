
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

		</div>
	
		</header>

		<div id="wrapProdComprados"></div>

<footer></footer>
	</body>
        <script>
            
          $(document).on("ready", verProdComp);

            
            
            function verProdComp(){

            	$("#HeaderDerecho").append("<div id='contProductos'>0</div>");
            	$("#contProductos").insertBefore(".Cuentas");

                $.ajax({
                    url:"<?php echo _URL; ?>Carrito/verProductosComprados",
                    method:"POST",
                    data: {}
                }).done(function(r){  
                	var json = JSON.parse(r);

                	console.log(json[1]);

                });

            }
        </script>
</html>