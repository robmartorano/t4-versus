<?php require_once("login_success.php"); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>gylt</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.gridster/0.5.6/jquery.gridster.min.css">
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/account.css"/>
    </head>

    <body>
    	<div class="account-module" id="user-profile">
    		<img src="images/placeholder-user.png" id="user-image"/>
    		<div id="user-info"> 
    			<p><h2><?php echo $_SESSION['first_name']; echo " "; echo $_SESSION['last_name']; ?></h2></p>
                <p><h4><?php echo $_SESSION['email']; ?></h4></p>
                <input type="checkbox" id="emails-checkbox" name="emails-checkbox"><label for="emails-checkbox"> receive emails from the gylt team</label>
                <p><a href="workspace.php" id="user-nav">return to my workspace</a></p>
    		</div>
    	</div><!-- end user-profile -->

		<div class="account-module" id="user-designs">
    		<h2>designs (3)</h2>
    		<div>
    			<img src="images/placeholder-design.svg"/>
    			<img src="images/placeholder-design.svg"/>
    			<img src="images/placeholder-design.svg"/>
    		</div>
    	</div><!--end designs-->

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

        <script src="scripts/app.js"></script>
    </body>
</html>