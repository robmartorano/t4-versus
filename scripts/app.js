$(function() {

	var alreadyMoved = false; // to ensure the welcome container is only moved once

	$('#login-button').click(function() {
		console.log("login click");
	    $('#sign-up-section').hide();
	    $('#sign-up-button').removeClass('bold-button-active');
	    $('#login-button').addClass('bold-button-active');
	    $('#login-section').fadeIn();
	    $('#login-section').css("display", "block");
	    $('#sign-up-section').hide();
	    $('#login-email').focus();
	    if (!alreadyMoved) {
	    	$('#welcome-center-container').animate({
			    'marginTop' : "-=12%",
			});
	    }
	    alreadyMoved = true;
	});

	$('#sign-up-button').click(function() {
		console.log("signup click");
	    $('#login-section').hide();
	    $('#login-button').removeClass('bold-button-active');
	    $('#sign-up-button').addClass('bold-button-active');
	    $('#sign-up-section').fadeIn(); 
	    $('#sign-up-section').css("display", "block"); 
	    $('#first-name').focus();
	    if (!alreadyMoved) {
	    	$('#welcome-center-container').animate({
			    'marginTop' : "-=12%",
			});
	    }
	    alreadyMoved = true;
	});

	$('footer').delay(3000).addClass('pulse');
});