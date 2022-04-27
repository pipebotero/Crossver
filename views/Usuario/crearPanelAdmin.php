<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        
</head>
<body>
        <form id="formUserAdmin" class="forms"action="<?php echo _URL; ?>Usuario/crearfromAdmin" method="POST" enctype="multipart/form-data">
            <input id="nomUsuario" name="nombreUsuario" type="text" placeholder="Nombre de Usuario" >
            <input id="email" name="email" type="email" placeholder="Correo Electrónico" >
            <input name="password" type="password" placeholder="Contraseña" > 
            <select id="slctSexo" name="sexo">
                <option value="">Sexo</option>
            </select>
            <select id="slctRol" name="rol">
                <option value="">Rol</option>
            </select>
            
            <input type="submit" value="">
        </form>
        
        <script>
            
           $(document).on("ready", fcnUsuario);

           $('#email').blur(function(){
                var data = {email: $(this).val()};
                $.ajax({
                    url:"<?php echo _URL; ?>Usuario/checkEmail",
                    method:"POST",
                    data: data
                }).done(function(r){
                    if(r>0){
                        console.log(r);
                        alert("invalid/taken email");
                        $('#email').val("");
                    }
                });
            });
            
            function fcnUsuario(){
            $.ajax({
                    url:"<?php echo _URL; ?>Usuario/verUsuarios",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    for(var i = 0; i < json[2]; i++) {
                        var sexo = document.createElement("option");
                        sexo.value=json[3][i]["idSexo"];
                        sexo.innerHTML=json[3][i]["sexo"];
                        document.getElementById("slctSexo").appendChild(sexo);
                    }
                    for(var i = 0; i < json[4]; i++) {
                        var roleins = document.createElement("option");
                        roleins.value=json[5][i]["idRol"];
                        roleins.innerHTML=json[5][i]["rol"];
                        document.getElementById("slctRol").appendChild(roleins);
                    }
                    
                });   
        }        
                    
       </script>
       
    </body>
</html>