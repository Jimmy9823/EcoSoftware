
<div class="modal fade" id="rutaModal" tabindex="-1" aria-labelledby="rutaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="rutaModalLabel">
          <i class="fas fa-route me-2"></i>Nueva Ruta de Recolección
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/crear_ruta.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nombre de la ruta</label>
            <input type="text" name="nombre_ruta" class="form-control" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Fecha programada</label>
              <input type="date" name="fecha" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Hora de inicio</label>
              <input type="time" name="hora" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Direcciones para la ruta</label>
            <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">

              
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Dirección de inicio de la ruta</label>
            <select name="inicio_ruta" class="form-select" required>
              <option value="">Selecciona la dirección inicial</option>
              <?php foreach ($solicitudes_aceptadas as $solicitud): ?>
                <option value="<?= $solicitud['ubicacion'] ?>">
                  <?= $solicitud['ubicacion'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>


        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Crear Ruta</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<