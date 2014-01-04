<?php

$pdo = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
$rows = $pdo->query('SELECT * FROM tablafinal');

$s = '';
foreach($rows as $r) {
	for($i= 0; $i< $rows->columnCount(); $i++) {
		$s .= $r[$i] . "<br />";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				white-space: pre;
			}
		</style>
	</head>
	<body>
		<?=$s?>
	</body>
</html>
