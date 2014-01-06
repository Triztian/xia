$(document).ready(function() {
	var chatView = new ChatView('#chat');
	chatView.$('button').click(function() {
		chatView.send();
	});

	chatView.$('input[type="checkbox"]').click(function() {
		if (this.checked)
			chatView.enable();
		else	
			chatView.disable();
	});
})
