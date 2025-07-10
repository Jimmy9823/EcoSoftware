<?php

var_dump($_GET);

include "../models/punto.php";

$punto = new PuntoReciclaje();

$respuesta = $punto->Eliminar($_GET["id"]);

if($respuesta instanceof Exception){
    echo "<script>
            alert('Error de servidor, reintente más tarde'); 
            location.href='../views/puntos.php';   
          </script>";
}
else{
    echo "<script>
            alert('Eliminación correcta');
            location.href='../views/puntos.php';    
          </script>";
}
?>
