<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>gylt</title>
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/welcome.css"/>
    </head>

    <body id="welcome">
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
                <fb:login-button scope="public_profile,email" size="xlarge" onlogin="checkSignupState();">
                </fb:login-button>
                <div class="fb-status-message" id="signup-status"></div>
                <input placeholder="first name" name="first-name" id="first-name" autofocus required>
                <input placeholder="last name" name="last-name" id="last-name" required>
                <input placeholder="email address" name="sign-up-email" id="sign-up-email" required>
                <input type="password" placeholder="password" name="sign-up-password" id="sign-up-password" required>
                <button class="bold-button" id="sign-up-go" type="submit">register</button>
            </form>
                
            <form action="checklogin.php" method="post" class="login-signup" id="login-section">
                <fb:login-button scope="public_profile,email" size="xlarge" onlogin="checkLoginState();">
                </fb:login-button>
                <div class="fb-status-message" id="login-status"></div>
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
        <script src="scripts/fblogin.js"></script>

    </body>
</html>