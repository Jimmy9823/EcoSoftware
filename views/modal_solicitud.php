
    <!-- Archivo: modal_solicitud.php -->
<div class="modal fade" id="solicitudModal" tabindex="-1" aria-labelledby="solicitudModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="solicitudModalLabel">
          <i class="fas fa-recycle me-2"></i>Nueva Solicitud de Recolección
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form id="formSolicitud" action="../controllers/registrarSolicitud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" id="idsolicitud" name="id">
            <label class="form-label">Tipo de residuo</label>
            <select name="tipo_res" id="">
              <option value="plastico" class="value" >Plástico </option>
              <option value="papel" class="value">Papel</option>
              <option value="carton" class="value">Cartón</option>  
              <option value="vidrio" class="value">Vidrio</option>
              <option value="metal" class="value">Metal</option>
              <option value="electrodomesticos" class="value">Electrodomésticos</option>
              <option value="orgánicos" class="value">Orgánicos</option>

            
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="text" name="cantidad" class="form-control" placeholder="especifique peso y tamaño" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Descripción (opcional)</label>
            <textarea name="descripccion" class="form-control" rows="3"></textarea>
          </div> 

          <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen">
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="btnSubmitSol">Enviar Solicitud</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!--Modal para eliminar solicitud-->
<div class="modal fade" id="eliminarsolicitudModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Eliminar Solicitud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/eliminar_solicitud.php" method="POST">
        <div class="modal-body">
          <p>¿Estás seguro que deseas eliminar esta solicitud?</p>
          <input type="hidden" name="id" id="idEliminarSol">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal para Aceptar Solicitud -->
<div class="modal fade" id="aceptarSolicitudModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Aceptar Solicitud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/aceptar_solicitud.php" id="formAceptar" method="POST">
        <div class="modal-body">
          <p>¿Estás seguro que deseas aceptar esta solicitud?</p>
          <input type="hidden" name="id" id="idAceptarSol">
          <input type="hidden" name="estado" id="AceptarEstado">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Aceptar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>
