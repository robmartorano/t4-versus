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
$sqlq = "INSERT INTO users (email, first_name, last_name, password) VALUES (:email, :firstname, :lastname, :password)";

$email = $_POST['sign-up-email'];
$firstname = $_POST['first-name'];
$lastname = $_POST['last-name'];
$password = $_POST['sign-up-password'];

$getready = $db->prepare($sqlq);
$getready->execute(array(':email' => $email, ':firstname' => $firstname, ':lastname' => $lastname, ':password' => $password));
echo "Entered data successfully\n";
?>