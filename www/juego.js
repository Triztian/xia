// Declaracion de variables GLOBALES
var posActual,
	predatorId = parseInt(window.location.href.split('?')[1].split('=')[1]),
	UP_DIRECTION = 'u', 
	DOWN_DIRECTION = 'd', 
	LEFT_DIRECTION = 'l',
	RIGHT_DIRECTION = 'r',
	PASS_TURN = 'p';

/**
 * Esta funcion establece el estaod de los flechas.
 */
function setControlState(enabled) {
	var enabledInputs = [], c;
		
	if ( enabled ) {
		$.ajax({
			url: 'posiciones.php',
			data: {id: 0},
			dataType: 'JSON',
			success: function(players, status, jqxhr) {
				console.log(players, status, jqxhr);
				var disabled = [], p, player, i;
				for ( p in players ) {
					player = players[p];
					if ( player.id === predatorId )
						continue;

					if ( posActual + 1 == player.posicion ) 
						disabled.push('arrowRight');

					if ( posActual - 1 == player.posicion ) 
						disabled.push('arrowLeft');

					if ( posActual + 10 == player.posicion ) 
						disabled.push('arrowDown');

					if ( posActual - 10 == player.posicion ) 
						disabled.push('arrowUp');
				}
				for ( i in disabled ) {
					$('#' + disabled[i])
						.prop('disabled', true)
						.attr('src', 'imagenes/mov-arrow-disabled.png');
				}
			}
		});
		if ( posActual > 10 )
			enabledInputs.push($('#arrowUp'));

		if ( posActual < 90 )
			enabledInputs.push($('#arrowDown'));

		if ( posActual % 10 >= 1 )
			enabledInputs.push($('#arrowLeft'));

		if ( posActual % 10 !== 9 )
			enabledInputs.push($('#arrowRight'));

		$('input[type="image"]')
			.prop('disabled', true)
			.attr('src', 'imagenes/mov-arrow-disabled.png');

		for ( c in enabledInputs ) {
			enabledInputs[c]
				.prop('disabled', false)
				.attr('src', 'imagenes/mov-arrow.png');
		}
	} else {
		$('[type="image"]')
			.prop('disabled', true)
			.attr('src', 'imagenes/mov-arrow-disabled.png');
	}
	$('#passTurn').prop('disabled', !enabled);
} 

function mueve(dir){
	$.ajax({
		method: 'POST', 
		url: 'posiciones.php', 
		dataType: 'JSON',
		data: {
			id: predatorId, 
			pos: posActual,
			mov: dir
		},
		success: function(player, status, jqxhr) {
			var imgSrc = 'imagenes/D' + predatorId + '.jpg',
				$img = $('img[src="' + imgSrc + '"]'),
				$ficha = $('#' + player.posicion);

			posActual = player.posicion;
			setControlState(false);

			$img.attr('src', 'imagenes/vacio.jpg');
			$ficha.attr('src', imgSrc);
		},
		error: function(player, xhr) {
			console.log('Saving Position Error', player, xhr);
		}
	});
}

function mueveIzq(){
	posActual--;
	if ( posActual < 0 ) 
		posActual = 0;
	mueve(LEFT_DIRECTION);
}

function mueveDer(){
	posActual++;
	if ( posActual > 99 ) 
		posActual = 99;
	mueve(RIGHT_DIRECTION);
}

function mueveAba(){
	posActual += 10;
	if ( posActual > 99 ) 
		posActual = 99;

	mueve(UP_DIRECTION);
}

function mueveArr(){
	posActual -= 10;
	if ( posActual < 0 ) 
		posActual = 0;
	mueve(DOWN_DIRECTION);
}

function passTurn() {
	mueve(PASS_TURN);
}

$(document).ready(function(){
	var chatView = new ChatView('#chat', 'D' + predatorId),
		onmsg = chatView.chat.onMessage;

	chatView.chat.onMessage = function(msg) {
			onmsg();
			if ( !this.isCommand(msg) ) {
				setControlState(true);
			} else if ( msg.match(chatView.chat.CLIENT_TYPE_COMMAND) ) {
				var cmd = chatView.chat.parseMessage(msg), 
					connAttrs = {
						'title': 'Conectado',
						'class': 'connected'
					};
				if ( cmd.type == 'A' ) {
					$('#agent-status').attr($.extend(connAttrs, {'src': 'imagenes/agent.png'}));
				} else {
					$('#predator-status-' + cmd.type.substring(1)).attr($.extend(connAttrs, {'src': 'imagenes/predator.png'}));
				}
			}
	};

	$('#predator-status-' + predatorId).attr({'src': 'imagenes/predator.png', 'title': 'Conectado', 'class': 'connected'});

	// Simple mape para realizar las asignaciones de funciones 
	// de manera sencilla.
	var arrowIds = {
			'arrowLeft': mueveIzq, 
			'arrowRight': mueveDer, 
			'arrowDown': mueveAba, 
			'arrowUp': mueveArr,
			'passTurn': passTurn
		};

	// Asignar las funciones a cada elemento
	for ( var a in arrowIds )
		if ( arrowIds.hasOwnProperty(a) )
			document.getElementById(a).onclick = arrowIds[a];

	// Realizar la llamada inicial para obtener las posiciones del servidor
	$.ajax({
		method: 'GET',
		url: 'posiciones.php', 
		data: {id: predatorId}, 
		dataType: 'JSON', 
		success: function(player, status, jqxhr) {
			console.log(player, status, jqxhr);
			var ficha = document.getElementById(player.posicion);
			ficha.src = 'imagenes/D' + predatorId + '.jpg';
			posActual = player.posicion;
		}
	});
});
