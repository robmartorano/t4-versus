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
$design_name = $_POST['design_name'];

$getready = $db->prepare($sqlq);
$getready->execute(array(':user_id' => $user_id, ':design_name' => $design_name));
$result = $getready->fetch();
$num_rows = count($result);

if ($num_rows > 0) {
	//da0e2875e80c1bc27e5143cbfa92f726
	$filename = "./user_designs/" . $result['filename'] . ".json";

	if (file_exists($filename)) {
		//echo "yes, file exists\n";
		$file_contents = file_get_contents($filename);
		//$json_contents = json_decode($file_contents);
		echo $file_contents;
	}
	else {
		echo "Error: the design file does not exist on our server";
	}
}
else {
	echo "Error: failed to find design in database";
}
?>