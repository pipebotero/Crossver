<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>

        <div id="generos">
        </div>
    </body>
    <script type="text/javascript">
        
        function fcnVerRoles(){
            $.ajax({
                    url:"<?php echo _URL; ?>Genero/verGeneros",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    for(var i = 0; i < json[0]; i++) {
                        console.log(json[1][i]);
                        var div=document.getElementById("generos");
                        div.innerHTML+= json[1][i]["genero"];
                        if(!(i==json[0]-1)){
                            div.innerHTML+= ' , ';
                        }   
                    }
                    
                });   
        }        
                    
                    window.onload = fcnVerRoles;
                    
    </script>
</html>

