<?php
ini_set('display_errors', 1);
require '/home/xia/vendor/autoload.php';
use uabc\ai\Game;

$game = Game::getInstance();

$id = 5;
$game->addPlayer($id);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>PresaDepredador</title>

		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/chat.css" />

		<script src="js/lib/jquery-2.0.3.min.js"></script>
		<script src="js/app/config.js"></script>
		<script src="js/app/chat-client.js"></script>
		<script src="juegoAgent.js"></script>
    </head>
	<body>
		<div class="container">
			<header>
				<h1><span class="color_blanco">Presa</span><span class="color_rojo">Depredador</span></h1>
			</header>
			<div class="row">
				<div class="col-sm-5">
					<table>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="0"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="1"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="2"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="3"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="4"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="5"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="6"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="7"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="8"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="9"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="10"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="11"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="12"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="13"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="14"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="15"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="16"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="17"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="18"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="19"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="20"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="21"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="22"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="23"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="24"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="25"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="26"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="27"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="28"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="29"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="30"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="31"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="32"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="33"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="34"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="35"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="36"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="37"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="38"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="39"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="40"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="41"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="42"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="43"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="44"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="45"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="46"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="47"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="48"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="49"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="50"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="51"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="52"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="53"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="54"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="55"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="56"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="57"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="58"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="59"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="60"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="61"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="62"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="63"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="64"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="65"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="66"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="67"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="68"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="69"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="70"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="71"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="72"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="73"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="74"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="75"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="76"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="77"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="78"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="79"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="80"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="81"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="82"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="83"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="84"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="85"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="86"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="87"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="88"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="89"/></td>
						</tr>
						<tr>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="90"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="91"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="92"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="93"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="94"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="95"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="96"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="97"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="98"/></td>
							<td><img alt="Imagen" src="imagenes/vacio.jpg"  id="99"/></td>
						</tr>
					</table>
					<div class="connections">
						<h3 class="text-warning">Conexiones</h3>
						<img id="agent-status" title="Desconectado" alt="Agente" src="imagenes/agent-disconnected.png" class="disconnected"/>
						<img id="predator-status-1" title="Desconectado" alt="Depredador 1" src="imagenes/predator-disconnected.png" class="disconnected"/>
						<img id="predator-status-2" title="Desconectado" alt="Depredador 2" src="imagenes/predator-disconnected.png" class="disconnected"/>
						<img id="predator-status-3" title="Desconectado" alt="Depredador 3" src="imagenes/predator-disconnected.png" class="disconnected"/>
						<img id="predator-status-4" title="Desconectado" alt="Depredador 4" src="imagenes/predator-disconnected.png" class="disconnected"/>
					</div>
				</div>
				<div class="col-md-5">
					<div id="chat">
						<h1>Chat</h1>
						<dl class="messages"></dl>
						<form>
							<textarea name="message" class="form-control" placeholder="Mensaje"></textarea>
							<span class="glyphicon glyphicon-globe text-muted"> Conectado</span>
							<button class="btn btn-default pull-right" type="button">Send</button>
						</form>
					</div>
					
					<a id="download-page" href="download.php?game=<?=$game->id?>&filename=xia-partida-<?=$game->id?>" class="hidden btn btn-primary btn-block">Descargar Registro</a>
				</div>
			<div>
		</div>
    </body>
</html>

