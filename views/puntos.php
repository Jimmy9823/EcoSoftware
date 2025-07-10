<?php
include "../models/punto.php";

$punto = new PuntoReciclaje();
$lista = $punto->ConsultaGeneral();
?>

<!-- Tabla de puntos -->
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Dirección</th>
      <th>Horario</th>
      <th>Tipo Residuo</th>
      <th>Descripción</th>
      <th>Latitud</th>
      <th>Longitud</th>
      <th>Imagen</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($lista as $registro): ?>
      <tr>
        <td><?= $registro[0] ?></td>
        <td><?= htmlspecialchars($registro[1]) ?></td>
        <td><?= htmlspecialchars($registro[2]) ?></td>
        <td><?= htmlspecialchars($registro[3]) ?></td>
        <td><?= htmlspecialchars($registro[4]) ?></td>
        <td><?= htmlspecialchars($registro[5]) ?></td>
        <td><?= htmlspecialchars($registro[6]) ?></td>
        <td><?= htmlspecialchars($registro[7]) ?></td>
        <td>
          <?php if(!empty($registro[8])): ?>
            <img src="../<?= htmlspecialchars($registro[8]) ?>" alt="Imagen" style="max-width: 80px;">
          <?php else: ?>
            No hay imagen
          <?php endif; ?>
        </td>
        <td>
          <!-- Botón Editar -->
          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal<?= $registro[0] ?>">Editar</button>

          <!-- Botón Eliminar -->
          <a href="../controllers/controladorEliminarPunto.php?id=<?= $registro[0] ?>" 
             onclick="return confirm('¿Seguro que deseas eliminar este punto?');" 
             class="btn btn-danger btn-sm">Eliminar</a>
        </td>
      </tr>

      <!-- Modal de edición -->
      <div class="modal fade" id="editarModal<?= $registro[0] ?>" tabindex="-1" aria-labelledby="editarModalLabel<?= $registro[0] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <div class="modal-header">
              <h5 class="modal-title" id="editarModalLabel<?= $registro[0] ?>">
                Editar Punto: <?= htmlspecialchars($registro[1]) ?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form action="../controllers/controladorActualizarPunto.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $registro[0] ?>">

                <div class="mb-3">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($registro[1]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Dirección</label>
                  <input type="text" name="direccion" class="form-control" value="<?= htmlspecialchars($registro[2]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Horario</label>
                  <input type="text" name="horario" class="form-control" value="<?= htmlspecialchars($registro[3]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Tipo de Residuo</label>
                  <input type="text" name="tipo_residuo" class="form-control" value="<?= htmlspecialchars($registro[4]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Descripción</label>
                  <textarea name="descripcion" class="form-control"><?= htmlspecialchars($registro[5]) ?></textarea>
                </div>

                <div class="mb-3">
                  <label>Latitud</label>
                  <input type="text" name="latitud" class="form-control" value="<?= htmlspecialchars($registro[6]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Longitud</label>
                  <input type="text" name="longitud" class="form-control" value="<?= htmlspecialchars($registro[7]) ?>" required>
                </div>

                <div class="mb-3">
                  <label>Imagen nueva (opcional)</label>
                  <input type="file" name="imagen" class="form-control">
                  <small class="form-text text-muted">Si no subes imagen, se mantendrá la actual.</small>
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
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Agregar Bootstrap CSS y JS en tu <head> o antes del cierre de </body> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
