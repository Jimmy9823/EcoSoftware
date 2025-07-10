<?php


session_start();
$registrado_por = $_SESSION["id"];
var_dump($_SESSION);
include "../models/solicitudesModel.php";
$solicitud = new solicitud();
$respuesta = $solicitud->Registro_solicitud($registrado_por,$_POST["tipo_res"],$_POST["cantidad"],$_POST["descripcion"],$_POST["ubicacion"], $_POST["imagen"]);

if($respuesta instanceof Exception){
    if( empty($registrado_por)){
        echo "<script>
                alert('');
                location.href='../views/administrador.php';
        </script>";
    }
    else{
        echo "<script>
                alert('Error de conexión, intente más tarde');
                location.href='../views/index.html';
        </script>";
    }
}else if($respuesta == true){
    echo "<script>
            alert('Registro exitoso, solicitud registrada');
            location.href='../views/administrador.php';
    </script>";
}

?>


