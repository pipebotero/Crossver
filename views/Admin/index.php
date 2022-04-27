
<body class="bodyAdmin">
<header class="headerAdmin">
    <div id="Wrap">
        <div id="HeaderIzquierdo">
            <div id="Logo"></div>
        </div>
        <div id="HeaderCentro">
           
        </div>

        <div id="HeaderDerecho">

            <div id="Carro"></div>
            <div class="Cuentas">
                <!--<div id="LoginIn">
                        <button class="LogInBtn">Ingresar</button>
                </div>
                <div id="CrearCuenta">
                        <button>Crear Cuenta</button>
                </div>
                <div id="laBarrita">-->
                <?php if (Session::get("idUsuario")) : ?>
                    <div id="Bienvenido"><?php print("Hola " . Session::get("nombreUsuario")); ?></div>
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
<!--<div id="barraLateral">
    <div id="titulo">Productos</div>
    <div id="acciones">
        <div id="crearProducto" onClick="crearCancion()">Crear Cancion</div>
        <div id="editarProducto" onClick="editarProducto()">Editar Producto</div>
        <div>Eliminar Producto</div>
    </div>
</div>
<div id="formulariosAdminPanel">

</div>
-->
<div id="WrapPanelAdmin">
			<div id="ContenedorLateralIzquierdo">
				<div id="LateralIzquierdo">
                                    
                                    <div class="Categoria">
						<div class="Item">
							<div class="title">Usuarios</div>
							<div class="Menu">
								<ul>
									<li id="btnCrearUsuario">Crear Usuario</li>
									<li id="btnGestionarUsuario">Gestionar Usuarios</li>

								</ul>
							</div>
						</div>
					</div>

				<div class="Categoria">
						<div class="Item">
							<div class="title">Canciones</div>
							<div class="Menu">
								<ul>
                                    <li id="btnCrearCancion" >Crear Canción</li>
									<li id="btnGestionarCancion" >Gestionar Canciónes</li>
								</ul>
							</div>
						</div>
					</div><!--onClick="crearCancion()"--> 



					<div class="Categoria">
						<div class="Item">
							<div class="title">Álbumes</div>
							<div class="Menu">
								<ul>
									<li id="btnCrearAlbum">Crear Álbum</li>
									<li id="btnGestionarAlbum" >Gestionar Álbumes</li>

								</ul>
							</div>
						</div>
					</div>





					<div class="Categoria">
						<div class="Item">
							<div class="title">Artistas</div>
							<div class="Menu">
								<ul>
									<li id="btnCrearArtista">Crear Artista</li>
									<li>Gestionar Artistas</li>

								</ul>
							</div>
						</div>
					</div>
                                        
                                        <div class="Categoria">
						<div class="Item">
							<div class="title">Generos</div>
							<div class="Menu">
								<ul>
									<li id="btnCrearGenero">Crear Genero</li>
									<li>Gestionar Generos</li>

								</ul>
							</div>
						</div>
					</div>
			</div>
				
				
			
		</div>
		<div id="ContenedorLateralDerecho">
			<div id="formulariosAdminPanel">

</div>
					
		</div>
<script type="text/javascript">
/*
        var acumulador=1;
        var sendNumArt;
            function crearCancion(){

                var elementExistsAlbum = document.getElementById("formCrearAlbum");
                        if (elementExistsAlbum!=null) {
                            $("#formulariosAdminPanel").empty();
                        }

                        var elementExistsArtista = document.getElementById("formCrearArtista");
                        if (elementExistsArtista!=null) {
                            $("#formulariosAdminPanel").empty();
                        }

                var elementExists = document.getElementById("formCrearCancion");
                        if (elementExists!=null) {
                            $("#formulariosAdminPanel").empty();
                            console.log("Si");
                        }else{

                var formCrearCancion = "<form id='formCrearCancion' class='formularios' action='<?php echo _URL; ?>Cancion/crear' method='POST' enctype='multipart/form-data'>";
                var inptName= "<input name='nombreCancion' type='text' placeholder='Canción' >";
                var slctAlbm = "<select id='slctAlbum' name='album'><option value=''>Seleccione Álbum</option></select>";
                var slctGenero = "<select id='slctGenero' name='genero'><option value=''>Seleccione Genero</option></select>";
                var slctArtist= "<select id='slctArtista' name='artista'><option value=''>Seleccione Artista</option></select>";
                var inptYear = "<input name='year' type='text' placeholder='Año' >";
                var inptSrc = "<input id='srcCancion' name='srcCancion' type='file'>";
                var inptPrecio = "<input name='precio' type='text' placeholder='Precio'>";
                var inptSubmit = "<input type='submit' value='Crear'>";

                $("#formulariosAdminPanel").append(formCrearCancion);
                $(".formularios").append(inptName); $(".formularios").append(slctAlbm);
                $(".formularios").append(slctGenero); $(".formularios").append(slctArtist);
                $(".formularios").append(inptYear); $(".formularios").append(inptSrc);
                $(".formularios").append(inptPrecio); $(".formularios").append(inptSubmit);

                sendNumArt = document.createElement("input");
                sendNumArt.name="numArtis";
                sendNumArt.className="oculto";
                $(".formularios").append(sendNumArt);

                var btnAddArtista="<button onclick='fcnAddArtista()'>Añadir otro Artista</button>";
                $("#formulariosAdminPanel").append(btnAddArtista);
                        


                   $.ajax({
                            url:"<?php echo _URL; ?>Cancion/sendSInfToSlct",
                            method:"POST",
                            data: {}
                        }).done(function(r){
                            var json = JSON.parse(r);
                            console.log(json);
                            
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

                }

                function crearAlbum(){

                    var elementExistsCancion = document.getElementById("formCrearCancion");
                        if (elementExistsCancion!=null) {
                            $("#formulariosAdminPanel").empty();
                        }

                    var elementExistsArtista = document.getElementById("formCrearArtista");
                        if (elementExistsArtista!=null) {
                            $("#formulariosAdminPanel").empty();
                        }

                var elementExists = document.getElementById("formCrearAlbum");
                        if (elementExists!=null) {
                            $("#formulariosAdminPanel").empty();
                        }else{

                var formCrearAlbum = "<form id='formCrearAlbum' class='formularios' action='<?php echo _URL; ?>Album/crear' method='POST' enctype='multipart/form-data'></form>";
                var inptName= "<input name='nombreAlbum' type='text' placeholder='Álbum' >";
                var slctGenero = "<select id='slctGenero' name='genero'><option value=''>Seleccione Genero</option></select>";
                var slctArtist= "<select id='slctArtista' name='artista'><option value=''>Seleccione Artista</option></select>";
                var inptImg = "<input id='imgAlbum' name='imgAlbum' type='file'>";
                var inptSubmit = "<input type='submit' value='Crear'>";

                $("#formulariosAdminPanel").append(formCrearAlbum);
                $(".formularios").append(inptName); $(".formularios").append(slctGenero);
                $(".formularios").append(slctArtist); $(".formularios").append(inptImg);
                $(".formularios").append(inptSubmit);

                sendNumArt = document.createElement("input");
                sendNumArt.name="numArtis";
                sendNumArt.className="oculto";
                $(".formularios").append(sendNumArt);

                var btnAddArtista="<button onclick='fcnAddArtista()'>Añadir otro Artista</button>";
                $("#formulariosAdminPanel").append(btnAddArtista);
                        


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

                }


                function crearArtista(){

                    var elementExistsCancion = document.getElementById("formCrearCancion");
                        if (elementExistsCancion!=null) {
                            $("#formulariosAdminPanel").empty();
                        }
                        
                    var elementExistsAlbum = document.getElementById("formCrearAlbum");
                        if (elementExistsAlbum!=null) {
                            $("#formulariosAdminPanel").empty();
                        }

                var elementExists = document.getElementById("formCrearArtista");
                        if (elementExists!=null) {
                            $("#formulariosAdminPanel").empty();
                        }else{

                var formCrearArtista = "<form id='formCrearArtista' class='formularios' action='<?php echo _URL; ?>Artista/crear' method='POST' enctype='multipart/form-data'></form>";
                var inptName= "<input name='nombreArtista' type='text' placeholder='Artista' >";
                var inptImg = "<input id='imgArtista' name='imgArtista' type='file'>";
                var inptSubmit = "<input type='submit' value='Crear'>";

                $("#formulariosAdminPanel").append(formCrearArtista);
                $(".formularios").append(inptName); $(".formularios").append(inptImg);
                $(".formularios").append(inptSubmit);
                        
               
                }

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

*/
</script>






<footer></footer>
</body>
</html>








