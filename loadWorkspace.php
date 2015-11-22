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
$sqlq = "SELECT filename FROM designs WHERE user_id=:user_id AND design_name=:design_name";

$user_id = $_SESSION['user_id'];
$design_name = "designone";

$getready = $db->prepare($sqlq);
$getready->execute(array(':user_id' => $user_id, ':design_name' => $design_name));
$result = $getready->fetch();
$num_rows = count($result);

if ($num_rows > 0) {
	//$file = file_get_contents("./user_designs/". $result['filename'] . ".json");
	$file = file_get_contents("./user_designs/da0e2875e80c1bc27e5143cbfa92f726.json");
	if ($file == FALSE) {
		echo "failed to find file"; 
	}
	else {
		echo $file; 
	}
}
else {
	echo "failed to find design in database";
}
?>