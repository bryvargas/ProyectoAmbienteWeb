<?php

require_once "conexion.php";

function ValidateAccess($pusuario, $pPassword){

    $response = false;
    $conexion = getConnection();

    try {

        if(mysqli_set_charset($conexion, "utf8")){
            $stmt = $conexion->prepare("SELECT user, password FROM usuarios WHERE user = ? AND password = ? ");
            $stmt->bind_param("ss", $iusuario, $iPassword);

            $iusuario = $pusuario;
            $iPassword = $pPassword;

            if($stmt->execute()){
                $result = $stmt->get_result();
                $response = $result-> num_rows > 0;
            }
        }
        closeConnection($conexion);
        return $response;

    } catch (Exception) {
        return $response;
    }

}