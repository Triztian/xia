<?php
	$id = $_POST['id'];
	$posActual = $_POST['pos']; 	
	//conexion a la base de datos
	$mysqli = mysqli_connect("localhost", "xia", "123456", "xia");
	//creamos sentencia SQL y la ejecutamos
	$sSQL = mysqli_query($mysqli, "UPDATE posiciones Set ...='$posActual' where id='$id'");
$row = mysqli_fetch_assoc($sSQL);
print(json_encode($row));
exit(0);
?>