<?php
	$usuario = 'xia';
	$contraseña = '123456';

	$data = new PDO('mysql:host=localhost;dbname=xia', $usuario, $contraseña);

	$top = "Mensaje de Principal                                                                            | Depredador1 | Depredador2 | Depredador3 | Depredador4 ";
	$div = "\r\n--------------------------------------------------------------------------------------------------------------------------------------------------------\r\n";

	$mensaje = $top . $div;

	$rows = $data->query('SELECT * FROM tablafinal');

	foreach ($rows as $row){
 
		$mensaje = $mensaje . str_pad($row['MENSAJE'], 96) . "|";
		$mensaje = $mensaje . str_pad($row['D1'], 13," ",STR_PAD_BOTH) . "|";
		$mensaje = $mensaje . str_pad($row['D2'], 13," ",STR_PAD_BOTH) . "|";
		$mensaje = $mensaje . str_pad($row['D3'], 13," ",STR_PAD_BOTH) . "|";
		$mensaje = $mensaje . str_pad($row['D4'], 13," ",STR_PAD_BOTH);
		$mensaje = $mensaje . $div;
	}

	header('Content-Disposition: attachment; filename="MovimientosTabla.txt"');
	echo $mensaje;
?>