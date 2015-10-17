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
$sqlq = "SELECT users (username,password,email) VALUES (:username,:password,:email)";
// $sql = "UPDATE Test SET stuff=:stuff WHERE id=:id";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST["email"];
$getready = $db->prepare($sqlq);
$getready->execute(array(':username' => $username, ':password' => $password, ':email' => $email));
if ($getready)
// Register $myusername, $mypassword and redirect to file loginsucces
session_register("username");
session_register("password"); 
echo "You have successfully logged in. <a href='workspace.php'>Click here to start being productive.</a>"; 
}
else {
echo "Wrong Username or Password";
}
?>