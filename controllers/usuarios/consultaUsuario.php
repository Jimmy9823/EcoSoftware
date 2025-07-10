<?php
// Incluir el modelo de usuarios
require_once __DIR__ . '/../../models/usuarios.php';

// Obtener el ID del usuario desde la sesión
$id = $_SESSION['id'];

// Crear instancia y consultar los datos del usuario
$usuario = new usuarios();
$datos = $usuario->Consulta($id);
?>
