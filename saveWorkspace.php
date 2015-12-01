<?php
session_start();
error_reporting(E_ALL);
$json = $_POST['json'];
$design_name = $_POST['design_name'];
echo $json;

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
$username = 'rz30';
$password = '9klB3Oh7nuMxI';


try {
    $db = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$sqlq = "INSERT INTO designs (user_id, filename, design_name, time_saved) VALUES (:user_id, :filename, :design_name,:time_saved)";

$user_id = $_SESSION['user_id'];
$mysqldate = date('Y/m/d H:i:s');
$filename = md5($_SESSION['email'] . $design_name . $mysqldate);


$getready = $db->prepare($sqlq);
$getready->execute(array(':user_id' => $user_id, ':filename' => $filename, ':design_name' => $design_name, ':time_saved' => $mysqldate));

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