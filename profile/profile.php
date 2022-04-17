<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="profile.css">
  <title>Profile</title>
  <link rel="icon" href="assets/logo.png" type="image/icon type">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
		
  <?php
  session_start();
  $connection = mysqli_connect('localhost', 'root', '', 'latihan');

  if ($connection === false) {
      echo 'ERROR';
  }
  $sql = "SELECT * FROM users WHERE id_user = '$_SESSION[id_user]'";
  $result = mysqli_query($connection, $sql);
  ?>
 
  
 </head>
 <body>
 
  <header>
  </header>
  
  <body>
	
	<div id="left">
		<?php while ($row = mysqli_fetch_array($result)) {
      echo "<img src=$row[pic_profile] alt='profpic'>";
      echo "<h3 id = 'username'><b>" . $row['username'] . '</b></h3>';
      echo "<p id = 'biodata'>" . $row['biodata'] . '</p>';
  } ?>
		<button type="submit" id="edit_profile" onclick = "location.href = 'frame6.php';"><b>Edit Profile</b></button>
		<button type="submit" id="logout" onclick = "location.href = 'login.php';"><b>Logout</b></button>
	</div>
  
	<div id="right">
		<button type="submit" id="jawaban">Jawaban</button>
		<button type="submit" id="pertanyaan">Pertanyaan</button>
	</div>
  </body>