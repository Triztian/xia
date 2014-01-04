// Start the main app logic.
define(['jquery'], function ($) {
	var View = function(game, player) {
		this.game = game;
		this.player = player;
	};

	View.prototype.getLocation = function(i, j) {
		return i * this.game.size + j;
	};

	View.prototype.hasPlayer = function(i, j) {
		// Check if the linearize position is used.
		if (j === undefined || j === null)
			return this.player.location === i;

		return this.player.location === this.getLocation(i, j);
	};

	View.prototype.render = function() {
		console.log(this.game, this.player);
		var $table = $('table'), html = '';
		for (var i = 0; i < this.game.size; i++ ) {
			html += '<tr>';
			for (var j = 0; j < this.game.size; j++) {
				html += '<td>' + (this.hasPlayer(i, j) ? 'X' : '') + '</td>';
			}
			html += '</tr>';
		}
		console.log('Rendering', html);
		$table.html(html);
	};

	return View;
});
