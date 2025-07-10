<script>
function editarUsuario(enlace) {
    const fila = enlace.closest('tr');

    const idCelda = fila.querySelector('.id');
    const rolCelda = fila.querySelector('.rol');
    const nombreCelda = fila.querySelector('.nombre');
    const correoCelda = fila.querySelector('.correo');
    const telefonoCelda = fila.querySelector('.telefono');
    const direccionCelda = fila.querySelector('.direccion');
    const barrioCelda = fila.querySelector('.barrio');
    const localidadCelda = fila.querySelector('.localidad');
    const contraseñaCelda = fila.querySelector('.contraseña');

    const idActual = idCelda.textContent.trim();
    const rolActual = rolCelda.textContent.trim();
    const nombreActual = nombreCelda.textContent.trim();
    const correoActual = correoCelda.textContent.trim();
    const telefonoActual = telefonoCelda.textContent.trim();
    const direccionActual = direccionCelda.textContent.trim();
    const barrioActual = barrioCelda.textContent.trim();
    const localidadActual = localidadCelda.textContent.trim();
    const contraseñaActual = contraseñaCelda.textContent.trim();

    idCelda.innerHTML = `<input type="number" name="id" readonly value="${idActual}">`;
    rolCelda.innerHTML = `<input type="text" name="tipo_rol" value="${rolActual}">`;
    nombreCelda.innerHTML = `<input type="text" name="nombre" value="${nombreActual}">`;
    correoCelda.innerHTML = `<input type="email" name="correo" readonly value="${correoActual}">`;
    telefonoCelda.innerHTML = `<input type="text" name="telefono" value="${telefonoActual}">`;
    direccionCelda.innerHTML = `<input type="text" name="direccion" value="${direccionActual}">`;
    barrioCelda.innerHTML = `<input type="text" name="barrio" value="${barrioActual}">`;
    localidadCelda.innerHTML = `<input type="text" name="localidad" value="${localidadActual}">`;
    contraseñaCelda.innerHTML = `<input type="password" name="contraseña" value="${contraseñaActual}">`;

    const enlaces = fila.querySelectorAll('a');
    if (enlaces.length >= 1) {
        const primerEnlace = enlaces[0];
        const boton = document.createElement('button');
        boton.textContent = 'Actualizar';
        boton.name = 'actualizar';
        boton.type = 'submit';
        boton.classList.add('btn', 'btn-success');
        primerEnlace.replaceWith(boton);
    }
}
</script>

<?php
include "../models/usuarios.php";
$consultar = new usuarios();

if (isset($_POST["dato"])) {
  $respuesta = $consultar->ConsultaEspecifica($_POST["dato"], $_POST["valor"]);
} else {
  $respuesta = $consultar->ConsultaGeneral();
}

echo "<form id='formu' action='../controllers/actualizar_usuarios.php' method='post'>
  <table class='table table-hover' style='background-color: #1e1e1e; color: white;'>
    <tr>
      <th>ID</th>
      <th>Rol</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Teléfono</th>
      <th>Dirección</th>
      <th>Barrio</th>
      <th>Localidad</th>
      <th>Contraseña</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>";

foreach ($respuesta as $fila) {
  echo "<tr>
      <td class='id'>{$fila[0]}</td>
      <td class='rol'>{$fila[12]}</td>
      <td class='nombre'>{$fila[2]}</td>
      <td class='correo'>{$fila[4]}</td>
      <td class='telefono'>{$fila[6]}</td>
      <td class='direccion'>{$fila[8]}</td>
      <td class='barrio'>{$fila[9]}</td>
      <td class='localidad'>{$fila[10]}</td>
      <td class='contraseña'>{$fila[3]}</td>
      <td><a href='#' onclick='editarUsuario(this); return false;'>Editar</a></td>
      <td><a href='../controllers/eliminar_usuarios.php?codigo={$fila[0]}'>Eliminar</a></td>
    </tr>";
}

echo "</table></form>";




$_SESSION["respuesta"] = $respuesta;
?>
