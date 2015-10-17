$('#login-section').hide();
//$('#sign-up-section').hide();

$('#login-button').click(function(event) {
    event.preventDefault();
    $('#sign-up-section').hide();
    $('#login-section').fadeIn();
    $('#login-email').focus();
});

$('#sign-up-button').click(function() {
    event.preventDefault();
    $('#login-section').hide();
    $('#sign-up-section').fadeIn();  
    $('#first-name').focus();
});
