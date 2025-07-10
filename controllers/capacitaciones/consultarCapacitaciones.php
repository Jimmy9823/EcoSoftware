<?php
// Incluir el modelo de capacitaciones
require_once "../models/capacitaciones.php";

// Crear una instancia de la clase
$capacitacion = new capacitaciones();

// Obtener todas las capacitaciones de la base de datos
$lista = $capacitacion->ConsultaGeneral();
?>