<?php

require_once "conexion.php";

function BuscarCliente($pcedula){

    $conexion = getConnection();

    try {

        if(mysqli_set_charset($conexion, "utf8")){
            $stmt = $conexion->prepare("SELECT nombre, apellidos FROM paciente WHERE cedula = ?");
            $stmt->bind_param("s", $ipcedula);
            $ipcedula = $pcedula;
            
            $datos = $stmt->execute();
        }
        closeConnection($conexion);
        return $datos->fetchObject();

    } catch (Exception) {
        return null;
    }

}