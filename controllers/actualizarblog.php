<?php
include "../models/blog.php";
//haciendo pruebas
$actualizar = new blog();
$respuesta = $actualizar -> Actualizar($_POST["id"],$_POST["nombre"],
    $_POST["descripcion"],$_POST["contenido"],
    $_POST["estado"]);
if($respuesta instanceof Exception){
    echo "<script>
            alert('Error de servidor, reintente más tarde'); 
            location.href='../views/index.html';   
    </script>";
}
else{
    echo "<script>
            alert('Eliminación correcta');
            location.href='../views/administrador.php';    
    </script>";
}

?>