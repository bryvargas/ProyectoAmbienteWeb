<?php

require_once "conexion.php";

function IngresarPaciente($cedulap, $fechaNacimientop, $nombrep, $apellidosp, $generop, $correop, $provinciap, $cantonp, $distritop, $descripcionp, $telefonop)
{
    $retorno = false;
    $conexion = getConnection();

    $fechaNacimientop = date("Y-m-d",strtotime($fechaNacimientop));

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("INSERT INTO paciente(cedula, nombre, apellidos, fechaNacimiento,genero, correo, telefono, id_provincia, id_canton, id_distrito, direccion) 
        values (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssiiiis", $cedulap,$nombrep, $apellidosp, $fechaNacimientop, $generop, $correop,$telefonop, $provinciap, $cantonp, $distritop, $descripcionp);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ActualizarPaciente($cedulap, $fechaNacimientop, $nombrep, $apellidosp, $generop, $correop, $provinciap, $cantonp, $distritop, $descripcionp, $telefonop)
{
    $retorno = false;
    $conexion = getConnection();

    $fechaNacimientop = date("Y-m-d",strtotime($fechaNacimientop));

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("UPDATE paciente set nombre = ?, apellidos = ?, fechaNacimiento = ?, genero= ?, correo = ?, telefono =?, id_provincia=?, id_canton=?, id_distrito=?, direccion=? where cedula = ?");
        $stmt->bind_param("sssssiiiisi", $nombrep, $apellidosp, $fechaNacimientop, $generop, $correop,$telefonop, $provinciap, $cantonp, $distritop, $descripcionp, $cedulap);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ObtenerPacientes(){
    $conexion = getConnection();

    $resultado = $conexion->query("select cedula, nombre, apellidos, correo, telefono from paciente");

    $conexion->close();

    return $resultado;
}

function ObtenerPacientesById($idp){

    $conexion = getConnection();

    $resultado = $conexion->query("SELECT * FROM paciente WHERE cedula = {$idp} ");

    $conexion->close();

    return $resultado;

}