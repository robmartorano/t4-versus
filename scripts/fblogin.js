window.fbAsyncInit = function() {
	FB.init({
		appId      : '954562151284148',
		cookie     : true,  // enable cookies to allow the server to access 
							// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.2
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(todo, response) {
	console.log('statusChangeCallback');
	console.log(response);
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().
	if (response.status === 'connected' && todo === "login") {
		// Logged into your app and Facebook.
		fbLogin();
	} else if (response.status === 'connected' && todo === "signup") {
		fbSignup();
	} else if (response.status === 'not_authorized') {
		// The person is logged into Facebook, but not your app.
		$('#login-status').text('Please log into this app.');
	} else {
		// The person is not logged into Facebook, so we're not sure if
		// they are logged into this app or not.
		$('#login-status').text('Please log into Facebook.');
	}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback("login", response);
	});
}

function checkSignupState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback("signup", response);
	});
}
	
// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function fbLogin() {
	console.log('Welcome!  Fetching your information.... ');
	
	FB.api('/me?fields=id,name,first_name,last_name,email', function(response) {
		console.log("Thanks for logging in " + response.name);
		$.ajax({
			type : "POST",
			url : "checkfblogin.php",
			data : {
				"first_name": response.first_name,
				"last_name": response.last_name,
				"email": response.email
			},
			success: function(data) {
				console.log(data);
				if (data.indexOf("success") > -1) {
					window.location.replace("https://users.cs.duke.edu/~rz30/t4-versus/workspace.php");
				}
				else {
					$('#login-status').text("Please signup for an account first!");
				}
			}
		});
	});
}

function fbSignup() {
	console.log('Welcome!  Fetching your information to sign up.... ');
	
	FB.api('/me?fields=id,name,first_name,last_name,email', function(response) {
		$('#signup-status').text("Thanks for signing up " + response.first_name);
		console.log("Thanks for signing up " + response.name);
		$.ajax({
			type : "POST",
			url : "fbsignup.php",
			data : {
				"first_name": response.first_name,
				"last_name": response.last_name,
				"email": response.email
			},
			success: function(data) {
				window.location.replace("https://users.cs.duke.edu/~rz30/t4-versus/workspace.php");
			}
		});
		
	});
}