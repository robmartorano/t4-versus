<?php 
session_start();

if (isset($_SESSION['just_logged_in'])) {
	if ($_SESSION['just_logged_in'] == "yes") {
		//$ret["val"] = "yes";
		$_SESSION['just_logged_in'] = "no";
		echo json_encode("yes");
		
	}
	else {
		echo json_encode("no");
	}
}


?>