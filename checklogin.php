<?php

$host="cgi.cs.duke.edu"; // Host name 
$username="rz30"; // Mysql username 
$password="9klB3Oh7nuMxI"; // Mysql password 
$db_name="rz30"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

echo "Successfully connected to database";

// username and password sent from form 
$myusername=$_POST['login-email']; 
$mypassword=$_POST['login-password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
header("location:workspace.php");
}
else {
echo "Wrong Username or Password";
}
?>