<?php
ini_set('display_errors', 1);
$filename = $_GET['filename'];
$game = $_GET['game'];

$db = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
$rows = $db->query('SELECT * FROM tablafinal WHERE partida = ' . $game);

$contents = '';
foreach ( $rows as $row ) {
	$array = array(
		$row['MENSAJE'], 
		$row['D1'], 
		$row['D2'], 
		$row['D3'], 
		$row['D4']
	);
	$contents .= join(',', $array) . "\r\n";
}

header("Content-Disposition: attachment; filename=\"$filename.txt\"");
$contents = trim(preg_replace('/\s+/', ' ', $contents));
print($contents);
?>