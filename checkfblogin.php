<?php
session_start();
$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
$username = 'rz30';
$password = '9klB3Oh7nuMxI';

try {
    $db = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$sqlq = "SELECT * FROM users WHERE email=:email AND first_name=:firstname AND last_name=:lastname";

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$login_email = $_POST['email']; 
$login_email = mysql_real_escape_string(strip_tags($login_email));

$getready = $db->prepare($sqlq);
$getready->execute(array(':email' => $login_email, ':firstname' => $firstname, ':lastname' => $lastname));
$result = $getready->fetch();
var_dump($result);

$rows = count($result);

// if there is at least one match
if($result['email'] == $login_email){
	echo "success";
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['user_id'] = $result['user_id'];
	$_SESSION['first_name'] = $_POST['first_name'];
	$_SESSION['last_name'] = $_POST['last_name'];
	$_SESSION['just_logged_in'] = "yes";
}
else {
	echo "error";
}
?>
