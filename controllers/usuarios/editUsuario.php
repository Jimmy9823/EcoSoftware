<?php
// Validar que el usuario tenga sesión activa
require_once "../validarSesion.php";

// Incluir el modelo de usuarios
require_once "../../models/usuarios.php";

// Obtener datos del formulario
$id = $_SESSION['id'];  // ID del usuario desde la sesión
$tipo_rol = $_POST['tipo_rol'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$contraseña = !empty($_POST['contraseña']) ? $_POST['contraseña'] : null;

// Manejo de la imagen de perfil
$imagen_perfil = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $directorioDestino = "../../views/img/";
    $imagen_perfil = time() . "_" . basename($_FILES['foto']['name']);
    $ruta_completa = $directorioDestino . $imagen_perfil;

    // Mover la imagen subida
    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_completa)) {
        echo "<script>alert('Error al subir la imagen'); window.location.href='../../views/dashboard_ciudadano.php';</script>";
        exit;
    }
}

// Obtener datos adicionales específicos por rol
$direccion = $_POST['direccion'] ?? '';
$barrio = $_POST['barrio'] ?? '';
$localidad = $_POST['localidad'] ?? '';
$zona = $_POST['zona'] ?? '';
$horario = $_POST['horario'] ?? '';
$representante = $_POST['representante'] ?? '';
$horario_empresa = $_POST['horario_empresa'] ?? '';

$resultado = false;
$redirect = '../../views/login.html';

// Actualizar según el tipo de rol
switch ($tipo_rol) {
    case "Ciudadano":
        $usuario = new ciudadano();
        $resultado = $usuario->Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad, $contraseña, $imagen_perfil);
        $redirect = '../../views/dashboard_ciudadano.php';
        break;

    case "Reciclador":
        $usuario = new reciclador();
        $resultado = $usuario->Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $zona, $horario, $contraseña, $imagen_perfil);
        $redirect = '../../views/dash_reciclador_empresa.php';
        break;

    case "Empresa":
        $usuario = new empresa();
        $resultado = $usuario->Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad, $representante, $horario_empresa, $contraseña, $imagen_perfil);
        $redirect = '../../views/dash_reciclador_empresa.php';
        break;

    case "Administrador":
        $usuario = new administrador();
        $resultado = $usuario->Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $contraseña, $imagen_perfil);
        $redirect = '../../views/dashboard_admin.php';
        break;

    default:
        // Rol no válido
        echo "<script>alert('Rol no válido.'); window.location.href='../../views/login.html';</script>";
        exit;
}

// Mostrar resultado de la actualización
if ($resultado === true) {
    // Actualización exitosa
    echo "<script>alert('Perfil actualizado correctamente.'); window.location.href='$redirect';</script>";
} else {
    // Error en la actualización
    echo "<script>alert('Error al actualizar el perfil.'); window.location.href='$redirect';</script>";
}
?>