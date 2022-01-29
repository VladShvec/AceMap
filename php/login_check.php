<?php
    include 'sql.php';
    session_start();
    //Проверка и присваивание имени пользователя
    if($_POST['username'] !== '' && strlen($_POST['username']) > 2 ){
        $userName = $_POST['username'];

    }else{
//        header('Location: ../public/login.php');
    }

    //Проверка и присваивание пароля
    if($_POST['password'] !== '' && strlen($_POST['password']) > 5){
        $password = md5($_POST['password']);
    }else{
//        header('Location: ../public/login.php');

    }

        //Сверение с базой данных

        $sql = "SELECT `password` FROM `users` WHERE `username` = '$userName'  ";
        $sqlP = "SELECT `username` FROM `users` WHERE `password` = '$password'  ";
        $sqlI = "SELECT `user_id` FROM `users` WHERE `password` = '$password'  ";
        $result_set = $mysqli->query($sql);
        $result_id = $mysqli->query($sqlI);
        $res = $mysqli->query($sqlP);
        $row = $result_set->fetch_assoc();
        $pas = $res->fetch_assoc();
        $id = $result_id->fetch_assoc();
        print_r($id);
        print_r($pas);
        if( $row){
            echo 'you have new session';
            $_SESSION['current_user'] = $row;
            $_SESSION['current_user_pass'] = $pas;
            $_SESSION['user_id'] = $id;
            print_r($id);
            header('Location: ../public/mainpage.php');
        }else{
            echo 'false row';
            header('Location: ../public/login.php');
        }