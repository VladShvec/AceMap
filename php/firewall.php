<?php
    include 'sql.php';
    session_start();
    $current_user = $_SESSION['username'];
    $check = 'SELECT `username` FROM `users`';
    $result = $mysqli->query($check);
    $table = [];
    while($row = $result->fetch_assoc())
    {
        $table[] = $row;
    }
    for($i = 0;$i < count($table); $i++) {
    //            print_r($table[$i]['username'].'<br>');
        if($table[$i]);
    }