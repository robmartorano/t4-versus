<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>gylt</title>
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/welcome.css"/>
    </head>

    <body id="welcome">
      <div id="fb-root"></div>
      <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
          console.log('statusChangeCallback');
          console.log(response);
          // The response object is returned with a status field that lets the
          // app know the current login status of the person.
          // Full docs on the response object can be found in the documentation
          // for FB.getLoginStatus().
          if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
          } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
              'into this app.';
          } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            document.getElementById('status').innerHTML = 'Please log ' +
              'into Facebook.';
          }
        }

        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
          FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
          });
        }

        window.fbAsyncInit = function() {
        FB.init({
          appId      : '{your-app-id}',
          cookie     : true,  // enable cookies to allow the server to access 
                              // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.2' // use version 2.2
        });

        // Now that we've initialized the JavaScript SDK, we call 
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
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

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
              'Thanks for logging in, ' + response.name + '!';
          });
        }
      </script>




        <div class="video-container">
            <div class="filter"></div>
            <video autoplay loop poster="images/working-it/Snapshots/Working-it.jpg" class="fullscreen-video">
                <source src="images/working-it/Mp4/Working-it.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
                <source src="images/working-it/Webm/Working-it.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
            </video>
        </div><!-- end video-container-->

        <div id="welcome-center-container">
            <h1>gylt</h1>
            <h4>get your life together</h4>
            <button class="bold-button" id="sign-up-button">sign up</button>
            <button class="bold-button" id="login-button">login</button>
            <form action="signup.php" method="post"  class="login-signup" id="sign-up-section">
                <img src="images/facebook.png" class="facebook"/>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                </fb:login-button>

                <?php 
                  if(isset($msg)){  // Check if $msg is not empty
                  echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                  } 
                ?>
                <div id="status"></div>
                <input placeholder="first name" name="first-name" id="first-name" autofocus required>
                <input placeholder="last name" name="last-name" id="last-name" required>
                <input placeholder="email address" name="sign-up-email" id="sign-up-email" required>
                <input type="password" placeholder="password" name="sign-up-password" id="sign-up-password" required>
                <button class="bold-button" id="sign-up-go" type="submit">register</button>
            </form>
                
            <form action="checklogin.php" method="post" class="login-signup" id="login-section">
                <img src="images/facebook.png" class="facebook"/>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                </fb:login-button>
                <div id="status"></div>
                <input placeholder="email address" name="login-email" id="login-email" required>
                <input type="password" placeholder="password" name="login-password" id="login-password" required>
                <button class="bold-button" id="login-go" type="submit">login</button>
            </form>

        </div><!--end welcome-center-container-->
        <footer>
            <a href="" id="about-link">what is <span>gylt</span>?</a>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>

        <script src="scripts/app.js"></script>

    </body>
</html>