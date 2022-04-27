
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

		<div id="WrapIndex">
		<div id="ContenedorInformacion">
			<div class="Informacion">
				<div class="Contenido">
					<div class="TituloContenido">Opción 1 </div>
					<div class="ContenedorOpciones">

						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font> Mammoth <br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000

								<div class="CarroIndex"></div>
							</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">	
								<font color="#16A085">Nombre:</font> Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>





						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font> Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font> Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000

								<div class="CarroIndex"></div>

							</div>
						</div>


						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>

							

							</div>
						</div>

						
					</div>
				</div>
				<div class="Contenido">
					<div class="TituloContenido">Opción 2</div>
					<div class="ContenedorOpciones">
							<div class="Opciones">
								<div class="Opcion"></div>
								<div class="OpcionesInfo">
									<font color="#16A085">Nombre:</font>Mammoth<br>
									<font color="#16A085">Artista:</font> Dimitri Vegas<br>
									<font color="#16A085">Precio:</font> 1000
									<div class="CarroIndex"></div>

								

								</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
								
							</div>
						</div>





						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>


						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>










					</div>
				</div>
				<div class="Contenido">
					<div class="TituloContenido">Opción 3</div>
					<div class="ContenedorOpciones">
					
						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>





						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>



						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>


						<div class="Opciones">
							<div class="Opcion"></div>
							<div class="OpcionesInfo">
								<font color="#16A085">Nombre:</font>Mammoth<br>
								<font color="#16A085">Artista:</font> Dimitri Vegas<br>
								<font color="#16A085">Precio:</font> 1000
								<div class="CarroIndex"></div>
							</div>
						</div>						




					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>

<footer></footer>
	</body>
        <script>
            
            
        </script>
</html>