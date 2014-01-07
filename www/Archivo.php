<?php

$pdf=new PDFlib();

$usuario = 'xia';
$contraseña = '123456';

$data = new PDO('mysql:host=localhost;dbname=xia', $usuario, $contraseña);  //editar host y demas

$top = "Mensaje de Principal                                                                            | Depredador1 | Depredador2 | Depredador3 | Depredador4 ";
$div = "\r\n--------------------------------------------------------------------------------------------------------------------------------------------------------\r\n";

$mensaje = $top . $div;



$rows = $data->query('SELECT * FROM tablafinal');

 foreach ($rows as $row){
	
	$mensaje = $mensaje . $row['MENSAJE'] . "\n";
	$mensaje = $mensaje . $row['D1'];

}

header('Content-Disposition: attachment; filename="Movimientos.txt"');
echo $mensaje;

$pdf->show_xy("ola k ase" ,10 ,10);
?>