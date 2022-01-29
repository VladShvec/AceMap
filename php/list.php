<?php
    include 'sql.php';
    session_start();
    $current_user = $_SESSION['current_user'];
    $password_user = $current_user['password'];
    $user_ses = $_SESSION['current_user_pass'];
    $user_name = $user_ses['username'];
    $user_id = $_SESSION['user_id'];
    $id = $user_id['user_id'];
    $sqlPoints = "SELECT * FROM `points` WHERE `user_id` = '$id' ";
    $resul_set = $mysqli->query($sqlPoints);
//    print_r($row = $resul_set->fetch_assoc());
//    $row = $resul_set->fetch_assoc();



