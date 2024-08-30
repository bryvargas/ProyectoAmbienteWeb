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
    <title>Agregar especialidades</title>
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
                                    <i class="fas fa-pencil-alt"></i> 
                                    Modificar especialidad
                                </h6>
                            </div>

                            <div class="card-body border-bottom-primary">
                                <form action="php/especialidades/UpdateEspecialidad.php" method="POST">
                                    <?php

                                        require_once "DAL/especialidades.php";
                                        $resultado = ObtenerEspecialidadesById($_GET['id']);
                                        $datos = $resultado -> fetch_assoc();
                                    ?>
                                    <div class="row mb-4">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="idEspecialidad" class="form-label">Id Especialidad</label>
                                            <input type="text" 
                                                id="idEspecialidad" 
                                                name="idEspecialidad" 
                                                class="form-control" 
                                                pattern="^[0-9]+([,]?[0-9]+)*$"
                                                value="<?= $_GET['id'] ?>"
                                                required
                                                readonly />
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="Nombre" class="form-label">Nombre </label>
                                            <input type="text" 
                                                id="Nombre" 
                                                name="Nombre"
                                                value="<?= $datos['nombre'] ?>" 
                                                class="form-control" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col col-md-6 col-sm-12">
                                            <label for="descripcion" class="form-label" >Descripción</label>
                                            <input type="text" 
                                                id="descripcion" 
                                                name="descripcion" 
                                                value="<?= $datos['descripcion_puesto'] ?>"
                                                class="form-control" 
                                                required/>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-12">
                                            <a href="Especialidades.php" name="add" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-left"></i>
                                                </span>
                                                <span class="text">Regresar</span>
                                            </a>
                                        </div>    
                                        <div class="col col-md-6 col-sm-12">
                                            <button type="submit" name="add" class="btn btn-success btn-icon-split float-end">
                                                
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Modificar especialidad</span>
                                            </button>
                                        </div>    
                                    </div>
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
                text: 'Se ha modificado la especialidad correctamente',  
                }) </script>'";
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "failed"){
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: 'No hemos podido modificar la especialidad',  
                }) </script>";
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "badformat"){
            echo "<script> Swal.fire({
                icon: 'info',
                title: 'Oops...!',
                text: 'Parece ser que el correo no contiene un formato correcto',  
                }) </script>";
        }
    ?>
</body>
</html>