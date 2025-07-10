<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - EcoSoftware</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/registro.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

  <div class="container">

    <!-- Sección del logo y título -->
    <div class="logo-section">

      <!-- Logo de EcoSoftware -->
      <div class="logo">
        <div class="logo-box">
          <img src="img/logo3.png" alt="Logo de EcoSoftware" class="logo-image">
        </div>
      </div>

      <!-- Mensaje de bienvenida -->
      <div class="title">
        <h1>Únete al cambio,<br>construyamos un mundo sostenible.</h1>
      </div>

    </div>

    <!-- Contenedor del formulario de registro -->
    <div class="login-container">
      <div class="login-form">

        <!-- Título de la sección de registro -->
        <div class="title2 py-4">
          <h3>Bienvenido a EcoSoftware</h3>
        </div>
        <!-- Formulario de registro -->
        <form action="../controllers/usuarios/registroUsuario.php" method="POST">

          <!-- Selector principal de tipo de usuario -->
          <div class="role-selector">
            <label for="main-role-select">Tipo de usuario:</label>
            <select id="main-role-select" name="rol" onchange="showForm(this.value)">
              <option value="">Selecciona tu tipo de usuario...</option>
              <option value="2">Ciudadano</option>
              <option value="4">Reciclador de Oficio</option>
              <option value="3">Empresa Recicladora</option>
            </select>
          </div>

          <!-- Formulario para Ciudadano -->
          <div id="form-2" class="form-content">
            <div class="alert descripcion-rol" role="alert">
              <div class="alert-heading">
                <i class="fas fa-info-circle"></i>
                Beneficios como Ciudadano
              </div>
              Podrás acceder a capacitaciones sobre el reciclaje,encontrar variedad de puntos de reciclaje y contribuir
              a la construcción de un mundo más sostenible.
            </div>

            <h2>Registro de Ciudadano</h2>

            <div class="form-group">
              <label for="nombre-ciudadano">Nombre completo:</label>
              <input type="text" id="nombre-ciudadano" name="nombreCiu" placeholder="Ingresa tu nombre completo"
                required>
            </div>

            <div class="form-group">
              <label for="cedula-ciudadano">Cédula:</label>
              <input type="text" id="cedula-ciudadano" name="cedulaCiu" placeholder="Número de cédula" required>
            </div>

            <div class="form-group">
              <label for="email-ciudadano">Correo electrónico:</label>
              <input type="email" id="email-ciudadano" name="correoCiu" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
              <label for="telefono-ciudadano">Teléfono:</label>
              <input type="tel" id="telefono-ciudadano" name="telefonoCiu" placeholder="Número de teléfono" required>
            </div>

            <div class="form-group">
              <label for="direccion-ciudadano">Dirección:</label>
              <input type="text" id="direccion-ciudadano" name="direccionCiu" placeholder="Tu dirección" required>
            </div>
            
            <div class="form-group">
              <label for="barrio-ciudadano">Barrio:</label>
              <input type="text" id="barrio-ciudadano" name="barrioCiu" placeholder="Tu barrio" required>
            </div>
            
            <div class="form-group">
              <label for="localidad-ciudadano">Localidad:</label>
              <input type="text" id="localidad-ciudadano" name="localidadCiu" placeholder="Tu localidad" required>
            </div>

            <div class="form-group">
              <label for="password-ciudadano">Contraseña:</label>
              <input type="password" id="password-ciudadano" name="contraseñaCiu"
                placeholder="Crea una contraseña segura" required>
            </div>

          </div>

          <!-- Formulario para Reciclador de Oficio -->
          <div id="form-4" class="form-content">
            <div class="alert descripcion-rol" role="alert">
              <div class="alert-heading">
                <i class="fas fa-info-circle"></i>
                Beneficios como Reciclador de Oficio
              </div>
              Podrás acceder a rutas optimizadas, conectar con puntos de recolección y hacer más eficiente tu trabajo de
              reciclaje.
            </div>

            <h2>Registro de Reciclador de Oficio</h2>

            <div class="form-group">
              <label for="nombre-reciclador">Nombre completo:</label>
              <input type="text" id="nombre-reciclador" name="nombreRec" placeholder="Ingresa tu nombre completo"
                required>
            </div>

            <div class="form-group">
              <label for="cedula-reciclador">Cédula:</label>
              <input type="text" id="cedula-reciclador" name="cedulaRec" placeholder="Número de cédula" required>
            </div>

            <div class="form-group">
              <label for="email-reciclador">Correo electrónico:</label>
              <input type="email" id="email-reciclador" name="correoRec" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
              <label for="telefono-reciclador">Teléfono:</label>
              <input type="tel" id="telefono-reciclador" name="telefonoRec" placeholder="Número de teléfono" required>
            </div>

            <div class="form-group">
              <label for="zona-trabajo">Zona de trabajo:</label>
              <input type="text" id="zona-trabajo" name="zonaRec" placeholder="Área donde trabajas" required>
            </div>


            <div class="form-group">
              <label for="horario-trabajo">Horario de trabajo:</label>
              <input type="text" id="horario-trabajo" name="horarioRec" placeholder="Horario habitual de trabajo"
                required>
            </div>

            <!-- Campo sobre cantidad minima qie recoge -->
            <div class="form-group">
              <label for="cantidad-minima">Cantidad mínima de residuos que recoges:</label>
              <input type="number" id="cantidad-minima" name="cantidadMinRec" placeholder="Cantidad en kilogramos"
                required>
            </div>

            <!-- Campo para seleccionar varios valores de tipos de materiales que maneja -->
            <div class="form-group">
              <label class="form-label mb-2"><strong>Tipos de materiales que maneja:</strong></label>
              <div class="d-flex flex-wrap gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="plastico" name="residuosRec[]">
                  <label class="form-check-label" for="plastico">Plástico</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="3" id="papel" name="residuosRec[]">
                  <label class="form-check-label" for="papel">Papel/cartón</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="2" id="vidrio" name="residuosRec[]">
                  <label class="form-check-label" for="vidrio">Vidrio</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="4" id="metal" name="residuosRec[]">
                  <label class="form-check-label" for="metal">Metal</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="5" id="organico" name="residuosRec[]">
                  <label class="form-check-label" for="organico">Orgánico</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="6"  name="residuosRec[]"
                    onchange="toggleOtrosInput()">
                  <label class="form-check-label" for="otros">Otros</label>
                </div>
              </div>

              <!-- Campo de texto que se muestra cuando se selecciona "Otros" -->
              <div class="form-group" style="display: none;">
                <label for="otros-materiales-reciclador">Especifique otros materiales:</label>
                <input type="text"  name="otrosMaterialesRec[]"
                  placeholder="Escriba los otros materiales que maneja...">
              </div>


            </div>

            <div class="form-group">
              <label for="password-reciclador">Contraseña:</label>
              <input type="password" id="password-reciclador" name="contraseñaRec"
                placeholder="Crea una contraseña segura" required>
            </div>
          </div>

          <!-- Formulario para Empresa Recicladora -->
          <div id="form-3" class="form-content">
            <div class="alert descripcion-rol" role="alert">
              <div class="alert-heading">
                <i class="fas fa-info-circle"></i>
                Beneficios como Empresa Recicladora
              </div>
              Podrás gestionar puntos de reciclaje, optimizar rutas de recolección y contribuir a la sostenibilidad.
            </div>

            <h2>Registro de Empresa Recicladora</h2>

            <div class="form-group">
              <label for="nombre-empresa">Nombre de la empresa:</label>
              <input type="text" id="nombre-empresa" name="nombreEmp" placeholder="Razón social de la empresa" required>
            </div>

            <div class="form-group">
              <label for="nit-empresa">NIT:</label>
              <input type="text" id="nit-empresa" name="nitEmp" placeholder="Número de identificación tributaria"
                required>
            </div>

            <div class="form-group">
              <label for="representante-legal">Representante legal:</label>
              <input type="text" id="representante-legal" name="representanteEmp"
                placeholder="Nombre del representante legal" required>
            </div>

            <div class="form-group">
              <label for="email-empresa">Correo electrónico corporativo:</label>
              <input type="email" id="email-empresa" name="correoEmp" placeholder="contacto@empresa.com" required>
            </div>

            <div class="form-group">
              <label for="telefono-empresa">Teléfono:</label>
              <input type="tel" id="telefono-empresa" name="telefonoEmp" placeholder="Teléfono de contacto" required>
            </div>

            <div class="form-group">
              <label for="direccion-empresa">Dirección:</label>
              <input type="text" id="direccion-empresa" name="direccionEmp" placeholder="Dirección de la empresa"
                required>
            </div>

            <div class="form-group ">
              <label for="barrio-empresa">Barrio:</label>
              <input type="text" id="barrio-empresa" name="barrioEmp" placeholder="Barrio de la empresa" required>
            </div>

            <div class="form-group">
              <label for="localidad-empresa">Localidad:</label>
              <input type="text" id="localidad-empresa" name="localidadEmp" placeholder="Localidad de la empresa"
                required>
            </div>


            <div class="form-group">
              <label for="horario-empresa">Horario de operación:</label>
              <input type="text" id="horario-empresa" name="horarioEmp" placeholder="Horario de operación de la empresa"
                required>
            </div>

            <!-- Campo sobre cantidad minima qie recoge -->
            <div class="form-group">
              <label for="cantidad-minima">Cantidad mínima de residuos que recoges:</label>
              <input type="number" id="cantidad-minima" name="cantidadMinEmp" placeholder="Cantidad en kilogramos"
                required>
            </div>

            <!-- Campo para seleccionar varios valores de tipos de materiales que maneja -->
            <div class="form-group">
              <label class="form-label mb-2"><strong>Tipos de materiales que maneja:</strong></label>
              <div class="d-flex flex-wrap gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="plastico" name="residuosEmp[]">
                  <label class="form-check-label" for="plastico">Plástico</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="3" id="papel" name="residuosEmp[]">
                  <label class="form-check-label" for="papel">Papel/cartón</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="2" id="vidrio" name="residuosEmp[]">
                  <label class="form-check-label" for="vidrio">Vidrio</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="4" id="metal" name="residuosEmp[]">
                  <label class="form-check-label" for="metal">Metal</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="5" id="organico" name="residuosEmp[]">
                  <label class="form-check-label" for="organico">Orgánico</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="6"  name="residuosEmp[]"
                    onchange="toggleOtrosInput()">
                  <label class="form-check-label" for="otros">Otros</label>
                </div>
              </div>

              <!-- Campo de texto que se muestra cuando se selecciona "Otros" -->
              <div class="form-group" style="display: none;">
                <label for="otros-materiales-reciclador">Especifique otros materiales:</label>
                <input type="text"  name="otrosMaterialesEmp[]"
                  placeholder="Escriba los otros materiales que maneja...">
              </div>


            </div>

            <div class="form-group">
              <label for="password-empresa">Contraseña:</label>
              <input type="password" id="password-empresa" name="contraseñaEmp" placeholder="Crea una contraseña segura"
                required>
            </div>

          </div>

          <!-- Botón de envío -->
          <button type="submit" id="submit-btn" class="login-button" style="display: none;">
            Registrarse
          </button>
        </form>

        <!-- Enlace para iniciar sesión si ya tiene cuenta -->
        <div class="account-message">
          <a href="login.html">Ya tengo una cuenta <b>Iniciar sesión</b></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

  <!-- Script para manejar la lógica de los formularios -->
  <script>

    // Función para mostrar el formulario correspondiente según el tipo de usuario seleccionado
    function showForm(roleType) {

      // Ocultar todos los formularios
      const forms = document.querySelectorAll('.form-content');
      forms.forEach(form => {
        form.classList.remove('active');

        // Deshabilitar campos de formularios ocultos
        const inputs = form.querySelectorAll('input[required], select[required]');
        inputs.forEach(input => input.disabled = true);
      });

      
      const submitBtn = document.getElementById('submit-btn');

      // Si se selecciona un tipo válido, mostrar el formulario correspondiente
      if (roleType && roleType !== '') {
        const selectedForm = document.getElementById('form-' + roleType);

        // Ocultar el botón si no hay formulario seleccionado
        if (selectedForm) {
          selectedForm.classList.add('active');
          // Habilitar campos del formulario activo
          const inputs = selectedForm.querySelectorAll('input, select');
          inputs.forEach(input => input.disabled = false);

          // Mostrar y actualizar el botón
          submitBtn.style.display = 'block';
          submitBtn.textContent = `Registrarse`;
        }
      } else {
        // Ocultar botón si no hay selección
        submitBtn.style.display = 'none';
      }
    }

    // Función para mostrar/ocultar el campo de texto "Otros" en materiales
    function toggleOtrosInput() {
      const checkbox = document.getElementById('otros');
      const container = document.querySelector('.form-group[style*="display: none"]');
      const input = document.getElementById('otros-materiales-reciclador');

      if (checkbox.checked) {
        container.style.display = 'block';
      } else {
        container.style.display = 'none';
        input.value = '';
      }
    }




  </script>

</body>

</html>