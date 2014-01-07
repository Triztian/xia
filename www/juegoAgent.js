// Declaracion de variables globales
var posActual, 
	posActual2,
	posActual3,
	posActual4,
	posActual5;

// Las siguientes lineas de codigo se ejecutan ya que se termina de cargar
// la pagina, `$(document).ready(function() { ... })` es el equivalente de asignar una 
// funcion a window.onload o sea `window.onload = function () { ... };`
// Sin embrago, jQuery nos proporciona una manera mas clara en cuanto a su intencion
$(document).ready(function() {
	var chatView  =  new ChatView('#chat', 'A'), 
		intervalId;

	chatView.$('button').click(function() {
		chatView.send();
		chatView.disable();
	});

	// Esta funcion se encarga de obtener las posiciones de los jugadores 
	// utilizando llamadas AJAX al servidor, su declaracion se movio aqui
	// Para que puedan hacer uso del `chatView`, en particular la funcion 
	// actualizarJugador
	function obtenerPosiciones() {
		$.ajax({
			type: "GET",
			url: "posiciones.php",
			data: {id:0}, // Id especial para que se retornen TODAS las posciciones de todos los jugadores
			dataType: "JSON",
			// Se espera que players sea un arreglo de Javascript que contiene
			// todas las posiciones de los jugadores
			success: function (players, status, msg) {
				var p, player;
				for ( p in players ) {
					player = players[p];
					actualizarJugador(player);
				}
			}
		});
	}

	// Definir el intervalo de actualizacion (medio segundo)
	intervalId = setInterval(obtenerPosiciones, 500);

	/**
	 * Esta funcion se encarga de actualizar las imagenes del jugador 
	 * proporcionado.
	 */
	function actualizarJugador (player) {
		// La variable `window` es como un objeto que contiene
		// todas las variable globales declaradas, se puede acceder a dichas variables
		// se puede hacer ya sea `window.posActual1` o `window['posActual1']` o simplemente
		// `posActual1`
		var $prevToken = $('#' + window['posActual' + player.id]),
			$currentToken = $('#' + player.posicion),
			img = 'imagenes/' + (player.tipo == 'presa' ? 'presa' : 'D' + player.id) + '.jpg';

		console.log('Player ' + player.id, player);
		console.log($prevToken, $currentToken);
		$prevToken.attr({src:  "imagenes/vacio.jpg"});
		$currentToken.attr({src: img});

		// Actualizar la posicion del jugador
		window['posActual' + player.id] = player.posicion;

		if ( player.enableChat ) 
			chatView.enable();
		
		// Si la presa esta rodeada, eliminar la funcion que se obtiene las posiciones
		// y mostrar el enlace para la pagina de descarga.
		if ( player.preySurrounded ) {
			clearInterval(intervalId);
			$('#download-page').removeClass('hidden');
			chatView.chat.connection.close();
			chatView.disable();
		}
	}
});