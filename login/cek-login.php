<?php

session_start();

include('../db/index.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password =  $_POST['password'];

    //query
    $query  = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($num_row >= 1) {
        if (password_verify($password, $row['password'])) {
            /// password di hapus karena membahayakan keamanan informasi users

            $_SESSION['users'] = [
                'id_users' => $row["id_users"],
                "username" => $row["username"],
                'email' => $row['email'],
                'biodata' => $row['biodata'],
                'pic_profile' => $row['pic_profile']
            ];


            if (isset($_POST['remember'])) {
                setcookie('login', 'true', time() + 3600);
                setcookie('id_user', $row["id_users"], time() + 3600);
                setcookie('username', $row["username"], time() + 3600);
                setcookie('email', $row["email"], time() + 3600);
                setcookie('biodata', $row["biodata"], time() + 3600);
                setcookie('pic_profile', $row["pic_profile"], time() + 3600);
            }

            echo "success";
        } else {
            echo "ERROR";
        }
    } else {

        echo (print_r($num_row));
    }
} else {
    header("location: /login");
}
