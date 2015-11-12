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

	var currentBorderColor = "B5B5B5";
	var currentBorderWidth = "1px";

	$('footer').delay(3000).addClass('pulse');

	$('#grid-list').on('click', 'li', function() {
    	console.log($(this).attr('id'));

    	$('#' + $(this).attr('id')).toggleClass('box-selected');

    	if ($('#' + $(this).attr('id')).hasClass('box-selected')) {
	    	$('#' + $(this).attr('id')).css('border-color', '#99CCFF');
	    	$('#' + $(this).attr('id')).css('border-width', "2px");
	    }
	    else {
	    	$('#' + $(this).attr('id')).css('border-width', currentBorderWidth);
	    	$('#' + $(this).attr('id')).css('border-color', currentBorderColor);
	    }
  	})

	//listen for changes to design
	$('#background-color').change(function() {
		console.log($('#background-color').val());
		$('.box-selected').each(function(i, obj) {
		    $(this).css('background-color', $('#background-color').val());
		});
	});
	$('#border-color').change(function() {
		console.log($('#border-color').val());
		$('.box-selected').each(function(i, obj) {
			currentBorderColor = $('#border-color').val();
		    $(this).css('border-color', currentBorderColor);
		});
	});
	$('#border-width').change(function() {
		console.log($('#border-width').val());
		$('.box-selected').each(function(i, obj) {
			currentBorderWidth = $('#border-width').val();
		    $(this).css('border-width', currentBorderWidth);
		});
	});
	$('#font-size').change(function() {
		console.log($('#font-size').val());
		$('.box-selected').each(function(i, obj) {
		    $(this).find('*').each(function() {
		    	$(this).css('font-size', $('#font-size').val());
		    });
		});
	});
	$('#font-family').change(function() {
		console.log($('#font-family').val());
		$('.box-selected').each(function(i, obj) {
		    $(this).find('*').each(function() {
		    	$(this).css('font-family', $('#font-family').val());
		    });
		});
	});
});