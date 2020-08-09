<?php
	$db = mysqli_connect("localhost", "root", "", "webtech");
	if ( $db ){
		// echo "Database Connected Successfully.";
	}
	else{
		die("MySQLi Connection Failed." . mysqli_error($db));
	}
?>