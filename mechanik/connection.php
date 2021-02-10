<?php
  	$db = mysqli_connect("127.0.0.1","lukasz","Testowe123!","dialer");

	if (mysqli_connect_errno()) {
		printf("Connect failed:", mysqli_connect_error());
		exit();
	}

?>
