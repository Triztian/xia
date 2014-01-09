<?php
$nombre = $_GET['filename'];
$gameId = $_GET['game'];

$db = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');

$rows = $db->query('SELECT * FROM tablafinal WHERE partida = ' . $game);

$mensaje = 	"";
foreach ($rows as $row){
	$array = array($row['MENSAJE'],$row['D1'],$row['D2'],$row['D3'],$row['D4']);
	$mensaje = $mensaje . join(",",$array) . "\r\n";
}

header("Content-Disposition: attachment; filename=\"$nombre.txt\"");
echo $mensaje;
?>