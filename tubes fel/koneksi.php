<?php
	
	$connection = mysqli_connect("localhost", "root", "", "latihan");
	
	if ($connection === false) {
		echo "EROR -> cant connect : " . mysqli_error($connection);
	}
	
?>