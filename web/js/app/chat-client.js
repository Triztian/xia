var Chat = (function() {

	var Chat = function(onConnect, onMessage, onError, onClose) {
		this.onConnect = onConnect;
		this.onMessage = onMessage;
		this.onError = onError;
		this.onClose = onClose;
		this.messagesSent = [];
		this.messagesReceived = [];
	};


	/**
	 * Connect star the chat server and assign callbacks.
	 */
	Chat.prototype.connect = function() {
		var conn = new WebSocket('ws://' + CONFIG.CHAT_SERVER + ':' + CONFIG.CHAT_PORT), 
			that = this;

		conn.onopen = function(e) {
			console.log("Connection established!", e);
			if ( that.onConnect )
				that.onConnect(e);
		};

		conn.onmessage = function(e) {
			if ( !that.isCommand(e.data) )
				that.messagesReceived.push({id: that.messagesSent.length++, date: new Date(), body: e.data});

			if ( that.onMessage ) 
				that.onMessage(e.data);
		};

		conn.onerror = function(e) {
			if ( that.onError )
				that.onError(e);
		};
		
		conn.onclose = function(e) {
			if (that.onClose )
				that.onClose(e);
		};

		this.connection = conn;

	};

	Chat.prototype.isCommand = function(msg) {
		var commandRegexes = [
			/^NEW-CLIENT:\s*(\d+)$/,
			/^CLIENT-TYPE:\s*(\w+)$/
		];

		for ( var c in commandRegexes ) 
			if ( msg.match(commandRegexes[c]) )
				return true;
		return false;
	};
	
	Chat.prototype.parseMessage = function(msg) {
		if ( !this.isCommand(msg) ) 
			return undefined;
		
		var m;
		if ( m = msg.match(this.CLIENT_TYPE_COMMAND) ) {
			return {type: m[1]};
		}

		if ( m = msg.match(this.NEW_CLIENT_COMMAND) ) {
			return {id: m[1]};
		}
	};

	/**
	 * Send a message to the chat server
	 */
	Chat.prototype.send = function(msg) {
		this.connection.send(msg);
	};

	Chat.prototype.NEW_CLIENT_COMMAND = /^NEW-CLIENT:\s*(\d+)$/;
	Chat.prototype.CLIENT_TYPE_COMMAND = /^CLIENT-TYPE:\s*(\w+)$/;

	return Chat;
})();

var ChatView = (function(){
	var MESSAGE_HTML = '<dt class="message-{{id}}">{{date}}</dt><dd class="message-body-{{id}}">{{body}}</dd>';

	function template(str, obj) {
		var s = str;
		for ( var p in obj )
			if ( obj.hasOwnProperty(p) )
				s = s.replace(new RegExp('{{' + p + '}}', 'g'), obj[p]);
		return s;	
	}

	function formatDate(date) {
		var months = [
			'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Nov', 'Dec'
		];
	
		return months[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear() +
			' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
	}

	var view = function(selector, clientType) {
		var that = this;
		this.$el = $(selector);
		this.clientType = clientType;

		this.chat = new Chat(
			// On Connect
			function(e) {
				that.$('.glyphicon').removeClass('text-muted').addClass('text-success');
				this.send('CLIENT-TYPE: ' + that.clientType);
			}, 
			// On Message
			function(e) {
				console.log('Message Received');
				that.render();
			}, 
			// On Error
			function(e) {
				console.log('Chat Error', e);
			},
			// On Close
			function(e) {
				console.log('Closing Chat', e);
			});

		this.chat.connect();
	};

	view.prototype.$ = function(sel) {
		return $(sel, this.$el);
	};

	/**
	 * Render the chat's received messages history.
	 */
	view.prototype.render = function() {
		var $messages = this.$('.messages'), msg;
		$messages.html('');
		for ( var i in this.chat.messagesReceived ) {
			var obj = $.extend(true, {}, this.chat.messagesReceived[i])
			obj.date = formatDate(obj.date);
			$messages.append(this.$(template(MESSAGE_HTML, obj)));
			$messages.scrollTop($messages[0].scrollHeight);
		}
	};

	view.prototype.disable = function() {
		this.$('textarea').prop('disabled', true);
		this.$('button').prop('disabled', true);
	};

	view.prototype.enable = function() {
		this.$('textarea').prop('disabled', false);
		this.$('button').prop('disabled', false);
	};

	view.prototype.send = function() {
		var $text = this.$('textarea');
		this.chat.send($text.val());
		$text.val('');
	};

	return view;
})();
