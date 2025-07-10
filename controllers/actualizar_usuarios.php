<?php
include '../models/usuarios.php';
$usuario = new usuarios();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
  $usuario->Actualizar(
    $_POST['id'],
    $_POST['tipo_rol'],
    $_POST['nombre'],
    $_POST['correo'],
    $_POST['telefono'],
    
    $_POST['contraseña'],
    $_POST['imagen']
  );

  header('Location: ../views/administrador.php');
  exit;
} else {
  echo "Error: No se enviaron los datos correctamente.";
}
?>
