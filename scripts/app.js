$(function() {

	var alreadyMoved = false; // to ensure the welcome container is only moved once

	$('#login-button').click(function() {
		console.log("login click");
	    $('#sign-up-section').hide();
	    $('#login-section').fadeIn();
	    $('#login-email').focus();
	    if (!alreadyMoved) {
	    	$('#welcome-center-container').animate({
			    'marginTop' : "-=12%"
			});
	    }
	    alreadyMoved = true;
	});

	$('#sign-up-button').click(function() {
		console.log("signup click");
	    $('#login-section').hide();
	    $('#sign-up-section').fadeIn();  
	    $('#first-name').focus();
	    if (!alreadyMoved) {
	    	$('#welcome-center-container').animate({
			    'marginTop' : "-=12%"
			});
	    }
	    alreadyMoved = true;
	});


});