<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frame 6</title>
    <link rel="stylesheet" href="css/Frame6.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="assets/logoASKTM.png">
        <form method="post" name="searchPertanyaan" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="search" placeholder=" Cari jawaban untuk pertanyaan" class="inputSearch">
            <div class="wrap">
                <div class="search">
                    <input type="submit" name="submit" class="searchButton" value="">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <?php
                if(isset($_POST['submit'])){
                    //Link belom diisi
                }
            ?>
        </form>
        <h2 class="header">Ajukan Pertanyaan</h2>
        <a href="Frame4.php">
            <img src="assets/users_pic_profile/usericon.png" alt="profile" class="profileImageHeader">
        </a>
    </header>
    <hr>
    <main>
        <div class="container">
            <div class="atas">
                <h1>Edit Profile Mu</h1>
                <hr style="color:#b3b3b3">
            </div>
            <div class="isi">
                <div class="sub-left">
                    <form method="post" name="editProfile" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <?php
                        require 'koneksi.php';
                        // YANG ADA . NYA ITU DIISI PAKE SESSION GW GATAU CARANYA
                        echo '
                    <h2>Preferensi<span class="tab"></span><input type="text" name="preferensi" value="' .  '"></h2>
                    <hr style="color:#b4c5ff">
                    <h2>Kata Sandi<span class="tab"></span><input type="password" name="password" value="' .  '"></h2>
                    <hr style="color:#b4c5ff">
                    <h2>EmailMu <span class="tab"></span> &nbsp; <input type="text" name="email"></h2>
                    <hr style="color:#b4c5ff">
                    <h2>Gambar Profil <span class="tab"></span> <input type="file" name="profImage"></h2>
                    <hr style="color:#b4c5ff">';
                        ?>

                    </form>
                </div>
                <div class="sub-right">
                    <img src="assets/users_pic_profile/usericon.png" class="mt-5 img-circle" alt="avatar">
                    <form method="post" name="toSubmit" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <?php
                        echo "<h2>Name goes here</h2><br>";
                        echo '<input type="submit" name="submit" value="Simpan">';
                        require 'koneksi.php';
                        if (isset($_POST['submit'])) {
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $email = $_POST["email"];
                            $pic = $_POST["pic_profile"];
                            $update = "UPDATE users SET username = '$username', password = '$password', email = '$email', pic_profile = '$pic' 
                        WHERE id = '$id'";

                            if (mysqli_multi_query($con, $update)) {
                                echo "\nData updated succesfully.";
                            } else {
                                echo "Error: Could not able to execute $update" . mysqli_error($con);
                            }
                            mysqli_close($con);
                        };
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>