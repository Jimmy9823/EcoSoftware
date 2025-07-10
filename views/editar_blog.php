<script>
    function editarFila(enlace) {
        const fila = enlace.closest('tr');

        const idCelda = fila.querySelector('.id');
        const nombreCelda = fila.querySelector('.nombre');
        const descripcionCelda = fila.querySelector('.descripcion');
        const contenidoCelda = fila.querySelector('.contenido');
        const estadoCelda = fila.querySelector('.estado');

        const idActual = idCelda.textContent;
        const nombreActual = nombreCelda.textContent;
        const descripcionActual = descripcionCelda.textContent;
        const contenidoActual = contenidoCelda.textContent;
        const estadoActual = estadoCelda.textContent;

        idCelda.innerHTML = `<input type="number" name="id" readonly value="${idActual}">`;
        nombreCelda.innerHTML = `<input type="text" name="nombre" value="${nombreActual}">`;
        descripcionCelda.innerHTML = `<input type="text" name="descripcion" value="${descripcionActual}">`;
        contenidoCelda.innerHTML = `<input type="text" name="contenido" value="${contenidoActual}">`;
        estadoCelda.innerHTML = `
            <select name="estado">
                <option value="1" ${estadoActual.trim() == "1" ? "selected" : ""}>Activo</option>
                <option value="0" ${estadoActual.trim() == "0" ? "selected" : ""}>Inactivo</option>
            </select>
        `;

        const enlaces = fila.querySelectorAll('a');
        if (enlaces.length >= 1) {
            const primerEnlace = enlaces[0];
            const boton = document.createElement('button');
            boton.textContent = 'Actualizar';
            boton.onclick = function () {
                Enviar();
            };
            primerEnlace.replaceWith(boton);
        }
    }

    function Enviar() {
        document.getElementById("formu").submit(); 
    }
</script>


<?php

include "../models/blog.php";

$consultar = new blog();

if(isset($_POST["dato"])){
    //Si el usuario utiliza el buscador asignando datos, se ejecuta la consulta Específica
    $respuesta = $consultar->ConsultaEspecifica($_POST["dato"],$_POST["valor"]);
}
else{
    //Si el usuario no utiliza el buscador, se ejecuta la consulta General
    $respuesta = $consultar->Consultar();
}

//Se define el formulario con id formu para que desde JS se pueda enviar
//Toda la tabla esta dentro de un form para que al dar clic en el botón Actualizar,
//los datos sean enviados al controlador actualizar y la lógica se ejecute
echo "<form id='formu' action='../controllers/actualizarBlog.php' method='post'><table class='table table-hover'><tr>
        <th>ID</th>
        <th>nombre</th>
        <th>descripcion</th>
        <th>contenido</th>
        <th>estado</th>
        </tr>";

foreach($respuesta as $fila){
    //Cada celda tiene un id para que el dato sea almacenado desde JS
    //Al dar clic en el link Editar, se ejecuta la función JS llamada editarFila
    //Al dar clic en el link Eliminar se comunica el id del usuario para realizar el cambio de estado
    echo "<tr><td class='id'>$fila[0]</td>
        <td class='nombre'>$fila[1]</td>
        <td class='descripcion'>$fila[2]</td>
        <td class='contenido'>$fila[3]</td>
        <td class='estado'>$fila[9]</td>
        <td><a href='../controllers/editar_blog.php' onclick='editarFila(this);'>Editar</a></td>
        <td><a href='../controllers/eliminar_blog.php?codigo=$fila[0]'>Eliminar</a></td>
        </tr>";
}
echo "</table></form>";

//Almacene los datos de la tabla en la sesión activa
$_SESSION["respuesta"]=$respuesta;

//Defina un link o botón que ejecute el controlador respectivo
// echo "<a href='../controllers/reportexls_usuarios.php'>Exportar a Excel</a>";
// echo "<hr>";
// echo "<a href='../controllers/reportepdf_usuarios.php'>Exportar a Pdf</a>";

?>