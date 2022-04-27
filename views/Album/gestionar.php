<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo _URL;?>public/styles/stylesheet.css">
        <script src="<?php echo _URL; ?>public/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo _URL; ?>public/js/comunicacionAjax.js"></script>
        
</head>
        <div id="albumsPanelAdmin">
        </div>
    </body>
    <script type="text/javascript">

        
        $(document).on("ready", verAlbums);
        var URLedit ;


        
        function verAlbums(){

            $("#albumsPanelAdmin").append("<h1>Álbumes</h1>");
             $.ajax({
                    url:"<?php echo _URL; ?>Album/verAlbums",
                    method:"POST",
                    data: {}
                }).done(function(r){
                    var json = JSON.parse(r);

                    for(var i = 0; i < json[0]; i++) {

                        var cajaAlbmId= "cajaAlbmAdmin"; cajaAlbmId = cajaAlbmId.concat(json[1][i]["idAlbum"]);
                        var cajaImgId= "cajaImgAlbmAdmin"; cajaImgId = cajaImgId.concat(json[1][i]["idAlbum"]);
                        var cajaInfId= "cajaInfAlbmAdmin"; cajaInfId = cajaInfId.concat(json[1][i]["idAlbum"]);
                        var cajaBtnId= "cajaBtnAlbmAdmin"; cajaBtnId = cajaBtnId.concat(json[1][i]["idAlbum"]);

                        var imgId= "imgAlbumAdmin"; imgId = imgId.concat(json[1][i]["idAlbum"]);
                        var idEliminar= "idEliminar"; idEliminar = idEliminar.concat(json[1][i]["idAlbum"]);
                        var idEditar= "idEditar"; idEditar = idEditar.concat(json[1][i]["idAlbum"]);

                        var cajaAlbmAdmin = document.createElement("div");
                        cajaAlbmAdmin.id=cajaAlbmId; cajaAlbmAdmin.className="cajaAlbmAdmin";

                        var cajaImgAlbmAdmin =document.createElement("div");
                        cajaImgAlbmAdmin.id=cajaImgId; cajaImgAlbmAdmin.className="cajaImgAlbmAdmin";

                        var cajaInfAlbmAdmin =document.createElement("div");
                        cajaInfAlbmAdmin.id=cajaInfId; cajaInfAlbmAdmin.className="cajaInfAlbmAdmin";

                        var cajaBtnAlbmAdmin =document.createElement("div");
                        cajaBtnAlbmAdmin.id=cajaBtnId; cajaBtnAlbmAdmin.className="cajaBtnAlbmAdmin";

                        document.getElementById("albumsPanelAdmin").appendChild(cajaAlbmAdmin);

                        $("#"+cajaAlbmId).append(cajaImgAlbmAdmin);
                        $("#"+cajaAlbmId).append(cajaInfAlbmAdmin);
                        $("#"+cajaAlbmId).append(cajaBtnAlbmAdmin);

                        var imgAlbum = document.createElement("img");
                        imgAlbum.id=imgId; imgAlbum.className="imgAlbumPanel";

                        $("#"+cajaImgId).append(imgAlbum);

                        var nomAlbum = document.createElement("div");
                        //nomAlbum.id=cajaAlbmId; 
                        nomAlbum.className="nomAlbum";
                        nomAlbum.innerHTML="<font color='#1ABC9C'>Nombre: </font>"+"<small>"+"<font color='#FFF'>"+json[1][i]["nombreAlbum"]+"</font>"+"</small>";

                        var genAlbum = document.createElement("div");
                        //cajaAlbmAdmin.id=cajaAlbmId; 
                        genAlbum.className="genAlbum";

                        for(var j=0; j<json[2]; j++){
                            if(json[3][j]["idGenero"]==json[1][i]["idGenero"]){
                                genAlbum.innerHTML="<font color='#1ABC9C'>Genero: </font>"+"<small>"+"<font color='#FFF'>"+json[3][j]["genero"]+"</font>"+"</small>";
                            }
                        }

                        $("#"+cajaInfId).append(nomAlbum);
                        $("#"+cajaInfId).append(genAlbum);

                        var uri = "<?php echo _URL?>"+json[1][i]["imagen"];
                        imgAlbum.src=uri;

                        var btnEliminar = document.createElement("div");
                        btnEliminar.className="btnEliminar";
                        btnEliminar.id=idEliminar;
                        btnEliminar.onclick = function() { 
                            deleteAlbum(this.id); 
                        };
                        

                        var btnEditar = document.createElement("div");
                        btnEditar.className="btnEditar";
                        btnEditar.id=idEditar;
                        btnEditar.onclick = function() { 
                            editAlbum(this.id); 
                        };
                        $("#"+cajaBtnId).append(btnEditar);
                        $("#"+cajaBtnId).append(btnEliminar);

                        var nom = document.createElement("div");


                    }

                });

        }

        function deleteAlbum(idBtn){

            var idSend = idBtn.replace(/^\D+/g, "");
                
                $.ajax({
                    url:"<?php echo _URL; ?>Albums_has_artistas/deleteRelacion",
                    method:"POST",
                    data: {idAlbum: idSend}
                }).done(function(r){
                    console.log(r);
                    $.ajax({
                    url:"<?php echo _URL; ?>Album/deleteAlbum",
                    method:"POST",
                    data: {idAlbm: idSend}
                }).done(function(l){
                    console.log(l)
                    $("#btnGestionarAlbum").trigger('click');
                    
                    });

                    });
        
        }


        function editAlbum(idBtn){
            var idSend = idBtn.replace(/^\D+/g, "");

            $.ajax({
                    url:"<?php echo _URL; ?>Album/formEditar",
                    method:"POST",
                    data: {idAlbum: idSend}
                }).done(function(r){
                    var json = JSON.parse(r);
                    console.log(json[2]);

                    var divOpaca = "<div id='divOpaca'></div>";
                     var contentForm= "<div id='contentForm' class='contenedorForm'></div>";

                     $("#ContenedorLateralDerecho").append(divOpaca);
                     $("#divOpaca").append(contentForm);
                     var elementExists = document.getElementById("contentForm");
                        if (elementExists!=null) {
                            $("#contentForm").remove();
                            $("#divOpaca").append(contentForm);
                        }
                        $("#contentForm").load("Album/edit");



                        setTimeout(
                          function() 
                          {
                            var formEd = document.getElementById('formAlbum');
                           
                            formEd.action="<?php echo _URL; ?>Album/editar";
                            
                            var iptNomAlbm = document.getElementById('iptNomAlbm');
                            iptNomAlbm.value=json[0]["nombreAlbum"];

                            var slctGenero = document.getElementById('slctGenero');
                            slctGenero.value=json[0]["idGenero"];

                            var slctArtista = document.getElementById('slctArtista');
                            slctArtista.value=json[3][0]["idArtista"];
                                
                                for (var j = 1; j <json[4]; j++) {
                                    console.log("ahu");
                                    
                                
                                        var newSlctArt = document.createElement("select");
                                        var optSel = document.createElement("option");
                                        optSel.innerHTML="Selecciones un Artsita";
                                        newSlctArt.appendChild(optSel);

                                        for(var k = 0; k <json[5]; k++){
                                            var optArt = document.createElement("option");
                                            optArt.innerHTML=json[6][k]["nombreArtista"];
                                            optArt.value=json[6][k]["idArtista"];
                                            newSlctArt.appendChild(optArt);
                                            //newSlctArt.id=j;

                                        }
                                        var art= "artista"; art=art.concat(j);
                                        newSlctArt.value=json[3][j]["idArtista"];
                                        newSlctArt.name=art;
                                        $("#formAlbum").append(newSlctArt);
                                        $(newSlctArt).insertBefore( "#imgAlbum" );

                                        var numArtis= document.getElementById('numArtis');
                                        numArtis.value=j;
                                        
                                };
                            //};
                            var sendID = document.createElement("input");
                                        sendID.name="numID";
                                        sendID.className="oculto";
                                        $("#formAlbum").append(sendID);
                                        sendID.value=json[0]["idAlbum"];

                          }, 300);
                

                });
        }
                    
    </script>
</html>

