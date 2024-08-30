<?php

require_once '../../include/recogeRequest.php';

$idUsuario = recogePost("idUsuario");
$usuario = recogePost("Usuario");
$password = recogePost("Password");


    require_once '../../DAL/usuarios.php';
    session_start();
    if (ActualizarUsuario($idUsuario, $usuario, $password))
    {
        $_SESSION["process"] = "success";
        header("Location: ../../Usuarios.php");
    }else{
        $_SESSION["process"] = "failed";
        header("Location: ../../ModificarUsuario.php");
    }

?>