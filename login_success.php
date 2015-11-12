
<?php
	if ($_SESSION['user'] != $login_email) {
		header("location:index.php");
	}
?>
<html>
<body>
</body>
</html>