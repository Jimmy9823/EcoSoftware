<?php
include '../controllers/validarSesion.php';

include "../controllers/consultaUsuario.php";
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    <title>Administrador</title>

</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="pt-4">
            <div class="container">
                <div class="card rounded-3 border p-3 pb-2">
                    <!-- Información del Administrador -->
                    <div class="d-sm-flex align-items-center">
                        <div class="avatar avatar-xl mb-2 mb-sm-0">
                            <!-- Falta que cargue la imagen del administrador desde la base de datos -->
                            <img class="avatar-img rounded circle" src="img/Administrador.jpg" alt="Foto de perfil"
                                style="    width: 100px; height: auto;padding-right: 10px;">
                        </div>
                        <div>
                            <h4 class="mb-1"><span class="fw-light">Hola</span>, <?php echo $datos['nombre']; ?></h4>
                            <p class="text-muted mb-0"><?php echo $datos['tipo_rol']; ?></p>
                        </div>


                        <button type="button" class="btn btn-outline-success mb-0 ms-auto flex-shrink-0"
                            data-bs-toggle="modal" data-bs-target="#editarPerfilModal"
                            onclick="mostrarCamposPorRol('<?php echo $datos['tipo_rol']; ?>')">
                            <i class="bi bi-person-fill-gear pe-1"></i>Editar Perfil
                        </button>
                    </div>
                    <!-- Menú móvil -->
                    <button class="btn btn-primary w-100 d-block d-xl-none mt-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#dashboardMenu" aria-controls="dashboardMenu">
                        <i class="bi bi-list"></i> Dashboard Menu
                    </button>

                    <!-- Menú de navegación -->
                    <div class="offcanvas-xl offcanvas-end mt-xl-3" tabindex="-1" id="dashboardMenu">
                        <div class="offcanvas-header border-bottom p-3">
                            <h5 class="offcanvas-title">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#dashboardMenu" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-3 p-xl-0">
                            <div class="navbar navbar-expand-xl">
                                <!-- Pestañas de navegación -->
                                <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active text-dark" id="dashboard-tab"
                                            data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab">
                                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="capacitaciones-tab" data-bs-toggle="tab"
                                            data-bs-target="#capacitaciones" type="button" role="tab">
                                            <i class="fas fa-graduation-cap me-2"></i>Capacitaciones
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="solicitudes-tab" data-bs-toggle="tab"
                                            data-bs-target="#solicitudes" type="button" role="tab">
                                            <i class="fas fa-clipboard-list me-2"></i>Solicitudes
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="recolecciones-tab" data-bs-toggle="tab"
                                            data-bs-target="#recolecciones" type="button" role="tab">
                                            <i class="fas fa-route me-2"></i>Recolecciones
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="noticias-tab" data-bs-toggle="tab"
                                            data-bs-target="#noticias" type="button" role="tab">
                                            <i class="fas fa-newspaper me-2"></i>Noticias
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido de las pestañas -->
                <div class="tab-content m-5" id="dashboardTabContent">

            <!-- Pestaña Dashboard -->
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
              <div class="row">
                <!-- Tarjetas de estadísticas -->
                <div class="col-md-4">
                  <div class="stat-card">
                    <h3>45</h3>
                    <p>Solicitudes Pendientes</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="stat-card">
                    <h3>128</h3>
                    <p>Recolecciones Completadas</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="stat-card">
                    <h3>23</h3>
                    <p>Puntos Activos</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pestaña Capacitaciones -->
            <div class="tab-pane fade" id="capacitaciones" role="tabpanel" aria-labelledby="capacitaciones-tab">

              <!-- Título y botón nueva capacitación -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4><i class="fas fa-graduation-cap text-success me-2"></i>Mis Capacitaciones</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#capacitacionModal"
                  onclick="limpiarFormulario()">
                  <i class="fas fa-plus me-2"></i> Nueva Capacitación
                </button>
              </div>

              <!-- Barra de búsqueda -->
              <form action="../controllers/consultarCapacitaciones.php" method="POST"
                class="d-flex align-items-center mb-4">
                <div class="search-bar">
                  <i class="fas fa-search"></i>
                  <input type="text" name="valor" class="form-control" placeholder="Buscar capacitaciones...">
                </div>
              </form>

              <!-- Incluir controlador para obtener capacitaciones -->
              <?php include '../controllers/consultarCapacitaciones.php'; ?>

              <!-- Lista de capacitaciones -->
              <section id="capacitaciones">
                <div class="row g-3">
                  <!-- Generar tarjetas dinámicamente -->
                  <?php foreach ($lista as $cap): ?>
                    <div class="col-12 col-md-6 col-lg-3 pb-5">
                      <div class="card">
                        <!-- Imagen de la capacitación -->
                        <img src="img/<?php echo htmlspecialchars($cap['imagen']); ?>" class="card-img-top" alt="Curso">
                        <div class="card-body d-flex flex-column">
                          <!-- Título -->
                          <h5 class="card-title"><?php echo htmlspecialchars($cap['nombre']); ?></h5>
                          <!-- Descripción -->
                          <p class="card-text text-muted small flex-grow-1">
                            <?php echo htmlspecialchars($cap['descripcion']); ?>
                          </p>
                          <!-- Botones de acción -->
                          <div class="d-flex justify-content-end gap-2 mt-3">
                            <!-- Botón Editar -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#capacitacionModal"
                              onclick="cargarCapacitacion('<?php echo $cap['id']; ?>', '<?php echo htmlspecialchars($cap['nombre']); ?>', '<?php echo htmlspecialchars($cap['descripcion']); ?>', '<?php echo $cap['fecha']; ?>', '<?php echo $cap['duracion']; ?>', '<?php echo $cap['imagen']; ?>')">
                              <i class="fas fa-edit"></i>
                            </button>
                            <!-- Botón Eliminar -->
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                              data-bs-target="#eliminarCapacitacionModal"
                              onclick="prepararEliminar('<?php echo $cap['id']; ?>')">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </section>
            </div>

            <!-- Pestaña Solicitudes -->

            <div class="tab-pane fade" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
                <!-- titulo y botón nueva solicitud -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4><i class="fas fa-graduation-cap text-success me-2"></i>Solicitudes</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#solicitudModal"
                  onclick="limpiarFormulario()">
                  <i class="fas fa-plus me-2"></i> Solicitar
                </button>
              </div>

              <!-- Barra de búsqueda -->
              <form action="../controllers/consultarSolicitudes.php" method="POST"
                class="d-flex align-items-center mb-4">
                <div class="search-bar">
                  <i class="fas fa-search"></i>
                  <input type="text" name="valor" class="form-control" placeholder="Buscar solicitud">
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Seleccione el filtro de búsqueda</label>
                <select name="dato" class="form-control">
                    <option value="id">Código</option>
                    <option value="tipo_residuo">Tipo de Residuo</option>
                </select>            
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
              </form>
               <!-- Incluir controlador para obtener solicitudes -->
              <?php include "../controllers/consulta_solicitudes.php"; ?>
              <!-- Aquí iría el contenido de las tarjetas de solicitud -->
            </div>
<!-- Lista de capacitaciones -->
              <section id="capacitaciones">
                <div class="row g-3">
                  <!-- Generar tarjetas dinámicamente -->
                  <?php foreach ($lista as $cap): ?>
                    <div class="col-12 col-md-6 col-lg-3 pb-5">
                      <div class="card">
                        <!-- Imagen de la 
                         itación -->
                        <img src="img/<?php echo htmlspecialchars($cap['imagen']); ?>" class="card-img-top" alt="Curso">
                        <div class="card-body d-flex flex-column">
                          <!-- Título -->
                          <h5 class="card-title"><?php echo htmlspecialchars($cap['nombre']); ?></h5>
                          <!-- Descripción -->
                          <p class="card-text text-muted small flex-grow-1">
                            <?php echo htmlspecialchars($cap['descripcion']); ?>
                          </p>
                          <!-- Botones de acción -->
                          <div class="d-flex justify-content-end gap-2 mt-3">
                            <!-- Botón Editar -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#solicitudModal"
                              onclick="cargarCapacitacion('<?php echo $cap['id']; ?>', '<?php echo htmlspecialchars($cap['nombre']); ?>', '<?php echo htmlspecialchars($cap['descripcion']); ?>', '<?php echo $cap['fecha']; ?>', '<?php echo $cap['duracion']; ?>', '<?php echo $cap['imagen']; ?>')">
                              <i class="fas fa-edit"></i>
                            </button>
                            <!-- Botón Eliminar -->
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                              data-bs-target="#eliminarsolicitudModal"
                              onclick="prepararEliminar('<?php echo $cap['id']; ?>')">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </section>
            </div>
            <!-- Pestaña Recolecciones -->
            <div class="tab-pane fade" id="recolecciones" role="tabpanel" aria-labelledby="recolecciones-tab">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4><i class="fas fa-route text-success me-2"></i>Mis Recolecciones</h4>
              </div>
              <!-- Contenido pendiente -->
            </div>

            <!-- Pestaña Noticias -->
            <div class="tab-pane fade" id="noticias" role="tabpanel" aria-labelledby="noticias-tab">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4><i class="fas fa-map-marker-alt text-success me-2"></i>Noticias</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#publicacionModal">
                  <i class="fas fa-plus me-2"></i> Nueva Publicación
                </button>
              </div>
              <!-- Contenido pendiente -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Incluir modales -->
   <?php include 'modal_capacitacion.php'; ?>
    <?php include 'modal_solicitud.php'; ?>








            <div class="accordion" id="accordionExample">
                <!-- ITEM 1 -->
                <div class="accordion-item" style="background-color:#1e1e1e;">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUsuarios">
                            Consulta de Usuarios
                        </button>
                    </h2>
                    <div id="collapseUsuarios" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="background-color:#1e1e1e;>
                        <?php
                        include "../views/buscador_usuarios.html";
                        echo "<hr>";
                        include "../controllers/consulta_usuarios.php";
                        ?>
                    </div>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class=" accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseRegistro" aria-expanded="false"
                                    aria-controls="collapseRegistro">
                                    Registro de Usuarios
                                </button>
                            </h2>
                            <div id="collapseRegistro" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php
                                    include "../views/usuarios_registro.html";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- ITEM 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">

                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSolicitud" aria-expanded="false"
                                    aria-controls="collapseSolicitud">
                                    Gestión de Solicitud
                                </button>
                            </h2>
                            <div id="collapseSolicitud" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php
                                    include "../controllers/consulta_solicitudes.php";
                                    include "../views/buscador_solicitudes.html";
                                    include "../views/modal_solicitud.php";

                                    include "../views/solicitudRecoleccion.html";


                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
        </section>
    </main>
    <script>
      


<?php 'footer.html'?>
</html>













