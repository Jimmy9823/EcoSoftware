<?php
// Incluir el modelo de capacitaciones
include "../../models/capacitaciones.php";
// Crear una instancia de la clase capacitaciones
$capacitaciones = new capacitaciones();

// Obtener los datos enviados por POST desde el formulario
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$duracion = $_POST["duracion"];
$imagenActual = $_POST["imagen_actual"]; // Imagen que ya tenía la capacitación

// Verificar si se subió una nueva imagen
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
    // Obtener datos de la nueva imagen
    $nombreImagen = $_FILES["imagen"]["name"];
    $rutaTemporal = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = "../../views/img/" . $nombreImagen;

    // Intentar mover la imagen a la carpeta de destino
    if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
        // Si falla la subida, mostrar error y regresar
        echo "<script>alert('Error al subir la nueva imagen.'); history.back();</script>";
        exit;
    }
} else {
    // Si no se subió nueva imagen, mantener la imagen actual
    $nombreImagen = $imagenActual;  
}

// Llamar al método para actualizar la capacitación en la base de datos
$respuesta = $capacitaciones->editarCapacitacion($id, $titulo, $descripcion, $fecha, $duracion, $nombreImagen);

// Verificar el resultado de la operación
if ($respuesta instanceof Exception) {
    // Si hay error, mostrar mensaje y redirigir a página de error
    echo "<script>alert('Error de conexión, intente más tarde.'); location.href='../../views/500.html';</script>";
} else {
    // Si todo está bien, mostrar éxito y redirigir a la lista de capacitaciones
    echo "<script>alert('Actualización exitosa'); location.href='../../views/capacitacion.php';</script>";
}
?>


