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
requirejs(['jquery', 'bs', 'views/agent'], function ($, bs, View) {
	$(document).ready(function(){
		// Connect to server and poll state
		// If a game session exists load it.
		// .. .. 
		// end state restoration
		var view = new View({}, 0);
		view.render();
		console.log('Dom Ready');
	});
});
