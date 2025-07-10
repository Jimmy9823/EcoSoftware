<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de puntos de reciclaje</title>
</head>
<body>
  <!-- modal para registrar un punto de reciclaje -->
<div class="modal fade" id="puntoModal" tabindex="-1" aria-labelledby="puntoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="puntoModalLabel">
          <i class="fas fa-map-marker-alt me-2"></i>Nuevo Punto de Reciclaje
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

        <form action="../controllers/controladorRegistrarPunto.php" method="POST" class="card p-4 shadow">

      <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nombre del punto</label>
            <input type="text" name="nombre" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Dirección completa</label>
            <input id="direccion-input" type="text" name="direccion" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Horario</label>
            <input type="text" name="horario" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">¿Ofrece recompensa?</label>
            <select name="recompensa" class="form-select" required>
              <option value="">Selecciona una opción</option>
              <option value="sí">Sí</option>
              <option value="no">No</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Tipo de residuo aceptado</label>
            <select name="tipo_residuo" class="form-select" required>
              <option value="">Selecciona una opción</option>
              <option value="Papel">Papel</option>
              <option value="Cartón">Cartón</option>
              <option value="Plástico">Plástico</option>
              <option value="Vidrio">Vidrio</option>
              <option value="Metal">Metal</option>
              <option value="Orgánicos">Orgánicos</option>
              <option value="Electrónicos">Electrónicos</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Descripción / Detalles</label>
            <textarea name="otro" class="form-control" rows="3" placeholder="¿Qué tipo de recompensa hay? ¿Horarios especiales? etc."></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen del punto</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
          </div>


          <!-- Ejemplo: Usuario_id, si tienes sesión, pon aquí el ID real -->
          <input type="hidden" name="usuario_id" value="1">

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Crear Punto de Reciclaje</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
  document.getElementById('direccion-input').addEventListener('blur', function() {
    const direccion = this.value.trim();
    if (direccion.length === 0) {
      document.getElementById('latitud').value = '';
      document.getElementById('longitud').value = '';
      return;
    }

    const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(direccion)}&limit=1&addressdetails=1&countrycodes=co`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (data && data.length > 0) {
          const place = data[0];
          document.getElementById('latitud').value = place.lat;
          document.getElementById('longitud').value = place.lon;
        } else {
          alert('No se encontró la ubicación, por favor ingresa una dirección válida.');
          document.getElementById('latitud').value = '';
          document.getElementById('longitud').value = '';
        }
      })
      .catch(error => {
        alert('Error al buscar la ubicación.');
        console.error(error);
      });
  });
</script>