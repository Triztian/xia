<!DOCTYPE HTML>
<html>
    <head>
        <title>PresaDepredador</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="css/client.css" />

		<script src="js/lib/jquery-2.0.3.min.js"></script>
		<script src="js/app/config.js"></script>
		<script src="js/app/chat-client.js"></script>
		<script src="juego.js"></script>
    </head>
	<body>
		<header>
			<h1><span class="color_blanco">Presa</span><span class="color_rojo">Depredador</span></h1></a>
		</header>
		
		<div>
			<div id="space"></div>
			<div id="tablero">
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
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="20"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="21"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="22"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="23"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="24"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="25"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="26"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="27"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="28"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="29"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="30"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="31"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="32"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="33"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="34"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="35"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="36"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="37"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="38"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="39"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="40"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="41"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="42"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="43"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="44"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="45"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="46"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="47"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="48"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="49"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="50"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="51"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="52"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="53"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="54"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="55"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="56"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="57"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="58"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="59"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="60"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="61"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="62"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="63"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="64"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="65"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="66"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="67"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="68"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="69"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="70"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="71"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="72"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="73"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="74"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="75"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="76"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="77"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="78"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="79"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="80"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="81"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="82"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="83"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="84"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="85"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="86"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="87"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="88"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="89"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="90"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="91"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="92"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="93"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="94"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="95"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="96"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="97"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="98"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="99"/></td>
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
			<div id="space"></div>
			<div id="menu">
				<div>
					<div id="centro">
						<input id="arrowUp" type="image" src="imagenes/mov-arrow-disabled.png" value="d" disabled />
					</div>
					<div class="inline">
						<input id="arrowLeft" type="image" src="imagenes/mov-arrow-disabled.png" value="l" disabled />
						<div></div>
						<input id="arrowRight" type="image" src="imagenes/mov-arrow-disabled.png" value="r" disabled />
					</div>
					<div id="centro">
						<input id="arrowDown" type="image" src="imagenes/mov-arrow-disabled.png" value="d" disabled />
					</div>
				</div>
				<div id="chat">
					<h3 class="text-warning">Mensajes del Agente</h3>
					<span class="glyphicon glyphicon-globe"> Conectado</span>
					<dl class="messages"></dl>
				</div>
			</div>
		</div>
    </body>
</html>

