<?php
/**
 * Class that contains the games logic, which is updating the predator's position, 
 * moving the prey and determining if the prey is surrounded or not.
 * 
 * @author Tristian Azuara {tristian.lopez@uabc.edu.mx}
 * @license MIT / BSD
 */
namespace uabc\ai;

use \PDO;

class Game 
{
	// The available movements.
	private static $MOVEMENTS = array('u', 'd', 'l', 'r', 'p');
	const PREY_ID = 5;

	// The database connection.
	private $db;
	public $id;

	public function __construct($id) {
		$this->db = self::getConnection();
		$this->id = $id;
	}

	/**
	 * Finishes the game by clearing the game's id from the players.
	 */
	public function finish() {
		$this->db->exec('UPDATE posiciones SET partida = NULL, posicion = NULL, estado = 0');
	}

	/**
	 * Determine if the prey is surrounded by the predators. If it is it would indicate that 
	 * the game is over.
	 */
	public function isPreySurrounded() {
		$prey = $this->getPlayerPosition(self::PREY_ID);
		$preyAdjacent = $this->getAdjacent($prey);
		unset($preyAdjacent['p']);

		$predators = $this->getPredatorPositions();

		foreach ( $preyAdjacent as $t ) {
			if ( !in_array($t, $predators) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Determines if it is the Prey's turn to move. It is the prey's turn if all four 
	 * predators have made their move.
	 */
	public function isPreyTurn() {
		$moves = $this->db->query('SELECT D1, D2, D3, D4 FROM tablafinal WHERE ID = (SELECT MAX(ID) FROM tablafinal LIMIT 1)')->fetch();
		for( $d = 1; $d < 5; $d++ ) {
			$move = $moves['D' . $d];
			if ( !in_array($move, self::$MOVEMENTS) )
				return false;
		}
			
		return true;
	}

	/**
	 * Moves the pray randomly between the available adjecent positions.
	 */
	public function movePrey() {
		$adjacent = $this->getAdjacent($this->getPlayerPosition(self::PREY_ID));

		$open = array();
		foreach($adjacent as $m => $p)
			if ( !$this->isPositionTaken($p) )
				$open[] = $m;

		$i = rand(0, count($open) - 1);
		$mov = $open[$i]; 
		$pos = $adjacent[$mov];

		$this->movePlayer(self::PREY_ID, $pos, $mov);
	}

	/**
	 * Moves a player.
	 */
	public function movePlayer($id, $position, $mov) {
		if ( !in_array($mov, self::$MOVEMENTS) ) {
			return;
		}

		if ( $this->isPositionTaken($position) ) {
			$mov = 'p';
			$position = $this->getPlayerPosition($id);
		}

		$this->db->beginTransaction();
		$sql = array(
			"UPDATE posiciones SET posicion = '$position' WHERE id = $id LIMIT 1"
		);
		if ( $id !== 5 ) {
			$this->db->exec("UPDATE tablafinal as tf, (SELECT MAX(ID) as ID FROM tablafinal) as t 
							SET D$id = '$mov' WHERE tf.ID = t.ID");
		}
		foreach($sql as $q) {
			$res = $this->db->exec($q);
		}

		$this->db->commit();
	}

	/**
	 * Add a player to the game.
	 */
	public function addPlayer($id) {
		$this->db->beginTransaction();
		$res = $this->db->query('SELECT DISTINCT posicion FROM posiciones');
		$player = $this->getPlayer($id);
		$positions = array();
		foreach($res as $r) {
			$positions[] = (int)$r['posicion'];
		}

		$pos = null;
		if ( $player['posicion'] === null ) {
			while ( in_array(($pos = rand(0, 99)), $positions) );
		} else {
			$pos = $player['posicion'];	
		}

		$sql = "UPDATE posiciones SET estado = 1, partida = $this->id, posicion = $pos WHERE id = $id LIMIT 1";
		$affected = $this->db->exec($sql);
		$this->db->commit();
	}

	/**
	 * Obtain the status of a player.
	 */
	public function getPlayer($id) {
		$res = $this->db->query("SELECT *,IF(id = 5, 'presa', 'depredador') as tipo FROM posiciones WHERE id = $id LIMIT 1");
		$player = $res->fetch(PDO::FETCH_ASSOC);

		$player['id'] = (int)$player['id'];
		$player['partida'] = $player['partida'] !== null ? (int)$player['partida'] : null;
		$player['estado'] = (bool)$player['estado'];
		$player['posicion'] = $player['posicion'] !== null ? (int)$player['posicion'] : null; 
		$player['preySurrounded'] = $this->isPreySurrounded();
		$player['enableChat'] = $this->isPreyTurn();

		return $player;
	}

	/**
	 * Obtain the status of all the players.
	 */
	public function getPlayers() {
		$players = array();
		for ( $p=1; $p < 6; $p++) {
			$players[] = $this->getPlayer($p);
		}

		return $players;
	}

	/**
	 * Determine if the position is taken or not.
	 *
	 * @param {int} position The position to be tested.
 	 *
	 * @return true if the position is taken, false otherwise.
	 */
	public function isPositionTaken($position) {
		$pos = $this->db->query('SELECT * FROM posiciones');
		foreach( $pos as $p )
			if ( (int)$p['posicion'] === $position ) 
				return true;

		return false;
	}

	/**
	 * Obtain the position of the given player.
	 * @param {int} playerId The id (1 to 5) of the player.
	 */
	public function getPlayerPosition($playerId) { 
		$position = $this->db->query("SELECT posicion FROM posiciones WHERE ID = $playerId LIMIT 1")->fetch();
		return (int)$position['posicion'];
	}

	/**
	 * Obtain an array that contains the adjacent positions to a given one.
	 */
	public function getAdjacent($position, $openOnly=true) {
		$adj = array(
			'r' => $position + 1, 
			'l' => $position - 1, 
			'd' => $position + 10, 
			'u' => $position - 10,
			'p' => $position
		);

		if ( !$openOnly ) 
			return $adj;

		if ( $position == 0 ) {
			unset($adj['u']);
			unset($adj['l']);
		}

		if ( $position == 99 ) {
			unset($adj['d']);
			unset($adj['r']);
		}

		if ( $position % 10 == 1 ) {
			unset($adj['l']);
		}

		if ( $position % 10 == 9 ) {
			unset($adj['r']);
		}

		if ( $position < 10 ) {
			unset($adj['u']);
		}

		if ( $position > 89 ) {
			unset($adj['u']);
		}

		return $adj;
	}

	/**
	 * Obtain the positions of the predators.
	 *
	 * @return {Array} An array that contains the positions of the predators the index 0 
	 * 					corresponds to the player 1.
	 */
	public function getPredatorPositions() {
		$positions = array();
		for( $p =1 ;$p < 5; $p++ ) {
			$positions[] = $this->getPlayerPosition($p);
		}
		
		return $positions;
	}

	/**
	 * Obtains the current instance of the game.
	 */
	public static function getInstance() {
		$db = self::getConnection();
		$gameId = null;
		$game = $db->query('SELECT DISTINCT partida FROM posiciones WHERE partida IS NOT NULL LIMIT 1');

		if ( $game->rowCount() > 0 ) {
			$gameId = $game->fetch()['partida'];
		} else {
			$game = $db->query('SELECT MAX(partida) as p FROM tablafinal');
			if ( $game->rowCount() < 1 ) {
				$gameId = 0;
			} else {
				$gameId = (int)$game->fetch()['p'] + 1;
			}
	
			print_r("Game Id: $gameId");
		}

		return new Game($gameId);
	}

	private static function getConnection() {
		return new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456', array(
			PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		));
	}
}