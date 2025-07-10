<?php

// Verifica que el usuario esté logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../views/index.html");
    exit;
}

include "../models/conexion.php";

// Obtener el id de la sesión
$id = $_SESSION['id'];

// Buscar los datos del usuario
$consulta = $conexion->prepare("SELECT * FROM usuario WHERE id=?");
$consulta->execute([$id]);
$datos = $consulta->fetch(PDO::FETCH_ASSOC);

?>