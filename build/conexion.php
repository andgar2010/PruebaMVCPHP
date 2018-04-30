<?php
/*Datos de conexion a la base de datos */
$db_host = 'localhost';         // Host de la base de datos, generalmente suele ser "localhost"
$db_user = 'root';              // Nombre de usuario de la base de datos.
$db_pass = '';                  // Contraseña del usuario de la base de datos
$db_name = 'test_empleados';    // Nombre de la base de datos que utilizara para la tabla 'empleados'

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo 'No se puede conectar a la base de datos : ' . mysqli_connect_error();
}
?>