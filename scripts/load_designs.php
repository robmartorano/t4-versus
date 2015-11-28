<div class="account-module" id="user-designs">
	<?php
		session_start();
		error_reporting(E_ALL);

		$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=rz30;';
		$username = 'rz30';
		$password = '9klB3Oh7nuMxI';


		try {
		    $db = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e) {
		    die('Could not connect to the database:<br/>' . $e);
		}
		$sqlq = "SELECT filename WHERE user_id = :user_id";

		$getready = $db->prepare($sqlq);
		$getready->execute(array(':user_id' => $user_id));
		$resultarray = $getready->fetchAll();
		$numdesigns = $resultarray.count();
	?>

	<h2>designs: <?php echo $numdesigns ?></h2>

	<?php
		foreach ($resultarray as &$row){
			echo $row["filename"];
		}
	?>
		
  
</div><!--end designs-->