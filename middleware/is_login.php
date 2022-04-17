<?php
session_start();

if (!isset($_SESSION['users'])) {
    return header('Location: /login');
    exit(0);
}
