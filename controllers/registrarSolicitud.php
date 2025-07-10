<?php
// Incluir el modelo de capacitaciones
include "../models/solicitudesModel.php";
session_start();
$registrado_por = $_SESSION["id"];
// Crear una instancia de la clase capacitaciones
$solicitudesregistro = new solicitud();

// Validar si se envió el archivo de imagen correctamente
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
    // Obtener datos de la imagen subida
    $nombreImagen = $_FILES["imagen"]["name"];
    $rutaTemporal = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = "../views/img/" . $nombreImagen;

    // Intentar mover la imagen a la carpeta de destino
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        // Si la imagen se subió correctamente, registrar la capacitación
        $respuesta = $solicitudesregistro->Registro_solicitud(
            $registrado_por,
            $_POST["tipo_res"],
            $_POST["cantidad"],
            $_POST["descripccion"],
            $_POST["ubicacion"],
            $nombreImagen
        );

        // Verificar si el registro fue exitoso
        if ($respuesta instanceof Exception) {
            // Error en la base de datos
            echo "<script>
                    alert('Error de conexión, intente más tarde');
                    location.href='../views/500.html';
                  </script>";
        } else {
            // Registro exitoso
            echo "<script>
                    alert('Registro exitoso, nueva solicitud registrada');
                    location.href='../views/dashboard_ciudadano.php#solicitud';
                  </script>";
        }
    } else {
        // Error al mover la imagen al servidor
        echo "<script>alert('Error al mover la imagen al servidor.');</script>";
    }
} else {
    // No se subió imagen o hubo error en la carga
    echo 
    "<script>alert('No se subió ninguna imagen o hubo un error al cargarla.');
    location.href='../views/dashboard_ciudadano.php';
    </script>";
}
?>