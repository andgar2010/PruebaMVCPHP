<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD con PHP usando Programacion Orientada a Objetos</title>

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
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--[if lt IE 9]>
        <scriptsrc="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <scriptsrc="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Script first JQuery, then Toastr -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/toastr/build/toastr.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row pmd-card-title">
                    <div class="col-sm-8 col-md-8">
                        <br>
                        <h2 class="pmd-card-title-text" align="center">Listado de <strong>Cliente</strong></h2>
                    </div>
                    <!-- End div .col-sm-8 -->
                    <div class="col-sm-4 col-xs-6">
                        <br>
                        <a href="./create.php">
                            <button type="button" class="btn btn-info pmd-btn-raised pmd-floating-action-btn">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar cliente
                            </button>
                        </a>
                    </div>
                    <!-- End div .col-sm-4 -->
                </div>
                <!-- End div .row -->
                <hr>
            </div>
            <!-- End div .table-title -->

            <div class="container">
                <div class="row">
                    <div class="col-12 pmd-card pmd-card-title">
                        <div class="media-body">
                            <table class="table table-hover pmd-table">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>E-mail</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('./database.php');
                                    $clientes = new Database();
                                    $listado = $clientes->read();

                                    while ($row=mysqli_fetch_object($listado)) {
                                        $id         = $row->id;
                                        $nombres    = $row->nombres.' ' .$row->apellidos;
                                        $telefono   = $row->telefono;
                                        $direccion  = $row->direccion;
                                        $email      = $row->correo_electronico;
                                    ?>
                                    <tr>
                                        <td><?php echo $nombres;?></td>
                                        <td><?php echo $telefono;?></td>
                                        <td><?php echo $direccion;?></td>
                                        <td><?php echo $email;?></td>
                                        <td>
                                            <a href="./update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toogle="tooltip"><i class="material-icons">&#xE254</i></a>
                                            <a href="./delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toogle="tooltip"><i class="material-icons">&#xE872</i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End div.media-body  -->
                    </div>
                    <!-- End div.pmd-card pmd-card-title -->
                </div>
                <!-- End div .row -->
            </div>
            <!-- div .container -->
        </div>
        <!-- End div .table-wrapper  -->
    </div>
    <!-- End div .container -->

    <!-- Popper.js, then Bootstrap JS -->
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- Info: Bootstrap 4 incompatible  -->
    <script src="../node_modules/propellerkit/dist/js/bootstrap.min.js"></script>
    <!-- Info: Bootstrap 4 incompatible  -->

    <script src="../node_modules/propellerkit/dist/js/propeller.min.js"></script>
</body>

</html>