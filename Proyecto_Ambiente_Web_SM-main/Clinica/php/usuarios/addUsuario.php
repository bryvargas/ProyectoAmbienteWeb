<?php

require_once '../../include/recogeRequest.php';

$usuario = recogePost("User");
$password = recogePost("Password");


    require_once '../../DAL/usuarios.php';
    session_start();
    if (IngresarUsuario($usuario, $password))
    {
        $_SESSION["process"] = "success";
        header("Location: ../../AgregarUsuario.php");
    }else{
        $_SESSION["process"] = "failed";
        header("Location: ../../AgregarUsaurio.php");
    }

?>