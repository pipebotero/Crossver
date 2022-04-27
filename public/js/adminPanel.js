/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", main);


function cargarNota(url){
    $("#formulariosAdminPanel").text("Cargando...");
    var elementExists = document.getElementById("formulariosAdminPanel");
    var elementExists2 = document.getElementById('divOpaca');
    if (elementExists!=null) {
        $("#formulariosAdminPanel").remove();
        $("#ContenedorLateralDerecho").append("<div id='formulariosAdminPanel'></div>");
    }
    if (elementExists2!=null) {
        $("#divOpaca").remove();
        console.log("ahora si hablame");
    }
    $("#formulariosAdminPanel").load(url);


}

function main(){
    
    $("#btnCrearUsuario").on("click",function(){
        cargarNota("Usuario/crearAdmin");  
    });
    $("#btnGestionarUsuario").on("click",function(){
        cargarNota("Usuario/gestionar");
       
    });
    $("#btnCrearCancion").on("click",function(){
        cargarNota("Cancion");
    });

    $("#btnGestionarCancion").on("click",function(){
        cargarNota("Cancion/gestionar");
    });
    
    
    $("#btnCrearAlbum").on("click",function(){
        cargarNota("Album/crea");
       
    });
    $("#btnGestionarAlbum").on("click",function(){
        cargarNota("Album/gestionar");
       
    });
    
    $("#btnCrearArtista").on("click",function(){
        cargarNota("Artista");
       
    });

    
    $("#btnCrearGenero").on("click",function(){
        cargarNota("Genero");
       
    });




    
}

function sizas(){
    var element =  document.getElementById('#nomUsuario');
  //if(typeof(element) != 'undefined' && element != null)
  //{ 
      console.log("ya existe");
  //}
}

