<?php include('conexion.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de empleados</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="../node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

    <!-- Propellerkit -->
    <!-- Info: Bootstrap 4 incompatible  -->
    <link rel="stylesheet" href="../node_modules/propellerkit/dist/css/bootstrap.min.css">
    <!-- Info: Bootstrap 4 incompatible  -->

    <link rel="stylesheet" href="../node_modules/propellerkit/dist/css/propeller.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="../node_modules/toastr/build/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--[if lt IE 9]>
        <scriptsrc="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <scriptsrc="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Script first JQuery, then Toastr -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include('nav.php');?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Lista de empleados</h2>
            <hr>

            <?php
            if (isset($_GET['aksi']) == 'delete') {
                $nik = mysqli_real_escape_string($con, (strip_tags($_GET['nik'], ENT_QUOTES))); // escaping, additionally removing everything that cloud be (html/javascript-) code
                $sql_cek = "SELECT * FROM empleados WHERE codigo = '$nik' ";
                $cek = mysqli_query($con, $sql_cek);
                if (mysqli_num_rows($cek) == 0) {
                    /* echo '<div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                No se encontraron datos.
                            </div>';*/
                            echo '<script>toastr.info("No se encontraron datos.", "Aviso", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
                        } else {
                            $sql_delete = "DELETE FROM empleados WHERE codigo='$nik'";
                            $delete = mysqli_query($con, $sql_delete);
                            if ($delete) {
                                /*echo '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dimiss="alert" aria-hidden="true">&times;</button>
                                Datos eliminado correctamente.
                                </div>';*/
                                echo '<script>toastr.success("Datos eliminado correctamente.", "Aviso", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
                            } else {
                                /*echo '<div class="alert alert-danger alert-dismissable>
                                <button type="button" class="close" data-dimiss"alert" aria-hidden="true">&times;</button>
                                Error, no se pudo eliminar los datos.
                                </div>';*/
                                echo '<script>toastr.error("No se pudo eliminar los datos.", "Error", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
                    }
                }
            }
            ?>


            <!-- FORM  -->
            <form class="form-inline" action="" method="get">
                <div class="form-group">
                    <select name="filter" class="form-control" onchange="form.submit()">
                        <option value="0">Filtros de datos de empleados</option>
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL ); ?>
                        <option value="1" <?php if($filter == 'Tetap') {echo 'selected';}?>>Fijo</option>
                        <option value="2" <?php if($filter == 'Kontrak') {echo 'selected';}?>>Contratado</option>
                        <option value="3" <?php if($filter == 'Outsourcing') {echo 'selected';}?>>Outsourcing</option>
                    </select>
                </div>
            </form><!-- END FORM -->
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Lugar de nacimiento</th>
                        <th>Fecha de nacimiento</th>
                        <th>Teléfono</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    if ($filter == 0) {
                        $sql_filter = "SELECT * FROM empleados ORDER BY codigo ASC";
                        $output_sql = mysqli_query($con, $sql_filter);
                    } else {
                        $sql_filter = "SELECT * FROM empleados WHERE estado = '$filter' ORDER BY codigo ASC";
                        $output_sql = mysqli_query($con, $sql_filter);
                    }

                    if (mysqli_num_rows($output_sql) == 0) {
                        echo'
                            <tr>
                                <td colspan="8">No hay datos</td>
                            </tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($output_sql)) {
                            echo'
                                <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$row['codigo'].'</td>
                                    <td>
                                        <a href="profile.php?nik='.$row['codigo'].'">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>'.
                                            $row['nombres'].
                                        '</a> </td>
                                    <td>'.$row['lugar_nacimiento'].'</td>
                                    <td>'. $row['fecha_nacimiento'].'</td>
                                    <td>'. $row['telefono'].'</td>
                                    <td>'. $row['puesto'].'</td>';

                            switch ($row['estado']) {
                                case 1:
                                    echo '
                                        <td>
                                            <span class="label label-success">Fijo</span>
                                        </td>';
                                    break;
                                case 2:
                                    echo '
                                        <td>
                                            <span class="label label-info">Contratado</span>
                                        </td>';
                                    break;
                                case 3:
                                    echo '
                                        <td>
                                            <span class="label label-warning">Outsourcing</span>
                                        </td>';
                                    break;
                                default:
                                    echo '
                                        <td>
                                            <span class="label label-warning">No seleccionado</span>
                                        </td>';
                                    break;
                            }

                            echo'
                                </td>
                                <td>
                                    <a href="edit.php?nik='.$row['codigo'].'" title="Editar datos" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>
                                    <a href="index.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'? \')" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
                                    </td>
                            </tr>';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <center>
            <p>&copy; Sistemas Web <?php echo date('Y');?></p>
        </center>
    </footer>

    <!-- Popper.js, then Bootstrap JS -->
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>

    <!-- Info: Bootstrap 4 incompatible  -->
    <script src="../node_modules/propellerkit/dist/js/bootstrap.min.js"></script>
    <!-- Info: Bootstrap 4 incompatible  -->

    <script src="../node_modules/propellerkit/dist/js/propeller.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</body>
</html>