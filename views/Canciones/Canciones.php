<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

        <title>Crossver</title>
        <meta name="description" content="Ejemplo de un sitio con diseño Fixed">
        <meta name="author" content="Ldgrisales">

        <link rel="stylesheet" href="./css/stylesheet.css">
        <script src="./js/stylesheet.js"></script>
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
                        <input  placeholder="Buscar">
                    
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

    <div id="WrapCanciones">
        <div id="PadreContenedorCanciones">
            <div class="ContenedorCanciones">
                <div class="Canciones">

                    <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>



                            <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>




                        <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>



                            <div class="Cancion">
                                <div class="Audio"></div>
                                <div class="InformacionCancion">
                                    <font color="#16A085">Nombre:</font> Years<br>
                                    <font color="#16A085">Artista:</font> Alesso<br>
                                    <font color="#16A085">Precio:</font> 1000

                                    <div class="CarroCanciones"></div>
                                </div>
                            </div>


                        <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>

                        
                    
                </div>
                    <div class="Canciones">

                    <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>



                            <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>




                        <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>



                            <div class="Cancion">
                                <div class="Audio"></div>
                                <div class="InformacionCancion">
                                    <font color="#16A085">Nombre:</font> Years<br>
                                    <font color="#16A085">Artista:</font> Alesso<br>
                                    <font color="#16A085">Precio:</font> 1000

                                    <div class="CarroCanciones"></div>
                                </div>
                            </div>


                        <div class="Cancion">
                            <div class="Audio"></div>
                            <div class="InformacionCancion">
                                <font color="#16A085">Nombre:</font> Years<br>
                                <font color="#16A085">Artista:</font> Alesso<br>
                                <font color="#16A085">Precio:</font> 1000

                                <div class="CarroCanciones"></div>
                            </div>
                        </div>

                        
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

    </body>
</html>