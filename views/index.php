<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSoftware - Gestión Inteligente de Residuos</title>
    
    <!-- Bootstrap CSS -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/global.css">
    
    <style>
        /* Variables CSS */
        :root {
            --green-primary: #7bc143;
            --green-light: #7bc143;
            --green-bg:#ffffff;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
        }
        
        /* Base */
        * {
            font-family: 'Inter', sans-serif;
        }
        
        
        
        /* Botones */
        .btn-green {
            background: var(--green-primary);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 25px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-green:hover {
            background: var(--green-light);
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-outline-green {
            background: transparent;
            border: 2px solid var(--green-primary);
            padding: 10px 28px;
            font-weight: 600;
            border-radius: 25px;
            color: var(--green-primary);
            transition: all 0.3s ease;
        }
        
        .btn-outline-green:hover {
            background: var(--green-primary);
            color: white;
        }
        
        /* Secciones */
        .section {
            padding: 80px 0;
        }
        
        .section-light {
            background: #f8f9fa;
        }
        
        .section-green {
            background: white;
            color: var(--text-dark);
        }
        
        /* Cards */
        .card-simple {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            border: none;
        }
        
        .card-simple:hover {
            transform: translateY(-5px);
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            background: var(--green-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }
        
        /* Fact Cards */
        .fact-card {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }
        
        .fact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .fact-icon {
            font-size: 2.5rem;
            color: var(--green-light);
            margin-bottom: 1rem;
        }
        
        
        
        /* Back to top */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            background: var(--green-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .back-to-top.show {
            opacity: 1;
        }
        
        .back-to-top:hover {
            background: var(--green-light);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
     <?php include 'header.php'; ?>


    <main>
        <!-- Hero Section -->
    <section id="inicio" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Gestión Inteligente de <span style="color: var(--green-primary);">Residuos</span></h1>
                    <p class="hero-subtitle">Conectamos ciudadanos, recicladores y empresas para construir un futuro más sostenible a través de la tecnología.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="registro.html" class="btn btn-green">
                            <i class="fas fa-rocket me-2"></i>Comenzar Ahora
                        </a>
                        <a href="#servicios" class="btn btn-outline-green">
                            <i class="fas fa-play me-2"></i>Ver Servicios
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="img/bienvenida.png" alt="Reciclaje" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Purpose Section -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Reciclaje" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <h2 class="display-5 fw-bold mb-4" style="color: var(--text-dark);">Nuestro Propósito</h2>
                        <p class="lead text-muted mb-4">EcoSoftware nace con la misión de conectar ciudadanos, recicladores y empresas para construir un entorno más limpio y sostenible.</p>
                        <p class="text-muted mb-4">Promovemos la economía circular y el compromiso ambiental mediante tecnología accesible y colaborativa, creando un impacto positivo en nuestras comunidades.</p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Tecnología Verde</h6>
                                        <small class="text-muted">Soluciones innovadoras</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-users text-success fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Comunidad Activa</h6>
                                        <small class="text-muted">Colaboración ciudadana</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="section section-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: var(--text-dark);">Nuestros Servicios</h2>
                <p class="lead text-muted">Descubre cómo podemos ayudarte a hacer la diferencia</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card-simple">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--text-dark);">Solicitar Recolección</h4>
                        <p class="text-muted mb-4">¿Tienes muchos residuos reciclables? Programa una recolección y nosotros nos encargamos de llevarlos al lugar adecuado de forma rápida y eficiente.</p>
                        <a href="404.html" class="btn btn-green">
                            <i class="fas fa-calendar-plus me-2"></i>Programar
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-simple">
                        <div class="card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--text-dark);">Puntos de Reciclaje</h4>
                        <p class="text-muted mb-4">Encuentra los puntos de reciclaje más cercanos a tu ubicación con nuestro mapa interactivo y contribuye con el medio ambiente.</p>
                        <a href="500.html" class="btn btn-green">
                            <i class="fas fa-map me-2"></i>Ver Mapa
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card-simple">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--text-dark);">Capacitaciones</h4>
                        <p class="text-muted mb-4">Accede a cursos gratuitos y recursos educativos para mejorar tus prácticas de reciclaje y ser un agente de cambio.</p>
                        <a href="#" class="btn btn-green">
                            <i class="fas fa-book-open me-2"></i>Explorar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facts Section -->
    <section id="datos" class="section section-green">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: var(--text-dark);">Datos Curiosos sobre Reciclaje</h2>
                <p class="lead text-muted">Descubre datos fascinantes que te motivarán a reciclar más</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="fact-card">
                        <div class="fact-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-dark);">Papel Reciclado</h5>
                        <p class="text-muted">Reciclar una tonelada de papel ahorra más de 26,000 litros de agua y evita la tala de 17 árboles.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="fact-card">
                        <div class="fact-icon">
                            <i class="fas fa-battery-full"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-dark);">Pilas y Baterías</h5>
                        <p class="text-muted">Las pilas pueden tardar más de 500 años en degradarse si no se reciclan correctamente, contaminando el suelo.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="fact-card">
                        <div class="fact-icon">
                            <i class="fas fa-wine-bottle"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-dark);">Vidrio Reutilizable</h5>
                        <p class="text-muted">Reciclar una botella de vidrio ahorra energía suficiente para encender una bombilla de 100W durante 4 horas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'; ?>

    <!-- Back to top button -->
    <a href="#inicio" class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>

