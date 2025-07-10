<?php
// controllers/actualizarUsuarios.php

include '../models/solicitudesModel.php';
$solicitud = new solicitud();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dato'], $_POST['valor'])) {
    $filtro   = $_POST['valor'];
    $valor    = $_POST['dato'];
    $solicitudes = $solicitud->ConsultaEspecifica($filtro, $valor);
    echo "<script>
                
                location.href='../views/administrador.php';
        </script>";
    
} else {
    $solicitudes = $solicitud->ConsultaGeneral();
}
?>
