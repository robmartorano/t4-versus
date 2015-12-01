<?php
session_start();
error_reporting(E_ALL);

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
$username = 'rz30';
$password = '9klB3Oh7nuMxI';
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$user_id = $_SESSION['user_id'];
if (!isset ($_SESSION["email"])) {
	echo "<p>You have failed to login.</p>";
	//header("location:index.php");
	exit;
}

$sqlq = "SELECT design_name FROM designs WHERE user_id=:user_id";
$getready = $db->prepare($sqlq);
$getready->execute(array(':user_id' => $user_id));
$result = $getready->fetchAll();
$rows = count($result);
if($rows == 0) {
	echo "<p>You have no designs. Close this tab to start designing a calendar!</p>";
}
else {
	foreach ($result as &$value) {
		echo "<li class='user-design-list-item'>" . $value . "</li>";
	}
}
?>