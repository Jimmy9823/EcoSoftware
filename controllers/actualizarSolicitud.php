 <?php
 include "../models/solicitudesModel.php";
 $solicitud = new solicitud();

    // Se llama el método para actualizar
    $respuesta = $solicitud->Actualizar($_POST["id"],$_POST["tipo"],$_POST["cantidad"],$_POST["descripcion"], $_POST["descripcion"],$_POST["ubicacion"], $_POST["imagen"]);

    // Redirigimos de nuevo a la vista principal o mostramos mensaje
    if ($respuesta === true) {
        header("Location: ../views/dashboard_ciudadano.php#solicitud");
    } else {
        header("Location: ../views/index.html");
    }

?>