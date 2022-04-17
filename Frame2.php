<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frame 2</title>
    <link rel="stylesheet" href="css/Frame2.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&family=Rozha+One&family=Rubik:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="assets/logoASKTM.png" class="headerFlex">
        <div class="links">
            <a href="login.php">Masuk</a><a href="register.php">Daftar</a><a href="#">Bertanya</a> 
            <!-- YANG BERTANYA BELOM DI ISI MAU KEMANANYA -->
        </div>
    </header>
    <main>
        <h1>Dari bertanya jadi<br>mengerti</h1>
        <p>Ask TOO MUCH, adalah platform bagi para pelajar<br>untuk saling membantu memberi ilmu pelajaran</p>

        <form method="post" name="searchPertanyaan" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="search" placeholder="Apa pertanyaanmu?">
            <div class="wrap">
                <div class="search">
                    <input type="submit" name="submit" class="searchButton" value="">
                    <i class="fa fa-search"></i>
                </div>
            </div>
        </form>

        <img src="assets/meme1.jpg">
        <?php
        require 'koneksi.php';

        if (isset($_POST['submit'])) {
            if ($_POST['search'] != "") {
                // INI KALO PENCET TOMBOL YANG ABU BULET, KEMANANYA JUGA BELOM
            }
        }
        ?>
    </main>
    <footer>
        <div class="container">
            <h2>CREATOR</h2>
            <p>@michaelasheren</p>
            <p>@bryanimanuel</p>
            <p>@feliciakiani</p>
            <p>@rayjo</p>

        </div>

        <div class="container">
            <h2>About Company</h2>
            <p>_____</p>
            <p>Address : Jalan AskFM </p>
            <p>Social Links : </p>
            <a href="https://instagram.com/michaelasheren_?igshid=YmMyMTA2M2Y= " target="_blank"> <img src="assets/ig_icon.png" alt="michaelasheren_ ig" width="20" height="20"></a>
            <a href="https://instagram.com/bryanimanuell17?igshid=YmMyMTA2M2Y= " target="_blank"> <img src="assets/ig_icon.png" alt="bryanimanuell17 ig" width="20" height="20"></a>
            <a href="https://instagram.com/feliciakiani?igshid=YmMyMTA2M2Y= " target="_blank"> <img src="assets/ig_icon.png" alt="feliciakiani ig" width="20" height="20"></a>
            <a href="https://instagram.com/_rayjoo?igshid=YmMyMTA2M2Y= " target="_blank"> <img src="assets/ig_icon.png" alt="rayjo ig" width="20" height="20"></a>


        </div>

        <div class="container emailUs">
            <div class="left">
                <h2>Contact Us</h2>
            </div>
            <div class="right">
                <form>
                    <input type="email" name="emailContactUs" id="emailContactUs" placeholder="Enter your email" /> <br>
                    <textarea name="message" id="message" rows="4" cols="70"> Enter message :</textarea> <br>
                    <input type="submit" value="Send Email" name="sendEmail" />
                </form>
            </div>
        </div>

    </footer>
</body>

</html>