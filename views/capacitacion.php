<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitación</title>
    
    <!-- Icono de la página -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    
    <!-- CSS externos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!-- CSS personalizados -->
    <link rel="stylesheet" href="css/capacitaciones.css">
    <link rel="stylesheet" href="css/global.css">
</head>

<body>
    <!-- Incluir header -->
    <?php include 'header.php'; ?>

    <!-- Sección Hero (banner principal) -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- Columna izquierda: Texto -->
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        Gestión Inteligente de<br>
                        <span class="green">Residuos</span>
                    </h1>
                    <p class="hero-subtitle">
                        Conectamos ciudadanos, recicladores y empresas para construir un futuro más sostenible a través de la tecnología.
                    </p>
                    <div>
                        <!-- Botones de acción -->
                        <a href="registro.html" class="btn-green">
                            <i class="fas fa-rocket me-2"></i>Comenzar Ahora
                        </a>
                        <a href="#servicios" class="btn-outline">
                            <i class="fas fa-play me-2"></i>Ver Servicios
                        </a>
                    </div>
                </div>
                <!-- Columna derecha: Imagen -->
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="img/capacitación.png" alt="Reciclaje" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Incluir controlador para obtener capacitaciones -->
    <?php include '../controllers/capacitaciones/consultarCapacitaciones.php'; ?>
    

    <!-- Sección de capacitaciones -->
    <section class="bg-light py-5">
        <div class="row g-3 p-5">
            <!-- Generar tarjetas de capacitación dinámicamente -->
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
                            <!-- Botón de inscripción -->
                            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#inscripcion<?php echo $cap['id']; ?>">
                                Inscribirme
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de inscripción (uno por cada capacitación) -->
                <div class="modal fade" id="inscripcion<?php echo $cap['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Inscripción al curso</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Pregunta de confirmación -->
                                <p>¿Deseas inscribirte en <strong><?php echo htmlspecialchars($cap['nombre']); ?></strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <!-- Formulario de inscripción -->
                                    <form action="../controllers/inscripcion/registrarInscripcion.php" method="POST">
                                    <input type="hidden" name="curso" value="<?php echo htmlspecialchars($cap['id']); ?>">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Incluir footer -->
    <?php include 'footer.html'; ?>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/dash.js"></script>
</body>

</html>