
var AcumCarrito = 0;

function contadorCarro(){
	AcumCarrito=AcumCarrito+1;
	console.log(AcumCarrito);
	var contProductos = document.getElementById("contProductos");
	contProductos.innerHTML = AcumCarrito;
}