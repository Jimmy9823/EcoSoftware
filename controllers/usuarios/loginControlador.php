<?php
// Incluir el modelo de usuarios
include "../../models/usuarios.php";

// Crear instancia y verificar login
$usuario = new usuarios();
$respuesta = $usuario->Login($_POST["correo"],$_POST["contraseña"]);

// Verificar si hay error en la base de datos
if($respuesta instanceof Exception){
    header("location:../../views/500.html");
}
// Si encuentra datos del usuario
else if(!empty($respuesta)){
    // Iniciar sesión y guardar datos
    session_start();
    $_SESSION["id"] = $respuesta[0][0];
    $_SESSION["perfil"] = $respuesta[0][3];

    // Redirigir según el tipo de perfil
    if($_SESSION["perfil"]=="Administrador"){
        header("location:../../views/dashboard_admin.php");
        
    }
    elseif($_SESSION["perfil"]=="Ciudadano"){
        header("location:../../views/dashboard_ciudadano.php");
    }
    elseif($_SESSION["perfil"]=="Reciclador"){
        header("location:../../views/dash_reciclador_empresa.php");
    }
    elseif($_SESSION["perfil"]=="Empresa"){
        header("location:../../views/dash_reciclador_empresa.php");
    }
    else{
        header("location:../../views/index.php");
    }
}
// Si no encuentra el usuario
else{
    echo "
        <script>
            alert('Datos de usuario no encontrados');
            location.href='../../views/registro.php';
        </script>
    ";
}
?>