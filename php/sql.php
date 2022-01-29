<?php
//DataBase data
const DB_HOST = 'localhost';
const DB_USER = 'mysql';
const DB_PASSWORD = '';
const DB_DATABASE = 'map_users';

//DataBase connect
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

//Error find
if($mysqli->connect_errno) exit('Ошибка: не удалось подключиться к базе данных');
$mysqli->set_charset('utf8');