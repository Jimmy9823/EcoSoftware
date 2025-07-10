# Análisis de Errores - Dashboard Empresa-Reciclador

## Errores Identificados que Impiden Eliminar y Aceptar Solicitudes

### 1. **CRÍTICO: Modal de Solicitudes NO Incluido**
**Archivo afectado:** `views/dash_reciclador_empresa.php`
**Líneas 382-386:** Los modales están incluidos, pero falta `modal_solicitud.php`

**Problema:**
```php
<!-- Incluir modales -->
<?php include 'modal_editar_perfil.php'; ?>
<?php include 'modal_publicacion.php'; ?>
<?php include 'modal_ruta.php'; ?>
<?php include 'modal_puntos_reciclaje.php'; ?>
```

**Error:** Falta la inclusión de `modal_solicitud.php` que contiene los modales:
- `eliminarsolicitudModal` 
- `aceptarSolicitudModal`

**Impacto:** Los botones de eliminar y aceptar solicitudes no funcionan porque los modales no existen en la página.

---

### 2. **ERROR JAVASCRIPT: Función aceptarSolicitud Malformada**
**Archivo afectado:** `views/dash_reciclador_empresa.php`
**Líneas 390-398:**

**Código problemático:**
```javascript
function aceptarSolicitud(id, estado_peticion) {
    // Cambiar título del modal
    document.getElementById('formAceptar').textContent = "Editar Solicitud";

    // Llenar campos del formulario
    document.querySelector('id').value = tipo_residuo;  // ❌ Error: 'id' no es un selector válido
    document.querySelector('[name="estado"]').value = cantidad;  // ❌ Error: variables no definidas
}
```

**Errores específicos:**
1. `document.querySelector('id')` - Selector incorrecto, debería ser `'#idAceptarSol'`
2. Variables `tipo_residuo` y `cantidad` no están definidas
3. No se está asignando el ID de la solicitud al campo hidden del modal
4. `formAceptar` es un formulario, no un elemento con textContent

---

### 3. **ERROR EN BOTÓN ACEPTAR: Sintaxis JavaScript Incorrecta**
**Archivo afectado:** `views/dash_reciclador_empresa.php`
**Línea 307-309:**

**Código problemático:**
```html
<button class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#aceptarSolicitudModal"
    onclick="aceptarSolicitud('<?php echo $sol[0]; ?>'),'<?php echo htmlspecialchars($sol[3]); ?>'">
```

**Error:** Sintaxis incorrecta en onclick - tiene una coma en lugar de pasar parámetros correctamente.

**Debería ser:**
```html
onclick="aceptarSolicitud('<?php echo $sol[0]; ?>', '<?php echo htmlspecialchars($sol[3]); ?>')"
```

---

### 4. **ERROR DE REDIRECCIÓN: Controladores Apuntan al Dashboard Incorrecto**
**Archivos afectados:** 
- `controllers/aceptar_solicitud.php` (línea 21)
- `controllers/eliminar_solicitud.php` (línea 25)

**Problema:**
```php
location.href='../controllers/dashboard_ciudadano.php#solicitudes';
```

**Error:** Ambos controladores redirigen a `dashboard_ciudadano.php` en lugar de `dash_reciclador_empresa.php`

**Impacto:** Después de aceptar o eliminar una solicitud, el usuario es redirigido al dashboard incorrecto.

---

### 5. **ERROR EN CONSULTA: Controlador de Búsqueda Redirige Incorrectamente**
**Archivo afectado:** `controllers/consultarSolicitudesEmpresa.php`
**Líneas 6-12:**

**Problema:**
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dato'], $_POST['valor'])) {
    $filtro   = $_POST['valor'];  // ❌ Variables intercambiadas
    $valor    = $_POST['dato'];   // ❌ Variables intercambiadas
    $solicitudes = $solicitud->ConsultaEspecifica($filtro, $valor);
    echo "<script>
        location.href='../views/dash_reciclador_empresa.php';
    </script>";
}
```

**Errores:**
1. Variables `$filtro` y `$valor` están intercambiadas
2. Se hace redirect después de la consulta, perdiendo los resultados de búsqueda

---

## Soluciones Requeridas

### 1. **Incluir Modal de Solicitudes**
Agregar en `dash_reciclador_empresa.php` después de línea 383:
```php
<?php include 'modal_solicitud.php'; ?>
```

### 2. **Corregir Función JavaScript**
Reemplazar la función `aceptarSolicitud`:
```javascript
function aceptarSolicitud(id, descripcion) {
    document.getElementById('idAceptarSol').value = id;
}
```

### 3. **Corregir Sintaxis del Botón**
Corregir el onclick del botón aceptar:
```html
onclick="aceptarSolicitud('<?php echo $sol[0]; ?>', '<?php echo htmlspecialchars($sol[3]); ?>')"
```

### 4. **Corregir Redirecciones**
En ambos controladores cambiar:
```php
location.href='../views/dash_reciclador_empresa.php#solicitudes';
```

### 5. **Corregir Controlador de Búsqueda**
Intercambiar variables y eliminar redirect:
```php
$filtro = $_POST['dato'];
$valor = $_POST['valor'];
```

---

## Gravedad de los Errores

- **CRÍTICO:** Error #1 - Sin este fix, los modales no aparecen
- **ALTO:** Errores #2, #3 - JavaScript no funciona correctamente  
- **MEDIO:** Errores #4, #5 - Funcionalidad parcial pero UX problemática

## Archivos que Requieren Modificación

1. `views/dash_reciclador_empresa.php`
2. `controllers/aceptar_solicitud.php`
3. `controllers/eliminar_solicitud.php`
4. `controllers/consultarSolicitudesEmpresa.php`

---

## Verificaciones Adicionales Recomendadas

### 6. **Verificar Conexión a Base de Datos**
**Archivo:** `models/conexion.php`
- Confirmar que las credenciales de base de datos sean correctas
- Verificar que la tabla `solicitud_de_recoleccion` exista y tenga los campos necesarios

### 7. **Verificar Permisos de Usuario**
- Confirmar que el usuario tipo "empresa-reciclador" tenga permisos para:
  - Consultar solicitudes con estado 'Pendiente' 
  - Actualizar estado de solicitudes a 'En Proceso' o 'Cancelada'

### 8. **Verificar Estructura de Base de Datos**
**Tabla requerida:** `solicitud_de_recoleccion`
**Campos necesarios:**
- `id` (Primary Key)
- `usuario_id` 
- `tipo_residuo`
- `cantidad`
- `descripccion` (Nota: hay un typo, tiene 3 'c')
- `ubicacion`
- `imagen`
- `estado_peticion` (Valores: 'Pendiente', 'En Proceso', 'Finalizada', 'Cancelada')

## Orden de Implementación Sugerido

1. **PRIMERO:** Incluir `modal_solicitud.php` (Error #1)
2. **SEGUNDO:** Corregir sintaxis JavaScript (Errores #2, #3)
3. **TERCERO:** Corregir redirecciones (Error #4)
4. **CUARTO:** Arreglar controlador de búsqueda (Error #5)
5. **QUINTO:** Verificar base de datos y permisos

Una vez aplicadas estas correcciones, las funcionalidades de eliminar y aceptar solicitudes deberían funcionar correctamente en el dashboard de empresa-reciclador.