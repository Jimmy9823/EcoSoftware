<?php
// Incluir validación de sesión y consulta de usuario
include '../controllers/validarSesion.php';
include "../controllers/consultaUsuario.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Icono de la página -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon">

    <!-- CSS de Bootstrap, Font Awesome e Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS personalizados -->
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="css/capacitaciones.css">
    <link rel="stylesheet" href="css/global.css">


</head>

<body>
    <!-- Incluir header -->
    <?php include 'header.php'; ?>

    <script>// Manejo simple de tabs
        document.addEventListener('DOMContentLoaded', function () {
            // Activar dashboard por defecto
            document.getElementById('dashboard-tab').click();
        });
    </script>

    <main>
        <section class="pt-4">
            <div class="container">
                <div class="card rounded-3 border p-3 pb-2">

                    <!-- SECCIÓN: Información del usuario -->
                    <div class="d-sm-flex align-items-center">
                        <!-- Avatar del usuario -->
                        <div class="avatar avatar-xl mb-2 mb-sm-0">
                            <img class="avatar-img rounded-circle"
                                src="img/<?php echo ($datos['imagen_perfil'] ?? 'default.avif'); ?>"
                                alt="Foto de perfil">

                        </div>

                        <!-- Información básica del usuario -->
                        <div>
                            <h4 class="mb-1">
                                <span class="fw-light">Hola</span>, <?php echo $datos['nombre']; ?>
                            </h4>
                            <p class="text-muted mb-0"><?php echo $datos['tipo_rol']; ?></p>
                        </div>

                        <!-- Botón para editar perfil -->
                        <button type="button" class="btn btn-outline-success mb-0 ms-auto flex-shrink-0"
                            data-bs-toggle="modal" data-bs-target="#editarPerfilModal"
                            onclick="mostrarCamposPorRol('<?php echo $datos['tipo_rol']; ?>')">
                            <i class="bi bi-person-fill-gear pe-1"></i>Editar Perfil
                        </button>
                    </div>

                    <!-- SECCIÓN: Menú móvil -->
                    <button class="btn btn-primary w-100 d-block d-xl-none mt-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#dashboardMenu" aria-controls="dashboardMenu">
                        <i class="bi bi-list"></i> Menú
                    </button>

                    <!-- SECCIÓN: Menú de navegación -->
                    <div class="offcanvas-xl offcanvas-end mt-xl-3" tabindex="-1" id="dashboardMenu">
                        <div class="offcanvas-header border-bottom p-3">
                            <h5 class="offcanvas-title">Menú</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#dashboardMenu" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body p-3 p-xl-0">
                            <div class="navbar navbar-expand-xl">
                                <!-- Pestañas de navegación -->
                                <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">

                                    <!-- Pestaña Dashboard -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active text-dark" id="dashboard-tab"
                                            data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab">
                                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                        </button>
                                    </li>

                                    <!-- Pestaña Capacitaciones-->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="capacitaciones-tab" data-bs-toggle="tab"
                                            data-bs-target="#capacitaciones" type="button" role="tab">
                                            <i class="fas fa-graduation-cap me-2"></i>Capacitaciones
                                        </button>
                                    </li>

                                    <!-- Pestaña Solicitudes-->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="solicitudes-tab" data-bs-toggle="tab"
                                            data-bs-target="#solicitudes" type="button" role="tab">
                                            <i class="fas fa-clipboard-list me-2"></i>Solicitudes
                                        </button>
                                    </li>

                                    <!-- Pestaña Recolección-->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="recolecciones-tab" data-bs-toggle="tab"
                                            data-bs-target="#recolecciones" type="button" role="tab">
                                            <i class="fas fa-route me-2"></i>Recolecciones
                                        </button>
                                    </li>

                                    <!--Pestaña Puntos de Reciclaje-->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-dark" id="puntos-tab" data-bs-toggle="tab"
                                            data-bs-target="#puntos" type="button" role="tab">
                                            <i class="fas fa-map-marker-alt me-2"></i>Puntos de Reciclaje
                                        </button>
                                    </li>

                                    <!-- Pestaña Noticias-->
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

                    <!-- SECCIÓN: Contenido de las pestañas -->
                    <div class="tab-content m-5" id="dashboardTabContent">

                        <!-- PESTAÑA: Dashboard -->
                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard-tab">
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

                        <!-- PESTAÑA: Capacitaciones -->
                        <div class="tab-pane fade" id="capacitaciones" role="tabpanel"
                            aria-labelledby="capacitaciones-tab">

                            <!-- Título y botón nueva capacitación -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4>
                                    <i class="fas fa-graduation-cap icono me-2"></i>Mis Capacitaciones
                                </h4>
                            </div>

                            <!-- Barra de búsqueda -->
                            <form action="../controllers/consultarCapacitaciones.php" method="POST"
                                class="d-flex align-items-center mb-4">
                                <div class="search-bar">
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="valor" class="form-control"
                                        placeholder="Buscar capacitaciones...">
                                </div>
                            </form>

                            <!-- Incluir controlador para obtener capacitaciones inscritas  -->
                            <?php include '../controllers/inscripcion/consultaInscripcion.php'; ?>

                            <!-- Lista de capacitaciones -->
                            <section id="miscapacitaciones">
                                <div class="row g-3">
                                    <!-- Generar tarjetas dinámicamente -->
                                    <?php foreach ($lista as $cap): ?>
                                        <div class="col-12 col-md-6 col-lg-3 pb-5">
                                            <div class="card">
                                                <!-- Imagen de la capacitación -->
                                                <img src="img/<?php echo htmlspecialchars($cap['imagen']); ?>"
                                                    class="card-img-top" alt="Curso">

                                                <div class="card-body d-flex flex-column">
                                                    <!-- Título -->
                                                    <h5 class="card-title">
                                                        <?php echo htmlspecialchars($cap['nombre']); ?>
                                                    </h5>

                                                    <!-- Descripción -->
                                                    <p class="card-text text-muted small flex-grow-1">
                                                        <?php echo htmlspecialchars($cap['descripcion']); ?>
                                                    </p>

                                                    <!-- Estado y fecha -->
                                                    <p class="card-text text-muted small">
                                                        <b>Estado:</b>
                                                        <?php echo htmlspecialchars($cap['estado_curso']); ?><br>
                                                        <b>Fecha de Inscripción:</b>
                                                        <?php echo htmlspecialchars($cap['fecha_de_inscripcion']); ?>
                                                    </p>

                                                    <!-- Botón Iniciar -->
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <a href="404.html?id=<?php echo $cap['id']; ?>"
                                                            class="btn btn-primary btn-sm">
                                                            Iniciar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>


                        </div>

                        <!-- PESTAÑA: Solicitudes -->
                        <div class="tab-pane fade" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">

                            <!-- Título-->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4>
                                    <i class="fas fa-clipboard-list icono me-2"></i>Solicitudes de Recolección
                                </h4>

                            </div>

                            <!-- Barra de búsqueda -->
                            <form action="../controllers/consultarSolicitudesEmpresa.php" method="POST"
                                class="d-flex align-items-end gap-3 mb-4">
                                <!-- Selector de filtro -->
                                <div class="flex-shrink-0">
                                    <select name="dato" class="form-select">
                                        <option value="id">Código</option>
                                        <option value="estado_peticion">Estado de Petición</option>
                                    </select>
                                </div>

                                <!-- Campo de búsqueda -->
                                <div class="flex-grow-1">
                                    <input type="text" name="valor" class="form-control" placeholder="Buscar solicitud">
                                </div>

                                <!-- Botón -->
                                <div class="flex-shrink-0">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                                </div>
                            </form>

                            <!-- Incluir controlador para obtener solicitudes -->
                            <?php include "../controllers/consultarSolicitudesEmpresa.php"; ?>

                            <!-- Lista de solicitudes -->
                            <section id="solicitudes">
                                <div class="row g-3">
                                    <!-- Generar tarjetas dinámicamente -->
                                    <?php foreach ($solicitudes as $sol): ?>
                                        <div class="col-12 col-md-6 col-lg-3 pb-5">
                                            <div class="card">
                                                <!-- Imagen de la solicitud -->
                                                <img src="img/<?php echo htmlspecialchars($sol[7]); ?>" class="card-img-top"
                                                    alt="Solicitud">

                                                <div class="card-body d-flex flex-column">
                                                    <!-- Título -->
                                                    <h5 class="card-title">
                                                        <?php echo htmlspecialchars($sol[1]); ?>
                                                    </h5>

                                                    <!-- Descripción -->
                                                    <p class="card-text text-muted small flex-grow-1">
                                                        <?php echo htmlspecialchars($sol[3]); ?>
                                                    </p>

                                                    <!-- Botones de acción -->
                                                    <div class="d-flex justify-content-end gap-2 mt-3">
                                                        <!-- Botón aceptar solicitud -->
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#aceptarSolicitudModal"
                                                            onclick="aceptarSolicitud('<?php echo $sol[0]; ?>')">
                                                            <i class="fas fa-check"></i>
                                                        </button>

                                                        <!-- Botón Eliminar -->
                                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#eliminarsolicitudModal"
                                                            onclick="prepararEliminarSol('<?php echo $sol[0]; ?>')">
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

                        <!-- PESTAÑA: Recolecciones -->
                        <div class="tab-pane fade" id="recolecciones" role="tabpanel"
                            aria-labelledby="recolecciones-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4>
                                    <i class="fas fa-route icono me-2"></i>Mis Recolecciones
                                </h4>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#rutaModal">
                                    <i class="fas fa-plus me-2"></i> Crear Ruta
                                </button>
                            </div>
                            <!-- Contenido pendiente -->
                        </div>

                        <!-- PESTAÑA: Recolecciones -->
                        <div class="tab-pane fade" id="puntos" role="tabpanel" aria-labelledby="puntos-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4>
                                    <i class="fas fa-map-marker-alt icono me-2"></i>Mis Recolecciones
                                </h4>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#puntoModal">
                                    <i class="fas fa-plus me-2"></i> Registrar Punto
                                </button>
                            </div>
                            <!-- Contenido pendiente -->
                        </div>

                        <!-- PESTAÑA: Noticias -->
                        <div class="tab-pane fade" id="noticias" role="tabpanel" aria-labelledby="noticias-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4>
                                    <i class="fas fa-map-marker-alt icono me-2"></i>Noticias
                                </h4>
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#publicacionModal">
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
    <?php include 'modal_editar_perfil.php'; ?>
    <?php include 'modal_publicacion.php'; ?>
    <?php include 'modal_ruta.php'; ?>
    <?php include 'modal_puntos_reciclaje.php'; ?>
    <?php include 'modal_solicitud.php'; ?>


    <!-- JavaScript de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/dash.js"></script>
    <script src="js/perfil.js"></script>

    <script>
        // Función para aceptar solicitud
        function aceptarSolicitud(id) {
            // Llenar el ID en el formulario de aceptación
            document.getElementById('idAceptarSol').value = id;
        }

        // Función para preparar eliminación de solicitud
        function prepararEliminarSol(id) {
            document.getElementById('idEliminarSol').value = id;
        }
    </script>
</body >
</html >