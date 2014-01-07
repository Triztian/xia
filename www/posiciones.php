<?php
ini_set('display_errors', 1);

require '/home/xia/vendor/autoload.php';
use uabc\ai\Game;

$game = new Game();
$mysqli = mysqli_connect("localhost", "xia", "123456", "xia");

$predatorId = $_REQUEST['id'];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$position = $_POST['pos'];
	$mov = $_POST['mov'];

	$game->movePlayer($predatorId, $position, $mov);
	if ( $game->isPreyTurn() && !$game->isPreySurrounded() ) {
		$game->movePrey();
	}
}

$result = null;
if ( $predatorId == 0 ) {
	$result = array();
	$res = mysqli_query($mysqli, "SELECT *, IF(id = 5, 'presa', 'depredador') as tipo FROM posiciones");
	$row = null;
	while ( $row = mysqli_fetch_assoc($res) ) {
		$row['enableChat'] = $game->isPreyTurn();
		$row['preySurrounded'] = $game->isPreySurrounded();
		$result[] = $row;
	}
} else { 
	$res = mysqli_query($mysqli, "SELECT *,IF(id = 5, 'presa', 'depredador') as tipo  FROM posiciones where id = " . $predatorId);
	$row = mysqli_fetch_assoc($res);
	$row['enableChat'] = $game->isPreyTurn();
	$row['preySurrounded'] = $game->isPreySurrounded();
	$result = $row;
}

print(json_encode($result));
exit(0);
?>	