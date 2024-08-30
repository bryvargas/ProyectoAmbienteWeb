<?php

function getConnection()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "proyecto_web";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if (!$conexion) {
        echo "Ocurrió un error al establecer la conexión: " . mysqli_connect_error();
    }

    return $conexion;
}

function closeConnection($conexion)
{
    mysqli_close($conexion);
}