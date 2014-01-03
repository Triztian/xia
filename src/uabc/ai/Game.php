<?php
namespace uabc\ai;

class Game 
{

	private $predators = array();
	private $agent;
	private $turn = 0;

	public function __construct($boardSize=10) {
		
	}

	private function isTileAvailable($tile) {

	}

	public function movePlayer($id, $toTile) {

	}

	private function getOpenTiles($tile) {
		if ( $tile == 0 )
			return array(1, );

		if ( $tile > 0 && $tile < 10 )
			return array();

		if ( $tile == 100 ) 
			return array();
	}
}