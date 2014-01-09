<?php
	$usuario = 'xia';
	$contraseña = '123456';

	$data = new PDO('mysql:host=localhost;dbname=xia', $usuario, $contraseña);
	$rows = $data->query('SELECT * FROM tablafinal');
	$mensaje = 	"";

	foreach ($rows as $row){
 
		$array = array($row['MENSAJE'],$row['D1'],$row['D2'],$row['D3'],$row['D4']);
		$mensaje = $mensaje . "\"" . implode("\",\"",$array) . "\"\r\n";
	}

	header('Content-Disposition: attachment; filename="MovimientosCSV_CD.txt"');
	echo $mensaje;
?>