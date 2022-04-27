<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>

    
        <div id="artistas">
        </div>
    </body>
    <script type="text/javascript">
        
        function fcnVerArtistas(){
            $.ajax({
                    url:"<?php echo _URL; ?>Artista/verArtistas",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    for(var i = 0; i < json[0]; i++) {
 
                        var divImg = document.createElement("img");
                        var url="<?php echo _URL; ?>";
                        var uri = url.concat(json[1][i]["imagen"])
                        divImg.src=uri;
                        var div=document.getElementById("artistas");
                        
                        div.appendChild(divImg);
                        div.innerHTML+= json[1][i]["nombreArtista"];
                        if(!(i==json[0]-1)){
                            div.innerHTML+= ' , ';
                        }   
                    }
                    
                });   
        }        
                    
                    window.onload = fcnVerArtistas;
                    
    </script>
</html>

