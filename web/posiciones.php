<?php
$mysqli = mysqli_connect("localhost", "xia", "123456", "xia");

$predatorId = $_REQUEST['id'];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$position = $_POST['pos'];
	$mov = $_POST['mov'];

	mysqli_query($mysqli, 'START TRANSACTION');
	$sql = "UPDATE tablafinal as tf, (SELECT MAX(ID) as ID FROM tablafinal) as t SET D$predatorId = '$mov' WHERE tf.ID = t.ID";
	$res = mysqli_query($mysqli, $sql);
	$sql = "UPDATE posiciones SET posicion = '$position' WHERE id = $predatorId LIMIT 1";
	$res = mysqli_query($mysqli, $sql);
	
	mysqli_query($mysqli, 'COMMIT');
}

$res = mysqli_query($mysqli, "SELECT * FROM posiciones where id = " . $predatorId);
$row = mysqli_fetch_assoc($res);
print(json_encode($row));
exit(0);

?>	