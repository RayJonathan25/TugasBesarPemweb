<?php

	include('koneksi.php');

	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	$pic = "assets/users_pic_profile/usericon.png";
	
	//cek apakah ada username yang sama
	$getUsername = "SELECT username FROM users WHERE username = '$username'";
	$cekResult = mysqli_query($connection, $getUsername);
	$num_row = mysqli_num_rows($cekResult);
		
	if($num_row == 0){ // jika belum ada username yang sama
		
		//query insert data ke dalam database
		$insertVal = "INSERT INTO users (username, password, email, pic_profile) VALUES ('$username', '$password', '$email', '$pic')";        
		$result = mysqli_query($connection, $insertVal);
	
		if($result) {
			echo "success";
		} else {
			echo "error";
		}
	} else {
		echo "cannot";
	}
?>