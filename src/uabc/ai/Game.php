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

	public function __construct() {
		$this->db = new PDO('mysql:host=localhost;dbname=xia', 'xia', '123456');
	}

	/**
	 * Determine if the prey is surrounded by the predators. If it is it would indicate that 
	 * the game is over.
	 */
	public function isPreySurrounded() {
		$prey = $this->getPlayerPosition(self::PREY_ID);
		$preyAdjacent = $this->getAdjacent($prey);
		unset($preyAdjacent['p']);

		return count((array_diff($predators, array_values($preyAdjacent)))) == 0;
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

		$mov = $open[(int)(rand() * count($open))]; 
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
			"UPDATE tablafinal as tf, (SELECT MAX(ID) as ID FROM tablafinal) as t 
							SET D$id = '$mov' WHERE tf.ID = t.ID",
			"UPDATE posiciones SET posicion = '$position' WHERE id = $id LIMIT 1"
		);

		foreach($sql as $q) {
			$res = $this->db->exec($q);
		}

		$this->db->commit();
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
	public function getAdjecent($position) {
		return array(
			'r' => $position + 1, 
			'l' => $position - 1, 
			'u' => $position + 10, 
			'd' => $position - 10,
			'p' => $position
		);
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
}