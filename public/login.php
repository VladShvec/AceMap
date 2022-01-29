<?php
include '../php/header.php';
?>
    <div id="login_root">
        <div class="root_container container">
            <h1 class="main-head">Авторизация</h1>
            <form action="../php/login_check.php" id="form" class="container" method="post">
                <div class="input_contaner">
                    <input
                        onfocusout="valUserName(event)"
                        class="input form-control"
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Введите ваше имя пользователя">
                    <p id="warningUserName" class="d-none warning">Ввведенное вами имя пользователя должно содержать минимум 3 символа</p>
                </div>
                <div class="input_contaner">
                    <input
                        onfocusout="valPassword(event)"
                        class="input
                        form-control"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Введите ваш пароль">
                    <i
                        id="eye"
                        class="far fa-eye-slash"
                        onmousedown="showPass(event)"
                        onmouseup="hidePass(event)"
                    ></i>
                    <p id="warningPassword" class="d-none warning">Ввведенный вами пароль должно содержать минимум 5 символа</p>

                </div>
                <input type="submit" class="btn btn-dark but">
            </form>
        </div>
    </div>
<?php
include '../php/footer.php';
?>