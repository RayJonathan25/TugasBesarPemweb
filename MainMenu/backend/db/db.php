<?php

$conn = mysqli_connect('localhost', 'root', '', 'tubes_semester_2');

if (mysqli_errno($conn)) {
    echo 'DB ERR';
    exit();
}

?>
