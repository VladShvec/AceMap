<?php
require '../php/header.php';
include '../php/list.php';

    session_start();
    $current_user = $_SESSION['current_user'];
    $password_user = $current_user['password'];
    $user_ses = $_SESSION['current_user_pass'];
    $user_name = $user_ses['username'];
    $user_id = $_SESSION['user_id'];
    $id = $user_id['user_id'];
    if($id){


?>
    <body>
    <div id="main_page_content">
        <div id="popup" class="d-none">
            <p>Поздравляем, ваш маркер успешно сохранен и отправлен!</p>
            <button class="btn btn-success" onclick="agree(event)">Принять</button>
        </div>
        <div id="main_container">
            <div id="menu_list">

                <button class="menu_button btn btn-info" id="bt" onclick="showList(event)">Список маркеров</button>
                <button class="menu_button btn btn-info" id="bt" onclick="showMap(event)">Показать карту</button>
                <a href="login.php"><button class="menu_button btn btn-info" id="logout"">Выйти</button></a>
            </div>
            <div class="menu">
                <div class="marker-position" style="display: none">click on the map, move the marker, click on the
                    marker
                </div>
                <div id="map" style="width:100%; height:100vh;"></div>
                <div class="form_and_buttons">
                    <form id="form" method="post" class="marker_form form-control"
                    ">
                    <input
                            type="text"
                            class="form-control"
                            onfocusout="warningTitle(event)"
                            id="title" name="title" placeholder="Название маркера">
                    <p id="warningTitle" class="d-none war">Заголовок не должен быть пустым</p>
                    <input
                            type="text"
                            class="form-control"
                            onfocusout="warningDescription(event)"
                            id="description" name="description" placeholder="Описание маркера">
                    <p id="warningDescription" class="d-none war2">Описание не должен быть пустым</p>
                    <input type="text" id="x_coord" name="x" class="form-control" placeholder="Координата Х">
                    <input type="text" id="y_coord" name="y" class="form-control" placeholder="Координата У">
                    <input type="submit" value="Сохранить маркер" id="submit"
                           class="menu_button btn btn-info">

                    </form>
                    <button class="menu_button_add btn btn-info" onclick="addMarkerButton(event)">Добавить маркер
                    </button>
                    <button class="menu_button_add btn btn-info" id="bt" onclick="deleteMarker(event)">Удалить маркер
                        <button class="menu_button_add btn btn-info" id="bt" onclick="showAllMarkers()">Показать все
                            маркеры
                        </button>
                </div>
            </div>
            <div class="lists hide">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">X-coord</th>
                        <th scope="col">Y-coord</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
            </div>

        </div>


    </div>

<?php
require '../php/footer.php';
    }else{
        echo 'Страница не найдена!';
        echo 'Возможо вы забыли авторизироваться';
        echo "<a href='login.php'>Авторизироваться</a>";

    }
?>