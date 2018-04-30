<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de empleados</title>

    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <style>
        .content {
			margin-top: 80px;
		}
    </style>

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
            if (isset($_GET['aksi']) == 'delete' ) {
                // escaping, additionally removing everything that cloud be (html/javascript-) code
                $nik = mysqli_real_escape_string($con, (strip_tags ($_GET['nik'], ENT_QUOTES) ) );
                $sql_cek = "SELECT * FROM empleados WHERE codigo = '$nik' ";
                $cek = mysqli_query($con, $sql_cek);
                if (mysqli_num_rows($cek) == 0) {
                    echo '<div class="alert info-alert alert-dismissable"> 
                                <button type="button class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                No se encontraron datos.
                            </div>';
                }
                else {
                    $sql_delete = "DELETE FROM empleados WHERE codigo='$nik'";
                    $delete = mysqli_query($con, $sql_delete);
                    if ($delete) {
                        echo '<div class="alert alert-success alert alert*dismissable">
                                    <button type="button" class="close" data-dimiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    Datos eliminado correctamente.
                                </div>';
                    } else {
                        echo 'div class="alert alert-danger alert-dismissable>
                                    <button type="button" class="close" data-dimiss"alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    Error, no se pudo eliminar los datos.
                                </div>
                                ';
                    }

                }
            }
            ?>
            <!-- END PHP serach mysql -->
            <!-- FORM  -->
            <form class="form-inline" action="" method="get">
                <div class="form-group">
                    <select name="filter" class="form-control" onchange="form.submit()" id="">
                        <option value="0">Filtros de datos de empleados</option>
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL ); ?>
                        <option value="1" <?php if($filter == 'Tetap') {echo 'selected';}?>>Fijo</option>
                        <option value="2" <?php if($filter == 'Kontrak') {echo 'selected';}?>>Contratado</option>
                        <option value="3" <?php if($filter == 'Outsourcing') {echo 'selected';}?>>Outsourcing</option>
                    </select>
                </div>
            </form>
            <!-- END FORM -->
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Lugar de nacimiento</th>
                        <th>Fecha de nacimiento</th>
                        <th>telefono</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    if ($filter) {
                        $sql_filter = "SELECT * FROM empleados WHERE estado = '$filter' ORDER BY codigo ASC";
                        $sql = mysqli_query($con, $sql_filter);
                    } else {
                        $sql_filter = "SELECT * FROM empleados ORDER BY codigo ASC";
                        $sql = mysqli_query($con, $sql_filter);
                    }
                    if (mysqli_num_rows($sql) == 0) {
                        echo'<tr>
                                <td colspan="8">No hay datos</td>
                            </tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo'
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['codigo'].'</td>
                                <td> 
                                    <a href="profile.php?nik='.$row['codigo'].'">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.
                                        $row['nombres'].
                                    '</a> </td>
                                <td>'.$row['lugar_nacimiento'].'</td>
                                <td>'. $row['fecha_nacimiento'].'</td>
                                <td>'. $row['telefono'].'</td>
                                <td>'. $row['puesto'].'</td>';

                            if ($row['estado'] == 1) {
                                echo '
                                <td>
                                    <span class="label label-success">Fijo</span>
                                </td>';
                            } else if ($row['estado'] == 2) {
                                echo '
                                <td>
                                    <span class="label label-info">Contratado</span>
                                </td>';
                            } else if ($row['estado'] == 3) {
                                echo '
                                <td>
                                    <span class="label label-warning">Outsourcing</span>
                                </td>';
                            }

                            echo'
                                </td>
                                <td>
                                    <a href="edit.php?nik='.$row['codigo'].'" title="Editar datos" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>
                                    <a href="index.php?aksi?=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'? \')" class="btn btn-danger btn-sm">
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
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>