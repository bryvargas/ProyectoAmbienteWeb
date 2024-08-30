<?php

require_once '../../include/recogeRequest.php';

$nombre = recogePost("Nombre");
$descripcion = recogePost("descripcion");


require_once '../../DAL/especialidades.php';
session_start();

if (IngresarEspecialidad($nombre, $descripcion))
{
    $_SESSION["process"] = "success";
    header("Location: ../../AgregarEspecialidad.php");

}else{
    $_SESSION["process"] = "failed";
    header("Location: ../../AgregarEspecialidad.php");
}

?>