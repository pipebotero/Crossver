<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>

        <form class="forms" action="<?php echo _URL; ?>Artista/crear" method="POST" enctype="multipart/form-data">
            <input name="nombreArtista" type="text" placeholder="Artista" >
            <input id="imgArtista" name="imgArtista" type="file">
            <input type="submit" value="">
        </form>
        
        <script>

       </script>
    </body>
</html>