<!-- Modal Capacitación -->
<div class="modal fade" id="capacitacionModal" tabindex="-1" aria-labelledby="capacitacionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="capacitacionModalLabel">Nueva Capacitación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>


      <form id="formCapacitacion" action="../controllers/registrarCapacitacion.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input type="hidden" id="idCapacitacion" name="id">

          <div class="mb-3">
            <label class="form-label">Título de la capacitación</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Duración (horas)</label>
            <input type="number" class="form-control" name="duracion" min="1" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen">
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="btnSubmit">Registrar capacitación</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>




  <!--Modal para eliminar capacitación-->
<div class="modal fade" id="eliminarCapacitacionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Eliminar Capacitación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <p>¿Estás seguro que deseas eliminar esta capacitación?</p>
      </div>

      <div class="modal-footer">
        <!-- Aquí va el enlace que redirecciona con GET -->
        <a id="confirmarEliminar" class="btn btn-danger">Eliminar</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

