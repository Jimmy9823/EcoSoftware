<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de modulos</title>
</head>
<body>
    <!-- Archivo: modal_modulo.php -->
<div class="modal fade" id="moduloModal" tabindex="-1" aria-labelledby="moduloModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="moduloModalLabel">
          <i class="fas fa-book me-2"></i>Agregar Módulo
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/crear_modulo.php" method="POST">
        <div class="modal-body">

          
          <input type="hidden" name="capacitacion_id" id="modulo_capacitacion_id" value="">

          <div class="mb-3">
            <label for="titulo_modulo" class="form-label">Título del módulo</label>
            <input type="text" name="titulo_modulo" id="titulo_modulo" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="contenido" class="form-label">Contenido / descripción</label>
            <textarea name="contenido" id="contenido" class="form-control" rows="4" required></textarea>
          </div>

          <div class="mb-3">
            <label for="orden" class="form-label">Orden del módulo</label>
            <input type="number" name="orden" id="orden" class="form-control" min="1" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar módulo</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>