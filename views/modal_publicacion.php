<!-- Archivo: modal_publicacion.php -->
<div class="modal fade" id="publicacionModal" tabindex="-1" aria-labelledby="publicacionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="publicacionModalLabel">
          <i class="fas fa-newspaper me-2"></i>Nueva Publicación
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form action="../controllers/crear_publicacion.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required placeholder="Ej: Reciclaje en tu comunidad">
          </div>

          <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="contenido" class="form-control" rows="5" required placeholder="Comparte la información de la noticia o artículo..."></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen destacada</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select name="categoria" class="form-select" required>
              <option value="">Seleccionar categoría</option>
              <option value="Noticias">Noticias</option>
              <option value="Blog">Blog</option>
              <option value="Educación">Educación</option>
              <option value="Eventos">Eventos</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Publicar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>
