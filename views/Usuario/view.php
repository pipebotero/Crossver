
        <div id="usuarios">
        </div>
    </body>
    <script type="text/javascript">
        
        function verUsuarios(){
            $.ajax({
                    url:"<?php echo _URL; ?>Usuario/verUsuarios",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);
                    for(var i = 0; i < json[0]; i++) {
                        console.log(json[1][i]);
                        
                        var div = document.createElement("div");
                        div.className="usr";
                        div.innerHTML+= 'Usuario: ';
                        div.innerHTML+= json[1][i]["nombreUsuario"];
                        div.innerHTML+= ' , email: ';
                        div.innerHTML+= json[1][i]["correo"];
                        var br=document.createElement("br");
                        document.getElementById("usuarios").appendChild(div);
                        document.getElementById("usuarios").appendChild(br);
                           
                    }
                    
                });   
        }        
                    
                    window.onload = verUsuarios;
                    
    </script>
</html>

