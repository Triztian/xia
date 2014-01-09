<?php
ini_set('display_errors', 1);
require '/home/xia/vendor/autoload.php';
use \PDO;
use uabc\ai\Game;

$game = Game::getInstance();
$game->finish();

header('Location: index.php');
?>
