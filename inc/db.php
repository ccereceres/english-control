<?php
//Credenciales de la base de datos
const DB_SERVER = 'localhost';
const DB_USERNAME = 'jahy';
const DB_PASSWORD = 'H3nt4i-!#22';
const DB_NAME = 'english-control';

//Intentar conectar a la base de datos
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Comprobar conexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}