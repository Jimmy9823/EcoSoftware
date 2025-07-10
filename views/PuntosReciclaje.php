<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puntos de reciclaje</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        

        @keyframes float {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        header h1 {
            font-size: 2.2em;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .container {
            display: flex;
            height: calc(100vh - 80px);
            gap: 0;
        }

        #map {
            flex: 2;
            height: 100%;
            border-radius: 0 0 0 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            flex: 1;
            background: white;
            overflow-y: auto;
            padding: 25px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 15px 0;
        }

        .sidebar h2 {
            color: #2d8f47;
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 3px solid #e8f5e8;
        }

        /* Filtros */
        .filters {
            margin-bottom: 25px;
            padding: 20px;
            background: linear-gradient(135deg, #f8fdf8, #eef7ee);
            border-radius: 12px;
            border: 1px solid #d4f1d4;
        }

        .filters h3 {
            color: #2d8f47;
            margin-bottom: 15px;
            font-size: 1.1em;
            text-align: center;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 2px solid;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-btn.active {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .filter-btn.todos {
            background: #6c757d;
            color: white;
            border-color: #6c757d;
        }

        .filter-btn.todos.active,
        .filter-btn.todos:hover {
            background: #5a6268;
            border-color: #5a6268;
        }

        .filter-btn.papel {
            background: #e3f2fd;
            color: #1976d2;
            border-color: #1976d2;
        }

        .filter-btn.papel.active,
        .filter-btn.papel:hover {
            background: #1976d2;
            color: white;
        }

        .filter-btn.metal {
            background: #fce4ec;
            color: #c2185b;
            border-color: #c2185b;
        }

        .filter-btn.metal.active,
        .filter-btn.metal:hover {
            background: #c2185b;
            color: white;
        }

        .filter-btn.plastico {
            background: #fff3e0;
            color: #f57c00;
            border-color: #f57c00;
        }

        .filter-btn.plastico.active,
        .filter-btn.plastico:hover {
            background: #f57c00;
            color: white;
        }

        .filter-btn.vidrio {
            background: #e8f5e8;
            color: #388e3c;
            border-color: #388e3c;
        }

        .filter-btn.vidrio.active,
        .filter-btn.vidrio:hover {
            background: #388e3c;
            color: white;
        }

        /* Cards */
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            margin-bottom: 15px;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            transition: all 0.3s ease;
        }

        .card.papel::before { background: #1976d2; }
        .card.metal::before { background: #c2185b; }
        .card.plastico::before { background: #f57c00; }
        .card.vidrio::before { background: #388e3c; }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card:hover::before {
            width: 8px;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .card-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            font-weight: bold;
        }

        .card-icon.papel { background: #1976d2; }
        .card-icon.metal { background: #c2185b; }
        .card-icon.plastico { background: #f57c00; }
        .card-icon.vidrio { background: #388e3c; }

        .card h3 {
            color: #2d3436;
            margin: 0;
            font-size: 1.1em;
            font-weight: 600;
        }

        .card p {
            margin: 8px 0;
            color: #636e72;
            font-size: 0.95em;
            line-height: 1.4;
        }

        .card p strong {
            color: #2d3436;
        }

        /* Estilos para ocultar elementos filtrados */
        .hidden {
            display: none !important;
        }

        /* Contador de resultados */
        .results-counter {
            text-align: center;
            color: #636e72;
            font-size: 0.9em;
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            #map {
                height: 400px;
                border-radius: 0;
            }

            .sidebar {
                border-radius: 0;
                box-shadow: none;
            }

            header h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1><i class="fas fa-recycle"></i> ¡Encuentra tu mejor lugar para reciclar!</h1>
    </header>

    <div class="container">
        <div id="map"></div>
        <div class="sidebar">
            <h2><i class="fas fa-map-marker-alt"></i> ECO-PUNTOS BOGOTÁ</h2>
            
            <div class="filters">
                <h3><i class="fas fa-filter"></i> Filtrar por tipo de residuo</h3>
                <div class="filter-buttons">
                    <div class="filter-btn todos active" data-filter="todos">
                        <i class="fas fa-globe"></i> Todos
                    </div>
                    <div class="filter-btn papel" data-filter="Papel">
                        <i class="fas fa-file-alt"></i> Papel
                    </div>
                    <div class="filter-btn metal" data-filter="Metal">
                        <i class="fas fa-cog"></i> Metal
                    </div>
                    <div class="filter-btn plastico" data-filter="Plástico">
                        <i class="fas fa-wine-bottle"></i> Plástico
                    </div>
                    <div class="filter-btn vidrio" data-filter="Vidrio">
                        <i class="fas fa-wine-glass"></i> Vidrio
                    </div>
                </div>
            </div>

            <div class="results-counter" id="results-counter">
                Cargando puntos de reciclaje...
            </div>

            <div id="lista-puntos"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Variables globales
        let map;
        let markers = [];
        let puntosData = [];
        let currentFilter = 'todos';

        // Colores para cada tipo de residuo
        const colores = {
            'Papel': '#1976d2',
            'Metal': '#c2185b', 
            'Plástico': '#f57c00',
            'Vidrio': '#388e3c'
        };

        // Función para crear iconos SVG coloreados
        function createColoredIcon(color) {
            const svgIcon = `
                <svg width="40" height="40" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="11" fill="${color}" stroke="white" stroke-width="2"/>
                </svg>
            `;
            
            return L.divIcon({
                html: svgIcon,
                iconSize: [40, 40],
                iconAnchor: [20, 20],
                popupAnchor: [0, -20],
                className: 'custom-marker'
            });
        }

        // Inicializar el mapa
        function initMap() {
            map = L.map('map').setView([4.710989, -74.072092], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
        }

        // Función para aplicar filtros
        function aplicarFiltro(filtro) {
            currentFilter = filtro;
            
            // Actualizar botones de filtro
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector(`[data-filter="${filtro}"]`).classList.add('active');

            // Filtrar marcadores en el mapa
            markers.forEach(markerData => {
                if (filtro === 'todos' || markerData.tipo === filtro) {
                    markerData.marker.addTo(map);
                } else {
                    map.removeLayer(markerData.marker);
                }
            });

            // Filtrar tarjetas en la sidebar
            const cards = document.querySelectorAll('.card');
            let visibleCount = 0;
            
            cards.forEach(card => {
                const cardTipo = card.dataset.tipo;
                if (filtro === 'todos' || cardTipo === filtro) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Actualizar contador
            const counter = document.getElementById('results-counter');
            counter.textContent = `Mostrando ${visibleCount} punto${visibleCount !== 1 ? 's' : ''} de reciclaje`;

            // Ajustar vista del mapa a marcadores visibles
            const visibleMarkers = markers
                .filter(m => filtro === 'todos' || m.tipo === filtro)
                .map(m => m.marker);
            
            if (visibleMarkers.length > 0) {
                const group = new L.featureGroup(visibleMarkers);
                map.fitBounds(group.getBounds().pad(0.1));
            }
        }

        // Función para obtener clase CSS del tipo
        function getTipoClass(tipo) {
            return tipo.toLowerCase().replace('á', 'a').replace('í', 'i');
        }

        // Cargar y mostrar puntos de reciclaje
        function cargarPuntos() {
            fetch('obtener_puntos.php')
                .then(response => response.json())
                .then(data => {
                    puntosData = data;
                    markers = [];

                    const listaPuntos = document.getElementById('lista-puntos');
                    listaPuntos.innerHTML = '';

                    data.forEach((punto, index) => {
                        const tipo = punto.tipo_de_residuo || 'Otro';
                        const color = colores[tipo] || '#6c757d';
                        const tipoClass = getTipoClass(tipo);

                        // Crear marcador con icono coloreado
                        const icon = createColoredIcon(color);
                        const marker = L.marker([parseFloat(punto.latitud), parseFloat(punto.longitud)], { icon })
                            .bindPopup(`
                                <div style="text-align: center; padding: 10px;">
                                    <h3 style="color: ${color}; margin-bottom: 8px;">${punto.nombre}</h3>
                                    <p><strong>Tipo:</strong> <span style="color: ${color};">${tipo}</span></p>
                                    <p><strong>Horario:</strong> ${punto.horario}</p>
                                </div>
                            `);

                        markers.push({ marker, tipo, punto });

                        // Crear tarjeta en la sidebar
                        const card = document.createElement('div');
                        card.className = `card ${tipoClass}`;
                        card.dataset.tipo = tipo;
                        card.innerHTML = `
                            <div class="card-header">
                                <div class="card-icon ${tipoClass}">
                                    <i class="fas fa-recycle"></i>
                                </div>
                                <h3>${punto.nombre}</h3>
                            </div>
                            <p><strong>Tipo de residuo:</strong> <span style="color: ${color};">${tipo}</span></p>
                            <p><strong>Horario:</strong> ${punto.horario}</p>
                        `;

                        // Evento click para centrar el mapa
                        card.addEventListener('click', () => {
                            map.setView(marker.getLatLng(), 16);
                            marker.openPopup();
                            
                            // Efecto visual en la tarjeta
                            card.style.transform = 'scale(0.95)';
                            setTimeout(() => {
                                card.style.transform = '';
                            }, 150);
                        });

                        listaPuntos.appendChild(card);
                    });

                    // Aplicar filtro inicial
                    aplicarFiltro('todos');
                })
                .catch(error => {
                    console.error("Error cargando puntos:", error);
                    document.getElementById('results-counter').textContent = 'Error al cargar los puntos de reciclaje';
                });
        }

        // Event listeners para filtros
        function initFilters() {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const filtro = btn.dataset.filter;
                    aplicarFiltro(filtro);
                });
            });
        }

        // Inicializar aplicación
        document.addEventListener('DOMContentLoaded', () => {
            initMap();
            initFilters();
            cargarPuntos();
        });
    </script>

</body>
</html>