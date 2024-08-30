<?php

require_once '../../include/recogeRequest.php';

$usuario = recogePost("usuario");
$password = recogePost("password");

$usuarioOK = false;
$passwordOK = false;

$errores = [];

$usuarioOK = true;
$passwordOK = true;


if($usuarioOK && $passwordOK){

    require_once '../../DAL/login.php';
    if (ValidateAccess($usuario, $password)){
        
        setcookie("username", $usuario, time()+ (3600 * 1000), "/");
        header("Location: ../../Home.php");

    }else{
        header("Location: ../../Index.php");
    }
}

?>