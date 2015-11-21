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

$sqlq = "SELECT * FROM users WHERE email=:email";

$login_email = $_POST['login-email']; 
$login_email = mysql_real_escape_string(strip_tags($login_email));
$login_password = $_POST['login-password'];
$login_password = mysql_real_escape_string(strip_tags($login_password));

$getready = $db->prepare($sqlq);
$getready->execute(array(':email' => $login_email));
$result = $getready->fetch();

// count number of rows in result
$rows = count($result);
//echo "\nCount: ";
//echo $rows;

// if there is at least one match
if($rows>=1){
	if(password_verify($login_password,$result["password"])){
	// register $myusername, $mypassword and redirect to file "login_success.php"
		$_SESSION['email'] = $result['email'];
		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['first_name'] = $result['first_name'];
		$_SESSION['last_name'] = $result['last_name'];
		$_SESSION['just_logged_in'] = "yes";
		header("location:workspace.php");
	}
	
}
else {
	echo "Wrong Username or Password";
}
?>
