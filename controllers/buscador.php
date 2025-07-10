<?php
// controllers/actualizarUsuarios.php
session_start();
include '../models/usuarios.php';
$usuario = new usuarios();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dato'], $_POST['valor'])) {
    $filtro   = $_POST['dato'];
    $valor    = $_POST['valor'];
    $usuarios = $usuario->ConsultaEspecifica($filtro, $valor);
    
} else {
    $usuarios = $usuario->ConsultaGeneral();
}
?>
