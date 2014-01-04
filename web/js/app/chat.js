define(['app/config'], function(CONFIG) {
	var Chat = function(onMessage, onSend) {
		this.onMessage = onMessage;
		this.onSend = onSend;
	};

	Chat.prototype.connect = function() {
		var conn = new WebSocket('ws://' + CONFIG.CHAT_SERVER + ':' + CONFIG.CHAT_PORT);
			conn.onopen = function(e) {
				console.log("Connection established!");
			};

			conn.onmessage = function(e) {
				console.log(e.data);
				this.onMessage(e.data);
			};
		this.connection = conn;
	};

	Chat.prototype.send = function(msg) {
		this.connection.send(msg);
	};

	return Chat;
});
