requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'js',
    //except, if the module ID starts with "app",
    //load it from the js/app directory. paths
    //config is relative to the baseUrl, and
    //never includes a ".js" extension since
    //the paths config could be for a directory.
    paths: {
        jquery: 'lib/jquery-2.0.3.min',
		bs: 'lib/bootstrap.min'
    }
});

// Start the main app logic.
requirejs(['jquery', 'bs', 'app/views/agent', 'app/chat'], 
function ($, bs, View, Chat) {
	$(document).ready(function(){
		console.log('DOM Ready');
		// Connect to server and poll state
		// If a game session exists load it.
		// .. .. 
		// end state restoration
		var view = new View({size: 10}, {id: 0, location: 21}), chat;
		view.render();
		
		// Initilize the Chat
		chat = new Chat(function(msg){
			var $text = $('textarea');
			$text.val($text.val() + '\n' + msg);
		}, function() {});

		chat.connect();

		// Attach DOM events
		$('.chat button').click(function() {
			
			var $text = $('.chat textarea'), 
				msg = $text.val();
			chat.send(msg);
			$text.val('');
		});
	});
});
