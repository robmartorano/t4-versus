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
        <header>
            <nav>
                <ul id="menu-container">
                    <li class="menu-btn" id="logo"><a href="index.php" class="menu-link" id="nav-home">gylt</a></li>
                    <li class="menu-btn" id="account-menu-btn"><a href="workspace.php" class="menu-link" id="user-nav">workspace</a></li>
                    <li class="menu-btn" id="signout-menu-btn"><a href="logout.php" class="menu-link" id="nav-signout">sign out</a></li>
                </ul>
            </nav>
        </header>

    	<div class="account-module" id="user-profile">
    		<p id="user-name"><h2><?php echo $_SESSION['first_name']; echo " "; echo $_SESSION['last_name']; ?></h2></p>
            <p id="user-email"><h4><?php echo $_SESSION['email']; ?></h4></p>
            <p id="user-workspace"><a href="workspace.php" id="user-nav">return to my workspace</a></p>
    	</div><!-- end user-profile -->

		<div class="account-module" id="user-designs">
    		<h2>designs</h2>
    		<div>
    			<?php require_once("load_designs_list.php"); ?>
    		</div>
    	</div><!--end designs-->

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

        <script src="scripts/app.js"></script>
    </body>
</html>