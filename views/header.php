<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSoftware</title>
    <!-- Icono de la pestaña del navegador -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS para diseño responsive -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- CSS personalizado del sistema -->
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <!-- Sección del navbar -->
    <seccion id="navbar">
        <!-- Barra de navegación fija en la parte superior -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <!-- Logo de la aplicación -->
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo3.png" alt="Logo de EcoSoftware - Página de inicio">
                </a>
                
                <!-- Botón hamburguesa para dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Contenedor colapsable de navegación -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Enlaces principales del sistema -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Enlace a página de inicio -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" data-page="inicio">Inicio</a>
                        </li>
                        <!-- Enlace para solicitar recolección de materiales -->
                        <li class="nav-item">
                            <a class="nav-link" href="SolicitudRecoleccion.html" data-page="solicitud">Solicitar recolección</a>
                        </li>
                        <!-- Enlace a puntos de reciclaje disponibles -->
                        <li class="nav-item">
                            <a class="nav-link" href="PuntosReciclaje.html" data-page="puntos">Puntos de reciclaje</a>
                        </li>
                        <!-- Enlace a capacitaciones educativas -->
                        <li class="nav-item">
                            <a class="nav-link" href="capacitacion.php" data-page="capacitacion">Capacitación</a>
                        </li>
                        <!-- Enlace a noticias del sector -->
                        <li class="nav-item">
                            <a class="nav-link" href="Noticias.html" data-page="noticias">Noticias</a>
                        </li>
                    </ul>
                    
                    <!-- Formulario de búsqueda -->
                    <form class="d-flex search-container">
                        <input class="form-control" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </seccion>

    <!-- Script para marcar página activa automáticamente -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el nombre de la página actual de forma robusta
            let currentPage = window.location.pathname.split('/').pop();
            
            // Si no hay página específica, asumir que es la página principal
            if (!currentPage || currentPage === '/') {
                currentPage = 'index.html';
            }
            
            // Quitar la clase 'active' de todos los enlaces para empezar limpio
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Determinar qué enlace marcar como activo según la página actual
            let activeSelector = null;
            
            // Verificar si estamos en la página de inicio
            if (currentPage === 'index.html' || currentPage === 'index.php' || currentPage === '' || currentPage === '/') {
                activeSelector = '[data-page="inicio"]';
            } 
            // Verificar si estamos en solicitud de recolección
            else if (currentPage === 'SolicitudRecoleccion.html') {
                activeSelector = '[data-page="solicitud"]';
            } 
            // Verificar si estamos en puntos de reciclaje
            else if (currentPage === 'PuntosReciclaje.html') {
                activeSelector = '[data-page="puntos"]';
            } 
            // Verificar si estamos en capacitación
            else if (currentPage === 'capacitacion.php') {
                activeSelector = '[data-page="capacitacion"]';
            } 
            // Verificar si estamos en noticias
            else if (currentPage === 'Noticias.html') {
                activeSelector = '[data-page="noticias"]';
            }
            
            // Si encontramos una página válida, marcar el enlace correspondiente
            if (activeSelector) {
                const activeLink = document.querySelector(activeSelector);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });

        // Validación del formulario de búsqueda
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el formulario de búsqueda
            const searchForm = document.querySelector('.search-container');
            
            // Si existe el formulario, agregar validación
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    // Obtener el campo de entrada
                    const input = searchForm.querySelector('input');
                    
                    // Validar que no esté vacío (sin espacios)
                    if (!input.value.trim()) {
                        // Prevenir el envío del formulario
                        e.preventDefault();
                        // Mostrar mensaje de error al usuario
                        alert("Por favor ingresa un término de búsqueda.");
                    }
                });
            }
        });
    </script>

    <!-- Bootstrap JavaScript para funcionalidad interactiva -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>