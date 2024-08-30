<?php

require_once "conexion.php";

function ValidateAccess($pEmail, $pPassword){
    $response = false;
    $conexion = getConnection();

    try {

        if(mysqli_set_charset($conexion, "utf8")){
            $stmt = $conexion->prepare("SELECT * FROM Usuario WHERE Usuario = ? AND Contrasena = ? ");
            $stmt->bind_param("ss", $iEmail, $iPassword);

            $iEmail = $pEmail;
            $iPassword = $pPassword;

            if($stmt->execute()){
                $response = true;
            }
        }
        closeConnection($conexion);
        return $response;

    } catch (Exception) {
        return $response;
    }

}