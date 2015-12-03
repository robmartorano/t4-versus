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

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];

$sqlq = "INSERT INTO users (email, first_name, last_name) VALUES (:email, :firstname, :lastname)";

$getready = $db->prepare($sqlq);
$getready->execute(array(':email' => $email, ':firstname' => $firstname, ':lastname' => $lastname));

$msg = 'You have successfully signed up. Please verify by clicking the activation link that has been sent to your email.';

$_SESSION['email'] = $email;
$_SESSION['first_name'] = $firstname;
$_SESSION['last_name'] = $lastname;
$_SESSION['user_id'] = $db->lastInsertId();
$_SESSION['just_logged_in'] = "yes"; 
?>



