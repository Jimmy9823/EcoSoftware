<?php
// Incluir el modelo de inscripción
require '../models/inscripcion.php';

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['id'];

// Crear una instancia de la clase Inscripcion
$inscripcion = new Inscripcion();

// Consultar las capacitaciones del usuario
$lista = $inscripcion->consultarCapacitacionesUsuario($id_usuario);
?>