<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard del Administrador - EcoSoftware</title>

  <!-- Iconos de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <!-- Estilos personalizados del dashboard -->
  <link rel="stylesheet" href="css/dashboard.css">
  
</head>

<body>
  <!-- Sidebar lateral con navegación -->
  <div class="sidebar" id="sidebar">
    <div class="logo-container">
      <div class="logo">
        <div class="logo-box">
            <img src="img/logo3.png" alt="Logo de EcoSoftware" class="logo-image">
        </div>
    </div>
    </div>

    <div class="search-box">
      <input type="text" placeholder="Buscar">
    </div>

    <!-- Menú de navegación -->
    <ul class="menu">
      <li><a href="#inicio" class="menu-item active"><i class="fas fa-home"></i><span>Inicio</span></a></li>
      <li><a href="#usuarios" class="menu-item"><i class="fas fa-users"></i><span>Usuarios</span></a></li>
      <li><a href="#solicitudes" class="menu-item"><i class="fas fa-calendar-check"></i><span>Solicitudes de Recolección</span></a></li>
      <li><a href="#puntos" class="menu-item"><i class="fas fa-map-marker-alt"></i><span>Puntos de Reciclaje</span></a></li>
      <li><a href="#capacitaciones" class="menu-item"><i class="fas fa-graduation-cap"></i><span>Capacitaciones</span></a></li>
      <li><a href="#informes" class="menu-item"><i class="fas fa-chart-bar"></i><span>Informes</span></a></li>
    </ul>
  </div>

  <!-- Contenido principal -->
  <div class="main-content">
    <!-- Encabezado -->
    <div class="header">
      <div class="page-title">
        <button class="toggle-sidebar" id="toggle-sidebar">
          <i class="fas fa-bars"></i>
        </button>
        <span>Panel de control</span>
      </div>

      <!-- Acciones del usuario -->
      <div class="header-actions">
        <button class="notification-btn">
          <i class="fas fa-bell"></i>
        </button>

        <div class="user-profile" id="user-profile">
          <div class="user-avatar">R</div>
          <div class="user-info">
            <div class="user-name">Reci</div>
            <div class="user-role">Reciclador</div>
          </div>
          <div class="user-menu" id="user-menu">
            <a href="#" class="user-menu-item"><i class="fas fa-user"></i>Perfil</a>
            <a href="#" class="user-menu-item"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Secciones dinámicas -->
    <main>
      <!-- INICIO: Panel general del dashboard -->
      <div id="inicio" class="seccion active">
        <!-- Tarjetas resumen -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-title">Usuarios Registrados</div>
            <div class="stat-number" id="total-usuarios">128</div>
          </div>
          <div class="stat-card">
            <div class="stat-title">Solicitudes</div>
            <div class="stat-number" id="total-solicitudes">45</div>
          </div>
          <div class="stat-card">
            <div class="stat-title">Inscripciones</div>
            <div class="stat-number" id="total-inscripciones">27</div>
          </div>
          <div class="stat-card">
            <div class="stat-title">Puntos de Reciclaje</div>
            <div class="stat-number" id="total-puntos">16</div>
          </div>
        </div>
        
        <!-- Gráficas estadísticas -->
        <div class="dashboard-columns">

          <!-- Columna izquierda -->
          <div class="column">
            <div class="chart-container">
              <h3>Solicitudes por estado</h3>
              <canvas id="solicitudesChart"></canvas>
            </div>
            <div class="chart-container">
              <h3>Materiales reciclados</h3>
              <canvas id="materialesChart"></canvas>
            </div>
          </div>

          <!-- Columna derecha -->
          <div class="column">
            <div class="chart-container">
              <h3>Inscripciones mensuales</h3>
              <canvas id="inscripcionesChart"></canvas>
            </div>
            <div class="chart-container">
              <h3>Usuarios por tipo</h3>
              <canvas id="usuariosChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- USUARIOS: Gestión -->
      <div id="usuarios" class="seccion">
        <h1>Gestión de Usuarios</h1>
        <p>Aquí puedes administrar los usuarios registrados.</p>
      </div>

      <!-- SOLICITUDES -->
      <div id="solicitudes" class="seccion">
        <h1>Solicitudes de Recolección</h1>
        <p>Listado y estado de solicitudes.</p>
      </div>

      <!-- PUNTOS DE RECICLAJE -->
      <div id="puntos" class="seccion">
        <h1>Puntos de Reciclaje</h1>
        <p>Mapa y listado de puntos de reciclaje registrados.</p>
      </div>

      <!-- CAPACITACIONES -->
      <div id="capacitaciones" class="seccion">
        <h1>Capacitaciones</h1>
        <p>Gestión de cursos y contenidos educativos.</p>
      </div>

      <!-- INFORMES -->
      <div id="informes" class="seccion">
        <h1>Informes</h1>
        <p>Estadísticas generales del sistema.</p>
      </div>
    </main>
  </div>

  <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Tu JS personalizado -->
<script src="js/dashboard.js"></script>

</body>
</html>
