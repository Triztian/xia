var posActual = 11, 
	posActualInt, 
	varSec = parseInt(window.location.href.split('?')[1].split('=')[1]);

function init(){
	// Declarar la relacion entre IDS y funciones a ejecutar
	var arrowIds = {
		'arrowLeft': mueveIzq, 
		'arrowRight': mueveDer, 
		'arrowDown': mueveAba, 
		'arrowUp': mueveArr
	}, ficha;

	// Asignar las funciones a cada elemento
	for ( var a in arrowIds )
		if ( arrowIds.hasOwnProperty(a) )
			document.getElementById(a).onclick = arrowIds[a];

	posActualInt = (Math.floor(Math.random() *20));
	ficha = document.getElementById(posActual);
	ficha.src = 'imagenes/D' + varSec + '.jpg';
}

function mueve(dir){
	var ficha = document.getElementById(posActualInt), 
		egasth = document.getElementById(posActual);

	ficha.src = "imagenes/vacio.jpg";
	egasth.src = 'imagenes/D' + varSec + '.jpg';

	$.ajax({
		method: 'POST', 
		url: 'posiciones.php', 
		dataType: 'JSON',
		data: {
			id: varSec, 
			pos: posActual,
			mov: dir
		},
		success: function(resp, xhr) {
			console.log(resp);		
			$('[type="image"]')
				.prop('disabled', true)
				.attr('src', 'imagenes/mov-arrow-disabled.png');
		},
		error: function(resp, xhr) {
			console.log('Saving Position Error', resp, xhr);
		}
	});
}

function mueveIzq(){
	posActualInt = posActual;
	posActual--;
	if ( posActual < 0 ) 
		posActual = 0;
	mueve('l');
}

function mueveDer(){
	posActualInt = posActual;
	posActual++;
	if ( posActual > 99 ) 
		posActual = 99;
	mueve('r');
}

function mueveAba(){
	posActualInt = posActual;
	posActual += 10;
	if ( posActual > 99 ) 
		posActual = 99;
	mueve('u');
}

function mueveArr(){
	posActualInt = posActual;
	posActual -= 10;
	if ( posActual < 0 ) 
		posActual = 0;
	mueve('d');
}

$(document).ready(function(){
	init();
	var chatView = new ChatView('#chat', 'D' + varSec),
		onmsg = chatView.chat.onMessage;

	chatView.chat.onMessage = function(msg) {
			onmsg();
			if ( !this.isCommand(msg) ) {
				$('[type="image"]')
					.prop('disabled', false)
					.attr('src', 'imagenes/mov-arrow.png');
			} else if ( msg.match(chatView.chat.CLIENT_TYPE_COMMAND) ) {
				var cmd = chatView.chat.parseMessage(msg);
				if ( cmd.type == 'A' ) {
					$('#agent-status').attr({
						'src': 'imagenes/agent.png', 
						'title': 'Conectado'
					});
				} else {
					$('#predator-status-' + cmd.type.substring(1)).attr({
						'src': 'imagenes/predator.png', 
						'title': 'Conectado'
					});
				}
			}
	};

	$('#predator-status-' + varSec).attr({'src': 'imagenes/predator.png', 'title': 'Conectado'});
});



