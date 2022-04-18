<?php require_once '../../middleware/is_login.php'; ?>

<?php require '../../db/index.php'; ?>
<?php
if (isset($_POST['submit'])) {
    if ($_FILES['profImage']['name']) {
        $target_dir = "../../assets/users_pic_profile/";
        $target_file = $target_dir . basename($_FILES["profImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES["profImage"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $image = "assets/users_pic_profile/" . basename($_FILES["profImage"]["name"]);
        $pic = $image;
    }

    $age = $_POST['age'];
    $email = $_POST['email'];
    $id = $_SESSION['users']['id'];
    $update = "UPDATE users SET age = '$age', email = '$email'";

    if ($_FILES['profImage']['name']) {
        echo 'hereee';
        $update .= ", pic_profile = '$pic' ";
    }


    $update .= "WHERE id = '$id'";


    $queries = mysqli_query($connection, $update);

    $user = "SELECT * FROM users WHERE id = '$id'";
    if ($queries) {
        $query = mysqli_query($connection, $user);
        $row = mysqli_fetch_assoc($query);
        $_SESSION['users'] = [
            'id' => $row['id'],
            'username' => $row['username'],
            'email' => $row['email'],
            'biodata' => $row['biodata'],
            'pic_profile' => $row['pic_profile'],
            'age' => $row['age'],
            'created_at' => $row['created_at']
        ];

        header("Reload:0");
    } else {
        echo "Error: Could not able to execute $update" .
            mysqli_error($con);
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frame 6</title>
    <link rel="stylesheet" href="../../assets/css/Frame6.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="../../assets/logoASKTM.png">
        <form method="post" name="searchPertanyaan" action="/profile/edit">
            <input type="text" name="search" placeholder=" Cari jawaban untuk pertanyaan" class="inputSearch">
            <div class="wrap">
                <div class="search">
                    <input type="submit" name="submit-search" class="searchButton" value="">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <?php if (isset($_POST['submit-search'])) {
                //Link belom diisi
            } ?>
        </form>
        <h2 class="header">Ajukan Pertanyaan</h2>
        <a href="/profile">
            <img src="../../<?= $_SESSION['users']['pic_profile'] ?>" alt="profile" class="profileImageHeader">
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
                    <form method="post" name="editProfile" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <h2>Umur<span class="tab"></span><input type="text" name="age" value="<?= $_SESSION['users']['age'] ?>"></h2>
                        <hr style="color:#b4c5ff">
                        <h2>EmailMu <span class="tab"></span> &nbsp; <input type="text" name="email" value="<?= $_SESSION['users']['email'] ?>"></h2>
                        <hr style="color:#b4c5ff">
                        <h2>Gambar Profil <span class="tab"></span> <input type="file" name="profImage"></h2>
                        <hr style="color:#b4c5ff">
                </div>
                <div class="sub-right">
                    <img src="../../<?= $_SESSION['users']['pic_profile'] ?>" class="mt-5 img-circle" alt="avatar">
                    <h2><?= $_SESSION['users']['username'] ?></h2><br><input type="submit" name="submit" value="Simpan">

                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>