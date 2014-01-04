<?php

$pdo = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
$rows = $pdo->query('SELECT * FROM tablafinal');

foreach($rows as $r) {
	for($i= 0; $i< $rows->columnCount(); $i++) {
		print($r[$i] . "<br />");
	}
}
?>
