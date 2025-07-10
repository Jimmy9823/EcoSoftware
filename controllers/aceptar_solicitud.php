<?php
// Incluir el modelo de capacitaciones
include "../models/solicitudesModel.php";

// Crear una instancia de la clase capacitaciones
$solicitud = new solicitud();

// Obtener el ID de la capacitación a eliminar desde el formulario
$id = $_POST["id"];
// Llamar al método para eliminar la capacitación de la base de datos
$respuesta = $solicitud->Aceptar($id);

// Verificar si la operación fue exitosa
if ($respuesta != true) {
    // Si hay error, mostrar mensaje y redirigir a página de error
    echo "<script>
        alert('Error al cancelar la solicitud, intente más tarde.');
        location.href='../views/500.html';
    </script>";
} else if($respuesta == true){
    
    // Si la aceptación fue exitosa, mostrar confirmación y redirigir
    echo "<script>
        alert('Solicitud aceptada correctamente.');
        location.href='../views/dash_reciclador_empresa.php#solicitudes';
    </script>";
}
?>