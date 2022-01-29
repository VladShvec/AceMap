<?php
include 'sql.php';
session_start();
header('Content-type: text/json');

$user_id = $_SESSION['user_id'];
$id = $user_id['user_id'];
$sqlPoints = "SELECT * FROM points WHERE user_id = '$id' ";
$resul_set = $mysqli->query($sqlPoints);

$allPoints = [];

while ($row = $resul_set->fetch_assoc()){
    $allPoints[] = [
        'x'=>$row['x'],
        'y'=>$row['y']
    ];
}

echo(json_encode($allPoints));

