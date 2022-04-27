<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>

    <body>
        <form  class="forms" action="<?php echo _URL; ?>Rol/crear" method="POST">
            <input name="rol" type="text" placeholder="Rol" >
            <input type="submit" value="">
        </form>
        
        <script>

       </script>
    </body>
</html>