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
    <title>Home</title>
    <script src="https://kit.fontawesome.com/89da924aef.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.3.2/css/searchBuilder.dataTables.min.css">
    
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
                                    <i class="fas fa-info-circle"></i> 
                                    Lista de pacientes
                                </h6>
                            </div>

                            <div class="card-body border-bottom-primary">
                                <?php
                                    require_once "DAL/pacientes.php";
                                    $resultado = ObtenerPacientes();
                                
                                    echo "<table id='pacientes' class='table table-hover' width='100%'>";
                                    echo "<thead class='bg-dark text-white'>";
                                    echo "<tr>";
                                    echo "<th>Cedula</th>";
                                    echo "<th>Nombre</th>";
                                    echo "<th>Apellidos</th>";
                                    echo "<th>Correo</th>";
                                    echo "<th>Telefono</th>";
                                    echo "<th>Accion</th>";
                                    echo "</tr>";
                                    echo "</thead>";

                                    if($resultado->num_rows > 0){
                                        echo "<tbody class='text-dark'>";
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>{$row['cedula']}</td>";
                                            echo "<td>{$row['nombre']}</td>";
                                            echo "<td>{$row['apellidos']}</td>";
                                            echo "<td>{$row['correo']}</td>";
                                            echo "<td>{$row['telefono']}</td>";
                                            echo "<td><a class='btn btn-sm btn-success' href=\"ModificarPaciente.php?id={$row['cedula']}\"><i class='fas fa-pencil-alt'></i></a></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                    }
                                ?>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var gvregistroTable = $("#pacientes").DataTable({
                "pageLength": 10,
                "ordering": true,
                "lengthMenu": [10, 15, 25, 50, 100],   
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                buttons: [],
                dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<ip>'
            });
        });
    </script>
    <?php 
        if(isset($_SESSION["process"]) && $_SESSION["process"] == "success"){
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Se ha modificado el paciente correctamente',  
                })</script>'";
                $_SESSION["process"] = null;
        }
        else if(isset($_SESSION["process"]) && $_SESSION["process"] == "failed"){
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: 'No hemos podido ingresar el paciente',  
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