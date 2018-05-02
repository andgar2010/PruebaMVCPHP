<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de empleados</title>
    <!--
        Basada proyecto de Obed Alvarado
        Website: www.obedalvarado.pw
        Blog: www.obedalvarado.pw/blog
        Email: info@obedalvarado.pw
    -->

    <!-- Bootstrap CSS 3.3.7 compiled and minified CSS & JS-->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- Bootstrap Datapicker -->
    <link rel="stylesheet" href="../node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

    <!-- Propellerkit -->
    <link rel="stylesheet" href="../node_modules/propellerkit/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/propellerkit/dist/css/propeller.min.css">

    <!--Custom CSS nav-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--[if it IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include('nav.php');?>
    </nav><!-- End Nav -->

    <!-- div .container -->
    <div class="container">
        <!-- div content -->
        <div class="content">
            <h2>Datos de empleados &raquo; Editar datos</h2>
            <hr>
            <?php
                $nik = mysqli_real_escape_string($con, (strip_tags($_GET['nik'], ENT_QUOTES)));
                $sql_query = "SELECT * FROM empleados WHERE codigo = '$nik'";
                $sql = mysqli_query($con, $sql_query);
                if (mysqli_num_rows($sql) == 0) {
                    header("Location: index.php");
                } else {
                    $row = mysqli_fetch_assoc($sql);
                }

                if (isset($_POST['save'])) {
                    $codigo           = mysqli_real_escape_string($con, (strip_tags($_POST['codigo'], ENT_QUOTES))); //Escapando caracteres
                    $nombres          = mysqli_real_escape_string($con, (strip_tags($_POST['nombres'], ENT_QUOTES))); //Escapando caracteres
                    $lugar_nacimiento = mysqli_real_escape_string($con, (strip_tags($_POST['lugar_nacimiento'], ENT_QUOTES))); //Escapando caracteres
                    $fecha_nacimiento = mysqli_real_escape_string($con, (strip_tags($_POST['fecha_nacimiento'], ENT_QUOTES))); //Escapando caracteres
                    $direccion        = mysqli_real_escape_string($con, (strip_tags($_POST['direccion'], ENT_QUOTES))); //Escapando caracteres
                    $telefono         = mysqli_real_escape_string($con, (strip_tags($_POST['telefono'], ENT_QUOTES))); //Escapando caracteres
                    $puesto           = mysqli_real_escape_string($con, (strip_tags($_POST['puesto'], ENT_QUOTES))); //Escapando caracteres
                    $estado           = mysqli_real_escape_string($con, (strip_tags($_POST['estado'], ENT_QUOTES))); //Escapando caracteres
                    $sql_update       = "UPDATE empleados SET
                                            nombres          = '$nombres',
                                            lugar_nacimiento = '$lugar_nacimiento',
                                            fecha_nacimiento = '$fecha_nacimiento',
                                            direccion        = '$direccion',
                                            telefono         = '$telefono',
                                            puesto           = '$puesto',
                                            estado           = '$estado'
                                        WHERE codigo         = '$nik'";
                    $update = mysqli_query($con, $sql_update) or die(mysqli_error());

                    if ($update) {
                        header("Location: edit.php?nik=".$nik."&pesan=sukses");
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
                                Error, no se pudo guardar los datos
                              </div>';
                    }
                }

                if (isset($_GET['pesan']) == 'sukses' ) {
                    echo '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>Los datos han sido guardados con éxito.
                        </div>';
                }
            ?>

            <!-- FORM -->
            <form class="form-horizontal" action="" method="post">
                <!-- form group CODIGO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" name="codigo" value="<?php echo $row['codigo'];?>" class="form-control" placeholder="NIK" required>
                    </div>
                </div><!-- END form group CODIGO -->

                <!-- form group NOMBRES -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombres" value="<?php echo $row['nombres'];?>" class="form-control" placeholder="Nombres" required>
                    </div>
                </div><!-- END form group NOMBRES -->

                <!-- form group LUGAR DE NACIMIENTO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Lugar de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="lugar_nacimiento" value="<?php echo $row['lugar_nacimiento'];?>" class="form-control" placeholder="Lugar de nacimiento" required>
                    </div>
                </div><!-- END form group LUGAR DE NACIMIENTO -->

                <!-- form group FECHA DE NACIMIENTO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Fecha de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'];?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
                    </div>
                </div><!-- END form group FECHA DE NACIMIENTO -->

                <!-- form group DIRECCION -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-3">
                        <input type="text" name="direccion" value="<?php echo $row['direccion'];?>" class="form-control" placeholder="Dirección" required>
                    </div>
                </div><!-- END form group DIRECCION -->

                <!-- form group TELEFONO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-3">
                        <input type="text" name="telefono" value="<?php echo $row['telefono'];?>" class="form-control" placeholder="Teléfono" required>
                    </div>
                </div><!-- END form group TELEFONO -->

                <!-- form group PUESTO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Puesto</label>
                    <div class="col-sm-3">
                        <input type="text" name="puesto" value="<?php echo $row['puesto'];?>" class="form-control" placeholder="Puesto" required>
                    </div>
                </div><!-- END form group PUESTO -->

                <!-- form group ESTADO -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">
                        <select classs="form-control" name="estado" id="">
                            <option value="">Selecciona estado</option>
                            <option value="1" <?php if($row['estado'] == 1) { echo 'selected' ;}?>>Fijo</option>
                            <option value="2" <?php if($row['estado'] == 2) { echo 'selected' ;}?>>Contrado</option>
                            <option value="3" <?php if($row['estado'] == 3) { echo 'selected' ;}?>>Outsourcing</option>
                        </select>
                    </div>
                </div><!-- END form group ESTADO -->

                <!-- form group SUBMIT -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div><!-- END form group SUBMIT -->
            </form><!-- END FORM -->
        </div><!-- End div content -->
    </div><!-- End div .container -->

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
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