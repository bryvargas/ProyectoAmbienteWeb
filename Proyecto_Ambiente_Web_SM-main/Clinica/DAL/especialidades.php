<?php

require_once "conexion.php";

function IngresarEspecialidad($nombrep, $descripcionp)
{
    $retorno = false;
    $conexion = getConnection();


    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("INSERT INTO especialidad(nombre, descripcion_puesto) 
        values (?,?)");
        $stmt->bind_param("ss", $nombrep, $descripcionp);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ActualizarEspecialidad($idEspecialidadp, $nombrep, $descripcionp)
{
    $retorno = false;
    $conexion = getConnection();

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("UPDATE especialidad set nombre = ?, descripcion_puesto=? where id_especialidad = ?");
        $stmt->bind_param("ssi", $nombrep, $descripcionp, $idEspecialidadp);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ObtenerEspecialidades(){
    $conexion = getConnection();

    $resultado = $conexion->query("select id_especialidad, nombre, descripcion_puesto from especialidad");

    $conexion->close();

    return $resultado;
}

function ObtenerEspecialidadesById($idp){

    $conexion = getConnection();

    $resultado = $conexion->query("SELECT * FROM especialidad WHERE id_especialidad = {$idp} ");

    $conexion->close();

    return $resultado;

}