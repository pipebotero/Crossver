<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>
        <div id="usuarios">
        </div>
    </body>
    <script type="text/javascript">

        
        $(document).on("ready", verUsuarios);
        var URLedit ;

        $("#usuarios").append("<h1>Usuarios</h1>");
        
        var atribUsername = document.createElement("div");
        atribUsername.id="atribUsername";
        document.getElementById("usuarios").appendChild(atribUsername);

        var nomb = document.createElement("div");
        nomb.id="nomUser";
        nomb.innerHTML= "Nombre de Usuario";
        atribUsername.appendChild(nomb);

        var atribEmail = document.createElement("div");
        atribEmail.id="atribEmail";
        document.getElementById("usuarios").appendChild(atribEmail);

        var correo = document.createElement("div");
        correo.id="correo";
        correo.innerHTML+= "Correo";
        document.getElementById("atribEmail").appendChild(correo);

        var atribSexo = document.createElement("div");
        atribSexo.id="atribSexo";
        document.getElementById("usuarios").appendChild(atribSexo);

        var sxy = document.createElement("div");
        sxy.id="sxy";
        sxy.innerHTML+= "Sexo";
        document.getElementById("atribSexo").appendChild(sxy);

        var atribRol = document.createElement("div");
        atribRol.id="atribRol";
        document.getElementById("usuarios").appendChild(atribRol);

        var roly = document.createElement("div");
        roly.id="roly";
        roly.innerHTML+= "Rol";
        document.getElementById("atribRol").appendChild(roly);

        var atribEditar = document.createElement("div");
        atribEditar.id="atribEditar";
        document.getElementById("usuarios").appendChild(atribEditar);


        var atribDelete = document.createElement("div");
        atribDelete.id="atribDelete";
        document.getElementById("usuarios").appendChild(atribDelete);

        

        
        function verUsuarios(){


            $.ajax({
                    url:"<?php echo _URL; ?>Usuario/verUsuarios",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);

                    
                    for(var i = 0; i < json[0]; i++) {
                        console.log(json[1][i]);
                        var usrNum= "usuario";
                        usrNum=usrNum.concat(json[1][i]["idUsuario"]);

                        var idEditar = "editar";
                        idEditar=idEditar.concat(usrNum);

                        var idEliminar = "eliminar";
                        idEliminar=idEliminar.concat(usrNum);

                        
                        var username = document.createElement("div");
                        username.className="divUsername";
                        username.innerHTML+= json[1][i]["nombreUsuario"];
                        atribUsername.appendChild(username);
                        
                        var email = document.createElement("div");
                        email.className="divEmail";
                        email.innerHTML+= json[1][i]["correo"];
                        atribEmail.appendChild(email);
                        
                        var sexo = document.createElement("div");
                        sexo.className="divSexo";

                        var rol = document.createElement("div");
                        rol.className="divRol";

                        for(var j = 0; j < json[2]; j++) {
                            if(json[1][i]["idSexo"]==json[3][j]["idSexo"]){
                                sexo.innerHTML+=json[3][j]["sexo"];
                            }
                        }             

                        for(var j = 0; j < json[4]; j++) {
                            if(json[1][i]["idRol"]==json[5][j]["idRol"]){
                                rol.innerHTML+=json[5][j]["rol"];
                            }
                        } 

                        atribSexo.appendChild(sexo);
                        atribRol.appendChild(rol);       
                        

                        var btnEliminar = document.createElement("div");
                        btnEliminar.className="btnEliminar";
                        btnEliminar.id=idEliminar;
                        btnEliminar.onclick = function() { 
                            deleteUser(this.id); 
                        };
                        atribDelete.appendChild(btnEliminar);

                        var btnEditar = document.createElement("div");
                        btnEditar.className="btnEditar";
                        btnEditar.id=idEditar;
                        btnEditar.onclick = function() { 
                            editUser(this.id); 
                        };
                        atribEditar.appendChild(btnEditar);

                    }
                    
                }); 

        }

        /**** ELIMINAR - EIDTAR *****/

        function editUser(idBtn){
            
            
                
            var idSend = idBtn.replace(/^\D+/g, "");
            
            $.ajax({
                    url:"<?php echo _URL; ?>Admin/checkAcces",
                    method:"POST",
                    data: {idUsua: idSend}
                }).done(function(l){
                    console.log(l);
                    
                    if(l==0){
                        alert("No puede Editar a un Super Admin o un Admin");
                    }else{
                        
                        $.ajax({
                    url:"<?php echo _URL; ?>Usuario/formEditar",
                    method:"POST",
                    data: {idUsr: idSend}
                }).done(function(r){
                     var json = JSON.parse(r);
                     
                     
                     var divOpaca = "<div id='divOpaca'></div>";
                     var contentForm= "<div id='contentForm' class='contenedorForm'></div>";
                     var formEditUser = "<form id='formUser' class='forms'action='";
                     formEditUser=formEditUser.concat(json[5]);
                     formEditUser=formEditUser.concat("Usuario/crear' method='POST'</form>");;
                     var url_Edit=json[5];
                     url_Edit=url_Edit.concat("Usuario/editar");
                     URLedit=url_Edit;
                     $("#ContenedorLateralDerecho").append(divOpaca);
                     $("#divOpaca").append(contentForm);
                     var elementExists = document.getElementById("contentForm");
                        if (elementExists!=null) {
                            $("#contentForm").remove();
                            $("#divOpaca").append(contentForm);
                        }

                    $(".contenedorForm").append(formEditUser);
                     var inputNombre = "<input id='nomUsuario' name='nombreUsuario' type='text'>";
                     $(".forms").append(inputNombre);
                     $("#nomUsuario").val(json[0]["nombreUsuario"]);

                     var inputEmail = "<input id='email' name='email' type='email' placeholder='Correo Electrónico' >";
                     $(".forms").append(inputEmail);
                     $("#email").val(json[0]["correo"]);

                     var slctSexo = "<select id='slctSexo' name='sexo'></select>";
                     $(".forms").append(slctSexo);
                     
                     $('#divOpaca').click(function(){
                           $('#formUser').attr('action', url_Edit);
                    });
                     
                     for(var i=0; i<json[1]; i++){
                        if(json[2][i]["idSexo"]==json[0]["idSexo"]){
                            $("#slctSexo").append("<option value="+json[2][i]["idSexo"]+">"+json[2][i]["sexo"]+"</option>");
                        }else if(i==0){
                            $("#slctSexo").append("<option value="+json[2][i+1]["idSexo"]+">"+json[2][i+1]["sexo"]+"</option>");
                            $("#slctSexo").append("<option value="+json[2][i]["idSexo"]+">"+json[2][i]["sexo"]+"</option>");
                            i=2;
                        }else{
                            $("#slctSexo").append("<option value="+json[2][i]["idSexo"]+">"+json[2][i]["sexo"]+"</option>");
                        }

                     }

                     var slctRol = "<select id='slctRol' name='rol'></select>";
                     $(".forms").append(slctRol);
                     
                     for(var i=0; i<json[3]; i++){
                        if(json[4][i]["idRol"]==json[0]["idRol"] && json[4][i]["idRol"]==1){
                            $("#slctRol").append("<option value="+json[4][i]["idRol"]+">"+json[4][i]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i+1]["idRol"]+">"+json[4][i+1]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i+2]["idRol"]+">"+json[4][i+2]["rol"]+"</option>");
                        }else if(json[4][i]["idRol"]==json[0]["idRol"] && json[4][i]["idRol"]==2){
                            $("#slctRol").append("<option value="+json[4][i]["idRol"]+">"+json[4][i]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i-1]["idRol"]+">"+json[4][i-1]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i+1]["idRol"]+">"+json[4][i+1]["rol"]+"</option>");
                        }else if(json[4][i]["idRol"]==json[0]["idRol"] && json[4][i]["idRol"]==3){
                            $("#slctRol").append("<option value="+json[4][i]["idRol"]+">"+json[4][i]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i-2]["idRol"]+">"+json[4][i-2]["rol"]+"</option>");
                            $("#slctRol").append("<option value="+json[4][i-1]["idRol"]+">"+json[4][i-1]["rol"]+"</option>");
                        }

                     }

                     var submitEditar = "<input type='submit' value=''>";
                     $(".forms").append(submitEditar);
                     
                     var sendIdUsuario = "<input id='inputId' class='oculto' type='number' name='idUsuario' value='"+json[0]["idUsuario"]+"'>";
                     $(".forms").append(sendIdUsuario);
                     

                    });
                    
    
                    }
                    
                
                    });
                    
               
       
        }        
        
        function deleteUser(idBtn){
            var idSend = idBtn.replace(/^\D+/g, "");
                
                $.ajax({
                    url:"<?php echo _URL; ?>Admin/checkAcces",
                    method:"POST",
                    data: {idUsua: idSend}
                }).done(function(l){
                    console.log(l);
                    
                    if(l==0){
                        alert("No puede Editar a un Super Admin o un Admin");
                    }else{
                    
                $.ajax({
                    url:"<?php echo _URL; ?>Usuario/eliminar",
                    method:"POST",
                    data: {idUsr: idSend}
                }).done(function(r){
                    console.log(r);
                    //location.reload();
                    $("#btnGestionarUsuario").trigger('click');

                    });
                    }
                    
                    });
                   
       
        }  




                    
    </script>
</html>

