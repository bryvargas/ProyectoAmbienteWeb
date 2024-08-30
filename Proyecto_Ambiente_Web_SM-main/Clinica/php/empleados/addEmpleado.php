<?php

require_once '../../include/recogeRequest.php';

$cedula = recogePost("idEmpleado");
$especialidad = recogePost("especialidad");
$fechaNacimiento = recogePost("fechaNacimiento");
$nombre = recogePost("Nombre");
$apellidos = recogePost("Apellidos");
$genero = recogePost("genero");
$correo = recogePost("correo");
$provincia = recogePost("provincia");
$canton = recogePost("canton");
$distrito = recogePost("distrito");
$descripcion = recogePost("direccion");
$telefono = recogePost("telefono");

$correoOK = false;


if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $correoOK = true;
}

session_start();
if($correoOK){
    require_once '../../DAL/empleados.php';
    
    if (IngresarEmpleado($cedula, $especialidad, $fechaNacimiento, $nombre, $apellidos, $genero, 
        $correo, $provincia, $canton, $distrito, $descripcion, $telefono))
    {
        $_SESSION["process"] = "success";
        header("Location: ../../AgregarEmpleado.php");
    }else{
        $_SESSION["process"] = "failed";
        header("Location: ../../AgregarEmpleado.php");
    }
}
else{
    $_SESSION["process"] = "badformat";
    header("Location: ../../AgregarEmpleado.php");
}

?>