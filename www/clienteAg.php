<!DOCTYPE HTML>
<html>
    <head>
		<meta charset = "utf-8">
        <title>PresaDepredador</title>
		<link rel="stylesheet" href="style.css" />
		<script src="js/lib/jquery-2.0.3.min.js"></script>
		<script src="juegoAgent.js"></script>
	</head>
	<header>
		<h1><span class="color_blanco">Presa</span><span class="color_rojo">Depredador</span></h1></a>
	</header>
		
	<div id=dato>	
	</div>
		<div>
			<div id="space"></div>
			<div id="tablero">
				<table>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="0"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="1"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="2"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="3"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="4"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="5"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="6"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="7"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="8"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="9"/></td>
					</tr>
					<tr>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="10"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="11"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="12"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="13"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="14"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="15"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="16"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="17"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="18"/></td>
						<td><img alt="Imagen" src="imagenes/vacio.jpg" width="45" height="45" id="19"/></td>
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
			</div>
			<div id="space"></div>
			<div id="menu">
				<form id="form1" name="form1" method="post" action="">
					<br><br>
					<div id="centro">
						<a title="Arriba" id="arrowUp"><img alt="Imagen" src="imagenes/arriba.png" width="70" height="100" /></a>
					</div>
					<a title="Izquierda" id="arrowLeft"><img href="index.html" alt="Imagen" src="imagenes/izquierda.png" width="100" height="70" /></a>
					<a  title="Derecha" id="arrowRight"><img alt="Imagen" src="imagenes/derecha.png" width="100" height="70" /></a>
					<div id="centro">
						<a title="Abajo" id="arrowDown"><img alt="Imagen" src="imagenes/abajo.png" width="70" height="100" /></a>
					</div>
					<br><br><br>
					<div>
						<input type="text" name="mensaje" id="mensaje" style="width:280px;height:100px" placeholder="Mensaje"/>
					</div>
				</form>
			</div>
		</div>
		<script>
			window.onload = init;
		</script>
    </body>
</html>

