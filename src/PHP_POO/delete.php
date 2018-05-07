<?php
include('database.php');
$cliente = new Database();
    if (isset($_GET['id'])) {
        $id  = intval($_GET['id']);
        $res = $cliente->delete($id);
        if ($res) {
            header('location:index.php');
        } else {
            echo 'Error al eliminar el registro';
        }
    }
?>