<?php
ini_set('display_errors', 1);

require '/home/xia/vendor/autoload.php';
use uabc\ai\Game;

$game = Game::getInstance();

$predatorId = $_REQUEST['id'];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$position = $_POST['pos'];
	$mov = $_POST['mov'];

	if ( !$game->isPreySurrounded() ) {
		$game->movePlayer($predatorId, $position, $mov);
		if ( $game->isPreyTurn() && !$game->isPreySurrounded() ) {
			$game->movePrey();
		}
	} else {
		$game->finish();
	}
}

$result = $predatorId == 0 ? $game->getPlayers() : $game->getPlayer($predatorId);

print(json_encode($result));
exit(0);
?>	