<!-- MODAL EDITAR PERFIL -->
<div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i>Editar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/usuarios/editUsuario.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

          <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
          <input type="hidden" name="tipo_rol" value="<?php echo $datos['tipo_rol']; ?>">

          <div class="mb-3">
            <label class="form-label">Foto actual:</label><br>
            <img src="img/<?php echo ($datos['imagen_perfil'] ?? 'default.avif'); ?>" alt="Foto de perfil" width="100">

          </div>

          <div class="mb-3">
            <label class="form-label">Cambiar foto de perfil:</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required value="<?php echo htmlspecialchars($datos['nombre']); ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control" required value="<?php echo htmlspecialchars($datos['correo']); ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required value="<?php echo htmlspecialchars($datos['telefono']); ?>">
          </div>

          <div class="rol-ciudadano">
            <div class="mb-3">
              <label class="form-label">Dirección:</label>
              <input type="text" name="direccion" class="form-control" value="<?php echo htmlspecialchars($datos['direccion'] ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Barrio:</label>
              <input type="text" name="barrio" class="form-control" value="<?php echo htmlspecialchars($datos['barrio'] ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Localidad:</label>
              <input type="text" name="localidad" class="form-control" value="<?php echo htmlspecialchars($datos['localidad'] ?? ''); ?>">
            </div>
          </div>

          <div class="rol-reciclador">
            <div class="mb-3">
              <label class="form-label">Zona de trabajo:</label>
              <input type="text" name="zona" class="form-control" value="<?php echo htmlspecialchars($datos['zona_de_trabajo'] ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Horario:</label>
              <input type="text" name="horario" class="form-control" value="<?php echo htmlspecialchars($datos['horario'] ?? ''); ?>">
            </div>
          </div>

          <div class="rol-empresa">
            <div class="mb-3">
              <label class="form-label">Representante legal:</label>
              <input type="text" name="representante" class="form-control" value="<?php echo htmlspecialchars($datos['representante'] ?? ''); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Horario de operación:</label>
              <input type="text" name="horario_empresa" class="form-control" value="<?php echo htmlspecialchars($datos['horario'] ?? ''); ?>">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Contraseña (dejar vacío si no cambia):</label>
            <input type="password" name="contraseña" class="form-control">
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
// Mostrar u ocultar los campos según el rol
function mostrarCamposPorRol(rol) {
  document.querySelectorAll('.rol-ciudadano, .rol-reciclador, .rol-empresa').forEach(seccion => {
    seccion.style.display = 'none';
  });

  if (rol == 'Ciudadano') {
    document.querySelectorAll('.rol-ciudadano').forEach(s => s.style.display = 'block');
  } else if (rol == 'Reciclador') {
    document.querySelectorAll('.rol-reciclador').forEach(s => s.style.display = 'block');
  } else if (rol == 'Empresa') {
    document.querySelectorAll('.rol-empresa').forEach(s => s.style.display = 'block');
  }
}

// Al cargar el modal, muestra los campos del rol
mostrarCamposPorRol('<?php echo $datos['tipo_rol']; ?>');
</script>

