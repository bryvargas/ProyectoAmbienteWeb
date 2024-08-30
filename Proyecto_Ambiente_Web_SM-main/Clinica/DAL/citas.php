<?php
    require_once 'conexion.php';

    function IngresarCita($cedulap, $fechap, $especialidadp, $horap, $empleadop, $usuariop){
        
        $retorno = false;
        try {
            $conexion = getConnection();
            $fechap = date("Y-m-d",strtotime($fechap));
            //formato de datos utf8

            if(mysqli_set_charset($conexion, "utf8")){
                $stmt = $conexion->prepare("INSERT INTO cita(cedula, fecha, hora, id_empleado, usuario, id_especialidad) 
                VALUES(?,?,?,?,?,?)");
                $stmt->bind_param("issssi", $cedulap, $fechap, $horap, $empleadop, $usuariop , $especialidadp );
        
                if($stmt->execute()){
                    $retorno = true;
                }
            }
            closeConnection($conexion);

        } catch (\Throwable $th) {
            $retorno = false;
        }
        return $retorno;
    }

    function getInfo(){
        
        $conexion = getConnection();

        $resultado = $conexion->query("SELECT ct.id_cita as id, 
            CONCAT(PCT.nombre, ' ', PCT.apellidos) as nombre, CAST(CONCAT(ct.fecha, ' ' ,ct.hora) as datetime) as fechaInicio,
            ADDTIME(CAST(CONCAT(ct.fecha, ' ' ,ct.hora) as datetime),'1:0:0.000000') as fechaFinal
            FROM `cita` ct
            LEFT JOIN `empleado` EMP ON EMP.id_empleado = ct.id_empleado
            LEFT JOIN `paciente` PCT on PCT.cedula = ct.cedula ");
    
        $conexion->close();

        return $resultado;
    }

?>
