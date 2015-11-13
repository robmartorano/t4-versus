<?php
	$json = $_POST['json'];
	echo $json;

	if (json_decode($json) != null) {
		$filename = md5($_SESSION['email'] . date_default_timezone_get());
    	$file = fopen("./user_designs/". $filename . ".json", "wb");
    	fwrite($file, $json);
    	fclose($file);
    	echo "wrote the file";
	}
	else {
    	echo "failed to save file";
	}
?>