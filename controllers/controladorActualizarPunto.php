<?php

include "../models/punto.php";

$punto = new PuntoReciclaje();

$imagen = null;
if (!empty($_FILES['imagen']['tmp_name'])) {
    $ruta = "uploads/" . basename($_FILES['imagen']['name']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    $imagen = $ruta;
}

$respuesta = $punto->Actualizar(
    $_POST["id"],
    $_POST["nombre"],
    $_POST["direccion"],
    $_POST["horario"],
    $_POST["tipo_residuo"],
    $_POST["descripcion"] ?? null,
    $_POST["latitud"],
    $_POST["longitud"],
    $imagen
);

if($respuesta instanceof Exception){
    if($respuesta->getCode() == 23000){
        echo "<script>
                alert('Dato duplicado, verifique la información');
                location.href='../views/puntos.php';        
              </script>";
    }
    else{
        echo "<script>
                alert('Error en la actualización, intente más tarde');
                location.href='../views/puntos.php';
              </script>";
    }
}
else if($respuesta == true){
    echo "<script>
            alert('Registro actualizado correctamente');
            location.href='../views/puntos.php';        
          </script>";
}
?>
