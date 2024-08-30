<?php
    session_start();

    if(!isset($_COOKIE["username"])){
        header("Location: Index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Citas</title>
    <script src="https://kit.fontawesome.com/89da924aef.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('Templates/sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('Templates/navbar.php'); ?>
                <div class="container-fluid">
                    <form action="php/Citas/procesarCitas.php" method="POST">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-plus"></i> 
                                    Nueva solicitud de cita
                                </h6>
                            </div>

                            <div class="card-body border-bottom-primary">
                                <div class="row mb-4">
                                    <div class="col col-md-6 col-sm-12">
                                        <input type="text" 
                                            id="CedulaCliente" 
                                            placeholder="Cédula del cliente" 
                                            name="CedulaCliente" 
                                            class="form-control"/>
                                    </div>
                                    <div class="col col-md-6 col-sm-12">
                                        <button type="submit" name="action" value="search" class="btn btn-primary btn-circle">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>  
                                </div>   

                                <hr style="background-color:gray;">

                                <input type="text" 
                                    id="cedulaHidden" 
                                    name="cedulaHidden" 
                                    class="form-control" 
                                    hidden
                                    value="<?= (!isset($_GET["cedula"]))? "" : $_GET["cedula"] ?>"/>

                                <div class="row mb-3">
                                    <div class="col col-md-6 col-sm-12">
                                        <label for="NombreCliente" class="form-label">Nombre del cliente</label>
                                        <input type="text" 
                                            id="NombreCliente" 
                                            name="NombreCliente" 
                                            class="form-control" 
                                            value="<?= (!isset($_GET["nombre"]) && !isset($_GET["apellidos"]))? "" : $_GET["nombre"]. " " . $_GET["apellidos"] ?>"
                                            readonly/>
                                    </div>
                                    <div class="col col-md-6 col-sm-12">
                                        <label for="FechaCita" class="form-label" >Fecha de cita</label>
                                        <input type="date" 
                                            id="FechaCita" 
                                            name="FechaCita" 
                                            class="form-control" />
                                    </div>  
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col col-md-6 col-sm-12">
                                        <label for="especialidad" class="form-label">Especialidad</label>
                                        <select class="form-select" name="especialidad">
                                            <?php                                                   
                                                require_once "DAL/conexion.php";
                                                $conexion = getConnection();
                                                $query = $conexion -> query ("SELECT * FROM `especialidad`");                                                    
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="'.$valores['id_especialidad'].'">'.$valores['nombre'] .'</option>';
                                                }
                                                closeConnection($conexion);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col col-md-6 col-sm-12">
                                        <label for="Hora" class="form-label" >Hora de cita</label>
                                        <input type="time" 
                                            id="Hora" 
                                            name="Hora" 
                                            class="form-control" />
                                    </div>  
                                </div>

                                <div class="row mb-3">
                                    <div class="col col-md-6 col-sm-12">
                                        <label for="empleado" class="form-label">Empleado</label>
                                        <select class="form-select" name="empleado">
                                            <?php                                                   
                                                require_once "DAL/conexion.php";
                                                $conexion = getConnection();
                                                $query = $conexion -> query ("SELECT * FROM `empleado`");                                                    
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="'.$valores['id_empleado'].'">'.$valores['nombre']. ' ' . $valores['apellidos'] .'</option>';
                                                }
                                                closeConnection($conexion);
                                            ?>
                                        </select>
                                    </div>  
                                </div>
                                <button type="submit" name="action" value="add" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Agregar cita</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <?php 
        if(isset($_SESSION["process"]) && $_SESSION["process"] == "success"){
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Se ha ingresado la cita correctamente',  
                }) </script>'";
                $_SESSION["process"] = null;
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "failed"){
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: 'No hemos podido ingresar la cita',  
                }) </script>";
                $_SESSION["process"] = null;
        }
    ?>
</body>

</html>