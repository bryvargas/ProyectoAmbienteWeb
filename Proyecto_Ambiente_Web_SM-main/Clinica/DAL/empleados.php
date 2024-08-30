<?php

require_once "conexion.php";

function IngresarEmpleado($idEmpleadop, $especialidadp, $fechaNacimientop, $nombrep, $apellidosp, $generop, $correop, $provinciap, $cantonp, $distritop, $descripcionp, $telefonop)
{
    $retorno = false;
    $conexion = getConnection();

    $fechaNacimientop = date("Y-m-d",strtotime($fechaNacimientop));

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){
        $stmt = $conexion->prepare("INSERT INTO empleado(id_empleado, fechaNacimiento, nombre, apellidos, id_especialidad,genero, correo, telefono, id_provincia, id_canton, id_distrito, direccion) 
        values (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssiiiis", $idEmpleadop, $fechaNacimientop ,$nombrep, $apellidosp, $especialidadp, $generop, $correop,$telefonop, $provinciap, $cantonp, $distritop, $descripcionp);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ActualizarEmpleado($cedulap, $especialidadp, $fechaNacimientop, $nombrep, $apellidosp, $generop, 
$correop, $provinciap, $cantonp, $distritop, $descripcionp, $telefonop)
{
    $retorno = false;
    $conexion = getConnection();

    $fechaNacimientop = date("Y-m-d",strtotime($fechaNacimientop));

    //formato de datos utf8
    if(mysqli_set_charset($conexion, "utf8")){

        $stmt = $conexion->prepare("UPDATE empleado set nombre = ?, fechaNacimiento = ?, apellidos = ?, id_especialidad = ?, genero= ?, correo = ?, telefono =?, id_provincia=?, id_canton=?, id_distrito=?, direccion=? where id_empleado = ?");
        $stmt->bind_param("ssssssiiiisi", $nombrep, $fechaNacimientop, $apellidosp, $especialidadp, $generop, $correop, $telefonop, $provinciap, $cantonp, $distritop, $descripcionp, $cedulap);

        if($stmt->execute()){
            $retorno = true;
        }
    }
    closeConnection($conexion);

    return $retorno;
}

function ObtenerEmpleados(){
    $conexion = getConnection();

    $resultado = $conexion->query("select id_empleado, nombre, apellidos, correo, telefono from empleado");

    $conexion->close();

    return $resultado;
}

function ObtenerEmpleadosById($idp){

    $conexion = getConnection();

    $resultado = $conexion->query("SELECT * FROM empleado WHERE id_Empleado = {$idp} ");

    $conexion->close();

    return $resultado;

}