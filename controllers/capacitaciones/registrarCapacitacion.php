<?php
// Incluir el modelo de capacitaciones
include "../../models/capacitaciones.php";

// Crear una instancia de la clase capacitaciones
$capacitaciones = new capacitaciones();

// Validar si se envió el archivo de imagen correctamente
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
    
    // Obtener datos de la imagen
    $nombreImagen = $_FILES["imagen"]["name"];
    $rutaTemporal = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = "../../views/img/" . $nombreImagen;

    // Mover la imagen a la carpeta final
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        
        // Registrar la capacitación
        $respuesta = $capacitaciones->registrarCapacitacion(
            $_POST["titulo"],
            $_POST["descripcion"],
            $_POST["fecha"],
            $_POST["duracion"],
            $nombreImagen
        );

        // Verificar si el registro fue exitoso
        if ($respuesta instanceof Exception) {
            // Error en la base de datos
            echo "<script>
                    alert('Error de conexión, intente más tarde');
                    location.href='../../views/500.html';
                  </script>";
                  
        } else {
            // Registro exitoso
            echo "<script>
                    alert('Registro exitoso, nueva capacitación registrada');
                    location.href='../../views/capacitacion.php';
                  </script>";
        }
    } else {
        // Error al mover la imagen al servidor
        echo "<script>alert('Error al mover la imagen al servidor.');</script>";
    }
} else {
    // No se subió imagen o hubo error en la carga
    echo "<script>alert('No se subió ninguna imagen o hubo un error al cargarla.');</script>";
}
?>