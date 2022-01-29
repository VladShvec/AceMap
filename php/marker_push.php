<?php
include 'sql.php';
session_start();
print_r($_POST['title']);
$current_user = $_SESSION['current_user'];
$password_user = $current_user['password'];
$user_ses = $_SESSION['current_user_pass'];
$user_name = $user_ses['username'];
$user_id = $_SESSION['user_id'];
$id = $user_id['user_id'];
print_r($id);
////print_r($password_from_session);
//print_r($_SESSION['user_id']);
//echo '<br>'.$id;
//Проверка и присваивание имени пользователя
if($_POST['title'] !== '' && $_POST['description'] !== '' && $_POST['x'] !== '' && $_POST['y'] !== '' ){
    $title = $_POST['title'];
    print_r($title);
    $description = $_POST['description'];
    $x =  $_POST['x'];
    $y =  $_POST['y'];
    echo '<br>'.$x."<br>";
    echo '<br>'.$id;
   $sqlQuery = "INSERT INTO `points`  (`user_id`,`x`,`y`,`title`,`description`)  
                VALUES ('$id','$x', '$y','$title','$description')";
   print_r($sqlQuery);
   $mysqli->query($sqlQuery);

//    header('Location: ../public/mainpage.php');
}else{
//     header('Location: ../public/mainpage.php');
}
