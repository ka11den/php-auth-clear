<?php
    $connect = mysqli_connect('ip', 'login', 'password', 'login');

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>
