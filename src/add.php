<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<!--
    Basada Project  : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create read, Update, Delete)
    Author		    : Obed Alvarado
    Website		    : http://www.obedalvarado.pw
    Blog            : http://obedalvarado.pw/blog/
    Email	 	    : info@obedalvarado.pw
-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title> Agregar datos empleado</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="../node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

    <!-- Propellerkit -->
    <link rel="stylesheet" href="../node_modules/propellerkit/dist/css/bootstrap.min.css">
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
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include('nav.php');?>
    </nav><!-- End Navbar  -->
    <div class="container">
        <div class="content">
        <h2>Datos del empleados &raquo; Agregar datos</h2>
        <hr>
        <?php
        if (isset($_POST['add'])){
            $codigo             = mysqli_real_escape_string($con, (strip_tags($_POST['codigo'], ENT_QUOTES))); //Escapando caracteres
            $nombres            = mysqli_real_escape_string($con, (strip_tags($_POST['nombres'], ENT_QUOTES))); //Escapando caracteres
            $lugar_nacimiento   = mysqli_real_escape_string($con, (strip_tags($_POST['lugar_nacimiento'], ENT_QUOTES))); //Escapando caracteres
            $fecha_nacimiento   = mysqli_real_escape_string($con, (strip_tags($_POST['fecha_nacimiento'], ENT_QUOTES))); //Escapando caracteres
            $direccion          = mysqli_real_escape_string($con, (strip_tags($_POST['direccion'], ENT_QUOTES))); //Escapando caracteres
            $telefono           = mysqli_real_escape_string($con, (strip_tags($_POST['telefono'], ENT_QUOTES))); //Escapando caracteres
            $puesto             = mysqli_real_escape_string($con, (strip_tags($_POST['puesto'], ENT_QUOTES))); //Escapando caracteres
            $estado             = mysqli_real_escape_string($con, (strip_tags($_POST['estado'], ENT_QUOTES))); //Escapando caracteres
            $sql_cek = "SELECT * FROM empleados WHERE codigo = '$codigo'";
            $cek =  mysqli_query($con,$sql_cek);
            if (mysqli_num_rows($cek) == 0) {
                $sql_insert = "INSERT INTO empleados (codigo, nombres, lugar_nacimiento, fecha_nacimiento, direccion, telefono, puesto, estado)
                                                        VALUES('$codigo', '$nombres', '$lugar_nacimiento', '$fecha_nacimiento', '$direccion', '$telefono', '$puesto', '$estado')";
                $insert =  mysqli_query($con, $sql_insert) or die(mysqli_error());
                if ($insert){
                    /*echo '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Bien hecho!</strong> Los datos han sido guardados con éxito.
                        </div>';*/
                    echo '<script>toastr.success("Los datos han sido guardados con éxito.", "Bien hecho!", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
                }else {
                    /*echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error.</strong> No se pudo guardar los datos!
                    </div>';*/
                    echo '<script>toastr.error("No se pudo guardar los datos!", "Error", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
                }
            } else {
                /*echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error.</strong> código existe!
                </div>';*/
                echo '<script>toastr.error("código existe!", "Error", {timeOut: 6000, "closeButton": true, "progressBar": true})</script>';
            }
        }
        ?>

        <form class="form-horizontal" action="" method="POST">
                <!-- Form Group codigo -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" name="codigo" class="form-control" placeholder="Código" required>
                    </div>
                </div><!-- End Form Group codigo -->
                <!-- Form Group nombre -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                    </div>
                </div><!-- End Form Group nombre -->
                <!-- Form Group lugar_nacimiento -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Lugar de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="lugar_nacimiento" class="form-control" placeholder="Lugar de nacimiento" required>
                    </div>
                </div><!-- End Form Group lugar_nacimiento -->
                <!-- Form Group fecha_nacimiento -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
                    </div>
                </div><!-- End Form Group fecha_nacimiento -->
                <!-- Form Group direccion -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-3">
                        <textarea name="direccion" class="form-control" placeholder="Dirección" required></textarea>
                    </div>
                </div><!-- End Form Group direccion -->
                <!-- Form Group telefono -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-3">
                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
                    </div>
                </div><!-- End Form Group telefono -->
                <!-- Form Group puesto -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Puesto</label>
                    <div class="col-sm-3">
                        <input type="text" name="puesto" class="form-control" placeholder="Puesto" required>
                    </div>
                </div><!-- End Form Group puesto -->
                <!-- Form Group estado -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">
                        <select name="estado" class="form-control">
                            <option value=""> ----- </option>
                            <option value="1">Fijo</option>
                            <option value="2">Contratado</option>
                            <option value="3">Outsourcing</option>
                        </select>
                    </div>
                </div><!-- End Form Group estado -->
                <!-- Form btn -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="index.php" class="btn btn-smbtn-danger">Cancelar</a>
                    </div>
                </div><!-- Form btn -->
        </form> <!-- End Form -->
        </div><!-- End div.content -->
    </div><!-- End div .container -->

    <!-- Popper.js, then Bootstrap JS -->
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../node_modules/propellerkit/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/propellerkit/dist/js/propeller.min.js"></script>
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
        })
    </script>
</body>
</html>