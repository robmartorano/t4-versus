<!DOCTYPE html>
<?php require_once("login.php");	?>
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
                <h4>get your life together.</h4>
                <button class="bold-button" id="sign-up-button">sign up</button>
                <button class="bold-button" id="login-button">login</button>
                <form action="signup.php" method="post"  class="login-signup" id="sign-up-section">
                    <input placeholder="first name" id="first-name" autofocus required>
                    <input placeholder="last name" id = "last-name" required>
                    <input placeholder="email address" id="sign-up-email" required>
                    <input type="password" placeholder="password" id="sign-up-password" required>
                    <a href="workspace.html"><button class="bold-button" id="sign-up-go" type="submit">go</button></a>
                </form>
                    
                <form action="login.php" method="post" class="login-signup" id="login-section">
                    <input placeholder="email address" id="login-email" required>
                    <input type="password" placeholder="password" id="login-password" required>
                    <a href="workspace.html"><button class="bold-button" id="login-go" type="submit">go</button></a>
                </form>

            </div><!--end welcome-center-container-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>

        <script src="scripts/app.js"></script>

    </body>
</html>