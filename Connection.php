<?php

	$con=mysqli_connect("localhost","root","","swiss_collection");

	if(mysqli_connect_error()){
		echo"cannot connect to database";
		exit();
	}
	
	?>