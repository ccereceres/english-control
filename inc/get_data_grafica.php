<?php
session_start();
if ($_SESSION["tipo_usuario"] === 3) {
    include_once 'db.php';
    $sqlCount = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 1";
    $num1 = mysqli_query($link, $sqlCount);
    $row = mysqli_fetch_row($num1);
    echo $row[0];
    $sqlCount2 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 2";
    $num2 = mysqli_query($link, $sqlCount2);
    $row2 = mysqli_fetch_row($num2);
    echo $row2[0];
    $sqlCount3 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 3";
    $num3 = mysqli_query($link, $sqlCount3);
    $row3 = mysqli_fetch_row($num3);
    echo $row3[0];
    $sqlCount4 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 4";
    $num4 = mysqli_query($link, $sqlCount4);
    $row4 = mysqli_fetch_row($num4);
    echo $row4[0];
    $sqlCount5 = "SELECT COUNT(*) FROM demanda WHERE nivel_id = 5";
    $num5 = mysqli_query($link, $sqlCount5);
    $row5 = mysqli_fetch_row($num5);
    echo $row5[0];
}