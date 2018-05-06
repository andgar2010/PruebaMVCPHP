<!DOCTYPE html>
<html lang="en">

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
                    <div class="col-sm-4">
                        <a href="./index.php" class="btn btn-info add-new">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
                        </a>
                    </div>
                    <!-- End div .col-sm-4 -->
                    <div class="col-sm-4 col-md-4">
                        <br><h2 class="pmd-card-title-text" align="center">Agregar <strong>Cliente</strong></h2>
                    </div>
                    <!-- End div .col-sm-8 -->
                </div>
                <!-- End div .row -->
                <hr>
            </div>
            <!-- End div .table-title -->

            <div class="container">
                <div class="row">
                    <div class="col-12 pmd-card pmd-card-title">
                        <div class="media-body">
                            <form class="" action="" method="post">
                                <div class="row">
                                    <!-- <div class="pmd-z-depth"> -->
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 pmd-textfield pmd-textfield-floating-label">
                                        <label class="control-label">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{3,48}"
                                            title="Por favor ingresa correctamente su primer nombre y si tiene segundo nombre"
                                            required>
                                        <span class="pmd-textfield-focused"></span>
                                    </div>
                                    <!-- </div> -->
                                    <!-- End div nombres -->
                                    <!-- <div class="pmd-z-depth"> -->
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 pmd-textfield pmd-textfield-floating-label">
                                        <label class="control-label" for="">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" pattern="[A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{3,48}"
                                            title="Por favor ingresa correctamente su completo apellido" required>
                                        <span class="pmd-textfield-focused"></span>
                                    </div>
                                    <!-- </div> -->
                                    <!-- End div apellidos -->
                                    <!-- <div class="pmd-z-depth"> -->
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 pmd-textfield pmd-textfield-floating-label">
                                        <label for="" class="control-label">Correo electronico:</label>
                                        <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" title="Por favor ingresa correctamente su correo electrónico"
                                            pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*${6,40}"
                                            required>
                                        <span class="pmd-textfield-focused"></span>
                                    </div>
                                    <!-- </div> -->
                                    <!-- End div correo_electronico -->
                                </div>
                                <!-- End Row 1 -->
                                <div class="row">
                                    <!-- <div class="pmd-z-depth"> -->
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pmd-textfield pmd-textfield-floating-label">
                                        <label for="" class="control-label">Dirección:</label>
                                        <textarea type="text" name="direccion" id="direccion" class="form-control" pattern="[A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{3,255}"
                                            title="Por favor ingresa correctamente su dirección" required></textarea>
                                        <span class="pmd-textfield-focused"></span>
                                    </div>
                                    <!-- </div> -->
                                    <!-- End div direccion -->
                                </div>
                                <!-- End Row 2 -->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-1 col-md-5 col-lg-7"></div>
                                    <div class="col-sm-5 col-md-3 col-lg-2">
                                        <div class="pmd-z-depth-2">
                                            <button type="submit" name="submit" id="submit" class="btn btn-block btn-success">Guardar datos</button>
                                            <!-- <input class="btn btn-success" type="submit" name="submit" id="submit" value="Guardar datos"> -->
                                            <!-- End div Guardar Datos-->
                                        </div>
                                        <!-- End div.depth -->
                                    </div>
                                    <!-- End Button Guardar datos -->
                                    <div class="col-sm-1 col-md-1">&nbsp;</div>
                                    <div class="col-sm-5 col-md-3 col-lg-2">
                                        <div class="pmd-z-depth-2">
                                            <button type="button" name="" id="cancelar" class="btn btn-block btn-danger">Cancelar</button>
                                            <!-- <input class="btn btn-success" type="submit" name="submit" id="submit" value="Guardar datos"> -->
                                            <!-- End div Cancelar -->
                                        </div>
                                        <!-- End div.depth -->
                                    </div>
                                    <!-- End Button Cancelar  -->
                                </div>
                                <!-- End Row 3 -->
                                <br>
                            </form>
                            <!-- End form -->
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