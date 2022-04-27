/*function cargarFunciones(){
    changeStyles();
}

function changeStyles(){
    
    $( "#Navegacion nav li a" ).click(function() {
        $('#Navegacion nav li a').addClass('color_a');
    });
    console.log("siza");
}

window.onload = cargarFunciones;*/
$(function(){
	$(".Item .title").click(function(){
		$(this).next(".Menu").slideToggle();
			
	});
});


$(function(){
	/*jQuery("a", this).click(function() {
        $('#InicioBtn').addClass('color_a');
    });
    console.log("siza");*/
    $(document).on('click', 'a', function () {
    var elementID = this.id; var char = "#";
    var element =  char.concat(elementID);
    $(element).addClass('color_a');
});
    var windLogin = "<div id='windLogin'></div>";
    var wrapLogin = "<div id='wrapLogin'></div>";
    

/**
    Crea La ventana Emergente de Login
*/
    $( "#LoginIn a" ).click(function() {

        $("body").append(windLogin); 
        $("#windLogin").append("<div id='wrapLogin'></div>"); 

        var elementExists = document.getElementById('windLogin');
        if (elementExists!=null) {
            console.log("sizas");
            //$("#windLogin").remove();
            //$("body").append("<div id='windLogin'></div>"); 
             //$("#windLogin").append("<div id='wrapLogin'></div>"); 
        }
        $('#wrapLogin').load("Usuario/login");

});


});
function cerrarLogIn(){
        $("#windLogin").empty();
        $("#windLogin").remove();
        console.log("Se borro");
    }


