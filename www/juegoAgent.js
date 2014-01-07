var dep1=1;
var dep2=1;
var dep3=1;
var dep4=1;
var dep5=1;
var posActual;
var posActual2;
var posActual3;
var posActual4;
var posActual5;
var i=1;

function init()
{
	setInterval(segunda,500);
}
function segunda(){
	console.log(i);
	i=1;
	$.ajax({
		type: "GET",
		url: "posiciones.php",
		data:{id:i},
		dataType: "JSON",
		success:function(jug, mensaje){
			console.log(jug, mensaje);
			posActual=dep1;
			dep1 = jug.posicion
			aparece();
		}
	});
	i=2;
	$.ajax({
		type: "GET",
		url: "posiciones.php",
		data:{id:i},
		dataType: "JSON",
		success:function(jug, mensaje){
			console.log(jug, mensaje);
			posActual2=dep2;
			dep2 = jug.posicion
			aparece2();
		}
	});
	i=3;
	$.ajax({
		type: "GET",
		url: "posiciones.php",
		data:{id:i},
		dataType: "JSON",
		success:function(jug, mensaje){
			console.log(jug, mensaje);
			posActual3=dep3;
			dep3 = jug.posicion
			aparece3();
		}
	});
	i=4;
	$.ajax({
		type: "GET",
		url: "posiciones.php",
		data:{id:i},
		dataType: "JSON",
		success:function(jug, mensaje){
			console.log(jug, mensaje);
			posActual4=dep4;
			dep4 = jug.posicion
			aparece4();
		}
	});
	i=5;
	$.ajax({
		type: "GET",
		url: "posiciones.php",
		data:{id:i},
		dataType: "JSON",
		success:function(jug, mensaje){
			console.log(jug, mensaje);
			posActual5=dep5;
			dep5 = jug.posicion
			aparece5();
		}
	});
}
function aparece()
{
	var fichaV = document.getElementById(posActual);
	fichaV.src = "imagenes/vacio.jpg";
	coordenada=dep1.toString();
	var ficha = document.getElementById(coordenada);
	ficha.src = "imagenes/D1.jpg";
}
function aparece2()
{
	var fichaV = document.getElementById(posActual2);
	fichaV.src = "imagenes/vacio.jpg";
	coordenada=dep2.toString();
	var ficha = document.getElementById(coordenada);
	ficha.src = "imagenes/D2.jpg";
}
function aparece3()
{
	var fichaV = document.getElementById(posActual3);
	fichaV.src = "imagenes/vacio.jpg";
	coordenada=dep3.toString();
	var ficha = document.getElementById(coordenada);
	ficha.src = "imagenes/D3.jpg";
}
function aparece4()
{
	var fichaV = document.getElementById(posActual4);
	fichaV.src = "imagenes/vacio.jpg";
	coordenada=dep4.toString();
	var ficha = document.getElementById(coordenada);
	ficha.src = "imagenes/D4.jpg";
}
function aparece5()
{
	var fichaV = document.getElementById(posActual5);
	fichaV.src = "imagenes/vacio.jpg";
	coordenada=dep5.toString();
	var ficha = document.getElementById(coordenada);
	ficha.src = "imagenes/presa.jpg";
}