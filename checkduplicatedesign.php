<?php
session_start();
error_reporting(E_ALL);
$wanted_name = $_POST['wanted_name'];

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
$username = 'rz30';
$password = '9klB3Oh7nuMxI';


try {
    $db = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$sqlq = "SELECT * FROM designs WHERE design_name=:wanted_name";

$getready = $db->prepare($sqlq);
$getready->execute(array(':wanted_name' => $wanted_name));

$result = $getready->fetch();
$rows = count($result);

if($rows == 0) {
	echo "does not exist";
}
else {
	echo "already exists";
}
?>