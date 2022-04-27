
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
                            <a id="InicioBtn">Inicio</a>
                        

                            </li>
                            <li>
                            <a id="CancionesBtn" href="Canciones.html">Canciones</a>
                        
                            </li>
                            <li>
                            <a id="ArtistasBtn" href="Artistas.html">Artistas</a>
                            </li>
                            <li>
                            <a id="AlbumesBtn" href="Albumes.html">Álbumes</a>
                            </li>
                    
                        </ul>
                    </nav>
                </div>
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
        <form action="<?php echo _URL; ?>Admin/logMeIn" method="POST">
            <input type="email" name="email" placeholder="email" requried>
            <input type="password" name="password" placeholder="password" requried>
            <input type="submit" value="Entrar">
        </form>
    </body>
</html>