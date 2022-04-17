<?php
	
	session_start();

	include('koneksi.php');

	$username = $_POST['username'];
	$password = MD5($_POST['password']);

	//query
	$query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $query);
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	

	if($num_row >=1) {
		
		echo "success";
		
		$_SESSION['login'] = True;
		$_SESSION['id_user'] = $row["id_user"];
		$_SESSION['username'] = $row["username"];
		$_SESSION['password'] = $row["password"];
		$_SESSION['email'] = $row["email"];
		$_SESSION['biodata'] = $row["biodata"];
		$_SESSION['pic_profile'] = $row["pic_profile"];
		
		if(isset($_POST['remember'])){
			setcookie('login', 'true', time()+3600);
			setcookie('id_user', $row["id_user"], time()+3600);
			setcookie('username', $row["username"], time()+3600);
			setcookie('password', $row["password"], time()+3600);
			setcookie('email', $row["email"], time()+3600);
			setcookie('biodata', $row["biodata"], time()+3600);
			setcookie('pic_profile', $row["pic_profile"], time()+3600);
		}

	} else {
		
		echo(print_r($num_row));

	}

?>