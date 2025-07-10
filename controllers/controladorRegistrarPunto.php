<?php

var_dump($_POST);

include "../models/punto.php";

$punto = new PuntoReciclaje();

$imagen = null;
if (!empty($_FILES['imagen']['tmp_name'])) {
    $ruta = "uploads/" . basename($_FILES['imagen']['name']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    $imagen = $ruta;
}

$respuesta = $punto->Registrar(
    $_POST["nombre"],
    $_POST["direccion"],
    $_POST["horario"],
    $_POST["tipo_residuo"],
    $_POST["descripcion"] ?? null,
    $_POST["latitud"],
    $_POST["longitud"],
    $_POST["usuario_id"],
    $imagen
);

if($respuesta instanceof Exception){
    if($respuesta->getCode() == 23000){
        echo "<script>
                alert('El punto ya existe o hay un dato duplicado.');
                location.href='../views/puntos.php';
              </script>";
    }
    else{
        echo "<script>
                alert('Error de conexión, intente más tarde');
                location.href='../views/puntos.php';
              </script>";
    }
}
else if($respuesta == true){
    echo "<script>
            alert('Registro exitoso, nuevo punto registrado');
            location.href='../views/puntos.php';
          </script>";
}
?>
