<?php
// Validar que el usuario tenga sesión activa
include "../validarSesion.php";

// Incluir el modelo de inscripción
include "../../models/Inscripcion.php";

// Obtener datos del formulario y sesión
$id_usuario = $_SESSION['id'];
$id_curso = $_POST['curso'] ?? null;
$fecha = date('Y-m-d'); // Fecha actual
$estado = 'Inscrito';

// Validar que se haya seleccionado un curso
if (!$id_curso) {
    echo '<script>
            alert("Curso inválido, intente nuevamente.");
            window.location.href = "../../views/capacitacion.php";
          </script>';
    exit;
}

// Crear instancia y registrar la inscripción
$inscripcion = new Inscripcion();
$resultado = $inscripcion->registrar($fecha, $estado, $id_curso, $id_usuario);

// Mostrar resultado de la inscripción
if ($resultado) {
    // Inscripción exitosa
    echo '<script>
            alert("Inscripción exitosa");
            window.location.href = "../../views/capacitacion.php";
          </script>';
} else {
    // Error en la inscripción
    echo '<script>
            alert("Error al inscribirte, intenta más tarde");
            window.location.href = "../../views/capacitacion.php";
          </script>';
}
exit;
?>