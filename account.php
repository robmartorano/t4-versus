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
    			<ul>
    				<li><h2><?php echo $_SESSION['first_name']; echo " "; echo $_SESSION['last_name']; ?></h2></li>
    				<li><strong>profile created:</strong> November 1st, 2015</li>
    				<li><strong>number of designs:</strong> 3</li>
    				<li><strong>about me:</strong> I like to design calendars.</li>
    				<li><strong>personal website:</strong> https://www.google.com/</li>
    			</ul>
    		</div>
    	</div><!-- end user-profile -->

		<div class="account-module" id="user-designs">
    		<h2>designs</h2>
    		<div>
    			<img src="images/placeholder-design.svg"/>
    			<img src="images/placeholder-design.svg"/>
    			<img src="images/placeholder-design.svg"/>
    		</div>
    	</div><!--end designs-->

    	<div class="account-module" id="user-settings">
    		<h2>settings</h2>
    		<input type="checkbox" id="emails-checkbox" name="emails-checkbox"><label for="emails-checkbox"> receive emails from the gylt team</label>
    	</div><!-- end user-settings -->

    	<div class="account-module" id="navigation">
    		<h2>navigate</h2>
    		<a href="workspace.php">return to my workspace</a>
    	</div><!--end nav-->

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

        <script src="scripts/app.js"></script>
    </body>
</html>