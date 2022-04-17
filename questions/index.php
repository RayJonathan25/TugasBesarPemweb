<?php
$id = null;

if (!isset($_GET['id'])) {
    header("Location: /main");
} else {
    $id = $_GET['id'];
}
