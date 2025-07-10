<?php

// Array con los tipos de roles
$tipo_rol = [
    2 => "Ciudadano",
    3 => "Empresa",
    4 => "Reciclador"
];

// Registro de ciudadano
if($_POST["rol"]=="2"){

    // Incluir el modelo y crear instancia
    include "../../models/usuarios.php";
    $ciudadano = new ciudadano();

    $tipoRol = $tipo_rol[$_POST["rol"]];

    // Registrar ciudadano con datos del formulario
    $respuesta = $ciudadano -> Registrar($_POST["rol"],$tipoRol,$_POST["nombreCiu"],$_POST["cedulaCiu"],$_POST["correoCiu"],$_POST["telefonoCiu"],$_POST["direccionCiu"],$_POST["barrioCiu"],$_POST["localidadCiu"],$_POST["contraseñaCiu"], $_POST["imagenCiu"]);

    // Verificar si hay error
    if($respuesta instanceof Exception){

        // Usuario ya existe
        if($respuesta->getCode() == 23000){
            echo "<script>
                    alert('El usuario ya existe, verifique cédula o correo electrónico');
                    location.href='../../views/index.html';
            </script>";

        }else { // Error de conexión
            echo "<script>
                    alert('Error de conexión, intente más tarde');
                    location.href='../../views/500.html';
            </script>";
        }

    }else if($respuesta == true){// Registro exitoso
        echo "<script>
                    alert('Registro exitoso');
                    location.href='../../views/dashboard_ciudadano.php';
            </script>";
    }
}

// Registro de reciclador
if ($_POST["rol"] == "4") {

    // Incluir el modelo y crear instancia
    include "../../models/usuarios.php";
    $reciclador = new reciclador();

    $tipoRol = $tipo_rol[$_POST["rol"]];
    
    // Registrar reciclador con datos del formulario
    $respuesta = $reciclador->Registrar($_POST["rol"],$tipoRol, $_POST["nombreRec"],$_POST["cedulaRec"],$_POST["correoRec"],$_POST["telefonoRec"],$_POST["zonaRec"],$_POST["horarioRec"],$_POST["cantidadMinRec"],$_POST["contraseñaRec"], $_POST["imagenRec"]);
    
    // Verificar si hay error
    if ($respuesta instanceof Exception) {
        
        // Usuario ya existe
        if ($respuesta->getCode() == 23000) {
            echo "<script>
                    alert('El usuario ya existe, verifique cédula o correo electrónico');
                    location.href='../../views/index.html';
            </script>";

        } else {// Error de conexión
            echo "<script>
                    alert('Error de conexión, intente más tarde');
                    location.href='../../views/500.html';
            </script>";
        }

    } elseif ($respuesta == true) {// Registro exitoso
        echo "<script>
                alert('Registro exitoso, nuevo usuario registrado');
                location.href='../../views/dash_reciclador_empresa.php';
        </script>";
    }
}

// Registro de empresa
if ($_POST["rol"] == "3") {

    // Incluir el modelo y crear instancia
    include "../../models/usuarios.php";
    $empresa = new empresa();

    $tipoRol = $tipo_rol[$_POST["rol"]];

    // Registrar empresa con datos del formulario
    $respuesta = $empresa->Registrar($_POST["rol"],$tipoRol, $_POST["nombreEmp"], $_POST["nitEmp"], $_POST["correoEmp"], $_POST["telefonoEmp"], $_POST["direccionEmp"], $_POST["barrioEmp"], $_POST["localidadEmp"], $_POST["horarioEmp"], $_POST["cantidadMinEmp"], $_POST["contraseñaEmp"]);

    // Verificar si hay error
    if ($respuesta instanceof Exception) {
        // Usuario ya existe
        if ($respuesta->getCode() == 23000) {
            echo "<script>
                    alert('El usuario ya existe, verifique NIT o correo electrónico');
                    location.href='../../views/index.html';
            </script>";

        } else {// Error de conexión
            echo "<script>
                    alert('Error de conexión, intente más tarde');
                    location.href='../../views/500.html';
            </script>";
        }

    } elseif ($respuesta == true) {// Registro exitoso
        echo "<script>
                alert('Registro exitoso, nuevo usuario registrado');
                location.href='../../views/dash_reciclador_empresa.php';
        </script>";
    }
}

?>