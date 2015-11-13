<?php
session_start();
error_reporting(E_ALL);
$json = $_POST['json'];
echo $json;

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
$username = 'rz30';
$password = '9klB3Oh7nuMxI';


try {
    $db = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
$sqlq = "INSERT INTO designs (user_id, filename) VALUES (:user_id, :filename)";

$user_id = $_SESSION['user_id'];
$filename = md5($_SESSION['email'] . date_default_timezone_get());

$getready = $db->prepare($sqlq);
$getready->execute(array(':user_id' => $user_id, ':filename' => $filename));

if (json_decode($json) != null) {
	$file = fopen("./user_designs/". $filename . ".json", "wb");
	fwrite($file, $json);
	fclose($file);
	echo "wrote the file";
}
else {
	echo "failed to save file";
}
?>