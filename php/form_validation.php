<?php
    //Подключение sql файла
    include 'sql.php';
    //Проверка и присваивание имени пользователя
    if($_POST['username'] !== '' && strlen($_POST['username']) > 2 ){
        $userName = $_POST['username'];

    }else{
        header('Location: ../public/main.php');
    }

    //Проверка и присваивание пароля
    if($_POST['password'] !== '' && strlen($_POST['password']) > 5){
        $password = md5($_POST['password']);
    }else{
        header('Location: ../public/main.php');

    }

    //Финальная проверка и добавление $userName и $password в базу данных
    if($userName !== '' && $password !== '' && strlen($_POST['password']) > 5) {
        echo $userName;
        echo $password;
        $sql = "INSERT INTO `users`(`username`, `password`)
            VALUES ('$userName','$password')";
        $mysqli->query($sql);

        //Переадресация на другую страницу
        header('Location: ../public/login.php');
    }