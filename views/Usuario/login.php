<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        
</head>

<div class="StylesFormularios">
    <form class="forms formularioLogIn" action="<?php echo _URL; ?>Usuario/logMeIn" method="POST">
            <input type="email" name="email" placeholder="email" requried>
            <input type="password" name="password" placeholder="password" requried>
            <input type="submit" value="">
        </form>
    <div id='divCerrar'>
        <a id="btnCerrarLogin" onclick="cerrarLogIn()">x</a>
    </div>
</div>
      
<footer></footer>
    </body>
</html>