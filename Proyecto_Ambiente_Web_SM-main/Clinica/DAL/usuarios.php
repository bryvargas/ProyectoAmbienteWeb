<?php

require_once "conexion.php";

function IngresarUsuario($usuariop, $passwordp)
{
    $retorno = false;
    $conexion = getConnection();


    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("INSERT INTO usuarios(user, password) 
        values (?,?)");
        $stmt->bind_param("ss", $usuariop, $passwordp);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ActualizarUsuario($idUsuariop, $usuariop, $passwordp)
{
    $retorno = false;
    $conexion = getConnection();


    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("UPDATE usuarios set user = ?, password = ? where id_usuarios = ?");
        $stmt->bind_param("ssi", $usuariop, $passwordp, $idUsuariop);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ObtenerUsuarios(){
    $conexion = getConnection();

    $resultado = $conexion->query("select id_usuarios, user, password from usuarios");

    $conexion->close();

    return $resultado;
}

function ObtenerUsuariosById($idp){

    $conexion = getConnection();

    $resultado = $conexion->query("SELECT * FROM usuarios WHERE id_usuarios = {$idp} ");

    $conexion->close();

    return $resultado;

}