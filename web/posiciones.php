<?php
		$mysqli = mysqli_connect("localhost", "xia", "123456", "xia");
		$res = mysqli_query($mysqli, "SELECT * FROM posiciones where id=".$_GET["id"]);
		$row = mysqli_fetch_assoc($res);
		echo json_encode($row);
	?>	