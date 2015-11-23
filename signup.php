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

$email = $_POST['sign-up-email'];
$email = mysql_real_escape_string(strip_tags($email));
$firstname = $_POST['first-name'];
$firstname = mysql_real_escape_string(strip_tags($firstname));
$lastname = $_POST['last-name'];
$lastname = mysql_real_escape_string(strip_tags($lastname));
$password = $_POST['sign-up-password'];
$password = mysql_real_escape_string(strip_tags($password));
$password = password_hash($password, PASSWORD_DEFAULT);

#checking for empty fields
 if (empty($email) || empty($firstname) || empty($lastname) || empty($password)) {
    echo "Please fill out every form!";
 }

elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {

	$duplicheck = "SELECT * FROM users WHERE email=:email";
	$resource = mysql_query($duplicheck);
	#$array = $resource->fetch_array(MYSQLI_ASSOC);#
	$numrows = mysqli_num_rows($resource);
	if ($numrows == 0) {

		$sqlq = "INSERT INTO users (email, first_name, last_name, password) VALUES (:email, :firstname, :lastname, :password)";


		$getready = $db->prepare($sqlq);
		$getready->execute(array(':email' => $email, ':firstname' => $firstname, ':lastname' => $lastname, ':password' => $password));

		echo "You have successfully signed up. An email was sent to ";
		echo $email;
		echo ". Welcome to gylt! <a href='workspace.php'>Start designing here</a>";


		$_SESSION['email'] = $email;
		$_SESSION['first_name'] = $firstname;
		$_SESSION['last_name'] = $lastname;
		$_SESSION['user_id'] = $db->lastInsertId();
		$_SESSION['just_logged_in'] = "yes"; 

		header('Location: workspace.php');
	}
	else {
		echo "Email has already been registered.";
	}
}

else {
	echo "Invalid email format. Please try again."; 

}
?>



