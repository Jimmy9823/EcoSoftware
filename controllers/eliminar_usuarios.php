<?php
include '../models/usuarios.php';

if (isset($_GET['codigo'])) {
    $usuario = new usuarios();
    $codigo = $_GET['codigo'];
    $usuario->Eliminar($codigo);
    header('Location: ../views/administrador.php'); 
    exit;
}
?>