<?php
// Incluir el modelo de capacitaciones
include "../../models/capacitaciones.php";

// Crear una instancia de la clase capacitaciones
$capacitacion = new capacitaciones();


// Llamar al método para eliminar la capacitación de la base de datos
$respuesta = $capacitacion->eliminarCapacitacion($_GET["id"]);

// Verificar si la operación fue exitosa
if ($respuesta instanceof Exception) {
    // Si hay error, mostrar mensaje y redirigir a página de error
    echo "<script>
        alert('Error al eliminar, intente más tarde.');
        location.href='../../views/500.html';
    </script>";
} else {
    // Si la eliminación fue exitosa, mostrar confirmación y redirigir
    echo "<script>
        alert('Capacitación eliminada correctamente');
        location.href='../../views/capacitacion.php';
    </script>";
}
?>