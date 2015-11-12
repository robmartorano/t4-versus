<?php
	session_start();
	if (!isset ($_SESSION["email"])) {
		header("location:index.php");
	}
?>
<html>
<body>
</body>
</html>