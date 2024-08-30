<?php

    $cedula = $_POST["CedulaCliente"];
    $button = $_POST["action"];

    if($button == "search"){

        require_once '../../DAL/pacientes.php';
        
        $resultado = ObtenerPacientesById($cedula); 
        $data = $resultado->fetch_assoc();

        header("Location: ../../SolicitudCitas.php?cedula={$cedula}&nombre={$data["nombre"]}&apellidos={$data["apellidos"]} ");

    }
    else{
        
        require_once '../../DAL/citas.php';

        $cedula = $_POST["cedulaHidden"];
        $fecha = $_POST["FechaCita"];
        $hora = $_POST["Hora"];
        $especialidad = $_POST["especialidad"];
        $user = $_COOKIE["username"];
        $empleado = $_POST["empleado"];

        $resultado = IngresarCita($cedula, $fecha, $especialidad, $hora, $empleado, $user);


        session_start();
        if($resultado){
            
            $_SESSION["process"] = "success";
            header("Location: ../../SolicitudCitas.php");
        }
        else{
            $_SESSION["process"] = "failed";
            header("Location: ../../SolicitudCitas.php");
        }
    }
    
?>