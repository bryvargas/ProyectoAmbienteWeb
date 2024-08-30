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
    <title>Agregar empleados</title>
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
                    <div class="card mb-3">
                        <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-plus"></i> 
                                    Agregar empleado
                                </h6>
                            </div>

                            <div class="card-body border-bottom-primary">
                                <form action="php/empleados/addEmpleado.php" method="POST">
                                    <div class="row mb-4">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="idEmpleado" class="form-label">Cedula</label>
                                            <input type="text" 
                                                id="idEmpleado" 
                                                name="idEmpleado" 
                                                class="form-control" 
                                                pattern="^[0-9]+([,]?[0-9]+)*$"
                                                placeholder="Ejemplo 111111111"
                                                required/>
                                        </div>
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="especialidad" class="form-label">Especialidad</label>
                                            <select class="form-select" id="especialidad" name="especialidad">
                                                <?php                                                   
                                                    require_once "DAL/conexion.php";
                                                    
                                                    $conexion = getConnection();

                                                    $query = $conexion -> query ("SELECT * FROM `especialidad`");                                                    
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        echo '<option value="'.$valores['id_especialidad'].'">'.$valores['nombre'].'</option>';
                                                    }


                                                    closeConnection($conexion);
                                                ?>
                                            </select>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="Nombre" class="form-label">Nombre </label>
                                            <input type="text" 
                                                id="Nombre" 
                                                name="Nombre" 
                                                class="form-control" required/>
                                        </div>
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="Apellidos" class="form-label" >Apellidos</label>
                                            <input type="text" 
                                                id="Apellidos" 
                                                name="Apellidos" 
                                                class="form-control" required/>
                                        </div>  
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="genero" class="form-label">Genero</label>
                                            <select class="form-select" id="genero" name="genero">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="No define">No define</option>
                                            </select>
                                        </div>
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="correo" class="form-label" >Correo</label>
                                            <input type="email" 
                                                id="correo" 
                                                name="correo" 
                                                class="form-control" 
                                                required/>
                                        </div>  
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col col-md-4 col-sm-12">
                                            <label for="provincia" class="form-label">Provincia</label>
                                                <?php                                                   
                                                    require_once "DAL/conexion.php";
                                                    
                                                    $conexion = getConnection();

                                                    $query = $conexion -> query ("SELECT * FROM `provincia`");                                                    
                                                    echo '<select class="form-select" id="provincia" name="provincia">';
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        echo '<option value="'.$valores['id_PROVINCIA'].'">'.$valores['NOMBRE'].'</option>';
                                                    }
                                                    echo '</select>';

                                                    closeConnection($conexion);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col col-md-4 col-sm-12">
                                            <label for="canton" class="form-label">Canton</label>
                                            <?php                                                   
                                                require_once "DAL/conexion.php";
                                                
                                                $conexion = getConnection();

                                                $query = $conexion -> query ("SELECT * FROM `canton`");                                                    
                                                echo '<select class="form-select" id="canton" name="canton">';
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="'.$valores['id_CANTON'].'">'.$valores['NOMBRE'].'</option>';
                                                }
                                                echo '</select>';

                                                closeConnection($conexion);
                                            ?>
                                        </div>
                                        <div class="col col-md-4 col-sm-12">
                                            <label for="distrito" class="form-label">Distrito</label>
                                            <?php                                                   
                                                require_once "DAL/conexion.php";
                                                
                                                $conexion = getConnection();

                                                $query = $conexion -> query ("SELECT * FROM `distrito`");                                                    
                                                echo '<select class="form-select" id="distrito" name="distrito">';
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="'.$valores['id_DISTRITO'].'">'.$valores['NOMBRE'].'</option>';
                                                }
                                                echo '</select>';

                                                closeConnection($conexion);
                                            ?>
                                        </div> 
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="direccion" class="form-label" >Direccion</label>
                                            <input type="text" 
                                                id="direccion" 
                                                name="direccion" 
                                                class="form-control" 
                                                required/>
                                        </div>  
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="telefono" class="form-label">Telefono </label>
                                            <input type="text" 
                                                id="telefono" 
                                                name="telefono" 
                                                class="form-control" 
                                                pattern="^[0-9]+([,]?[0-9]+)*$"
                                                placeholder="Ejemplo 70701515"
                                                required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento </label>
                                            <input type="date" 
                                                id="fechaNacimiento" 
                                                name="fechaNacimiento" 
                                                class="form-control" 
                                                required/>
                                        </div>
                                    </div>

                                    <button type="submit" name="add" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Agregar empleado</span>
                                    </button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
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
                text: 'Se ha ingresado el empleado correctamente',  
                }) </script>'";
                $_SESSION["process"] = null;
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "failed"){
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: 'No hemos podido ingresar el empleado',  
                }) </script>";
                $_SESSION["process"] = null;
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "badformat"){
            echo "<script> Swal.fire({
                icon: 'info',
                title: 'Oops...!',
                text: 'Parece ser que el correo no contiene un formato correcto',  
                }) </script>";
                $_SESSION["process"] = null;
        }
    ?>
</body>
</html>