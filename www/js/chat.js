$(document).ready(function() {
	var chatView = new ChatView('#chat');
	chatView.$('button').click(function() {
		chatView.send();
		chatView.disable();
	});
		
	setInterval(aja,500);
	i=4;	
	function aja(){
		$.ajax({
			type: "GET",
			url: "posiciones.php",
			data: {id:i},
			dataType: "JSON",
			success: function(tur, mensaje) {	
				console.log(tur, mensaje);
				if(tur.enableChat){
					chatView.enable();
				}
			}
		});
	}
});