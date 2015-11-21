<?php 
session_start();

if (isset($_SESSION['just_logged_in'])) {
	if ($_SESSION['just_logged_in'] == "yes") {
		//$ret["val"] = "yes";
		echo json_encode("yes");
		$_SESSION['just_logged_in'] == "no";
	}
	else {
		echo json_encode("no");
	}
}


?>