<?php

require_once '../../include/recogeRequest.php';

$idEspecialidad = recogePost("idEspecialidad");
$nombre = recogePost("Nombre");
$descripcion = recogePost("descripcion");


    require_once '../../DAL/especialidades.php';
    session_start();
    if (ActualizarEspecialidad($idEspecialidad, $nombre, $descripcion))
    {
        $_SESSION["process"] = "success";
        header("Location: ../../Especialidades.php");
    }else{
        $_SESSION["process"] = "failed";
        header("Location: ../../ModificarEspecialidad.php");
    }


?>