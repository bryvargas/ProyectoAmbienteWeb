<?php

require_once '../../include/recogeRequest.php';

$cedula = recogePost("CedulaCliente");
$fechaNacimiento = recogePost("FechaNacimiento");
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
    require_once '../../DAL/pacientes.php';
    if (ActualizarPaciente($cedula, $fechaNacimiento, $nombre, $apellidos, $genero, 
        $correo, $provincia, $canton, $distrito, $descripcion, $telefono))
    {
        $_SESSION["process"] = "success";
        header("Location: ../../Pacientes.php");
    }else{
        $_SESSION["process"] = "failed";
        header("Location: ../../ModificarPaciente.php");
    }
}
else{
    $_SESSION["process"] = "badformat";
    header("Location: ../../ModificarPaciente.php");
}

?>