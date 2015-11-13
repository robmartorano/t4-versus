$(function() {

	$('#print-button').click(function() {
		console.log("print click");
		window.print();
	    
	});

	$('#preview-button').click(function(){
		console.log("preview click");
		el = document.getElementById("overlay");
    	el.style.visibility = "visible";
	})

	$('#preview-exit').click(function(){
		el.style.visibility = "hidden";
	})

});
