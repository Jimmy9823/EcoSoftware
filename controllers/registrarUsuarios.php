<?php
session_start();
require_once '../models/usuarios.php';

if($_POST["rol"] == "Empresa") {
    // Instanciar el modelo y registrar
    $usuario = new empresa();
    $registrado = $usuario->RegistrarEmpresa(
        $_POST["rol"],
        $_POST["nombreEmp"],
        $_POST["nitEmp"],
        $_POST["correoEmp"],
        $_POST["telefonoEmp"],
        $_POST["direccionEmp"],
        $_POST["barrioEmp"],
        $_POST["localidadEmp"],
        $_POST["horarioEmp"],
        $_POST["cantidadMinEmp"],
        $_POST["contraseñaEmp"],
        $_POST["imagenEmp"]
    );

    if ($registrado) {
        header("Location: ../views/administrador.php?mensaje=registro_exitoso");
        exit;
    } else {
        echo "Error al registrar el usuario.";
    }
}
if($_POST["rol"] == "Ciudadano") {
    $usuario = new ciudadano();
    $registrado = $usuario->Registrar(
        $_POST["rol"],
        $_POST["nombreCiu"],
        $_POST["cedulaCiu"],
        $_POST["correoCiu"],
        $_POST["telefonoCiu"],
        $_POST["direccionCiu"],
        $_POST["barrioCiu"],
        $_POST["localidadCiu"],
        $_POST["contraseñaCiu"],
        $_POST["imagenCiu"]
    );

    if ($registrado) {
        header("Location: ../views/administrador.php?mensaje=registro_exitoso");
        exit;
    } else {
        echo "Error al registrar el usuario.";
    }
}   

if($_POST["rol"] == "Reciclador") {
    $usuario = new reciclador();
    $registrado = $usuario->RegistrarReciclador(
        $_POST["rol"],
        $_POST["nombreRec"],
        $_POST["cedulaRec"],
        $_POST["correoRec"],
        $_POST["telefonoRec"],
        $_POST["zonaRec"],
        $_POST["horarioRec"],
        $_POST["cantidadMinRec"],
        $_POST["contraseñaRec"],
        $_POST["imagenRec"]
    );

    if ($registrado) {
        header("Location: ../views/administrador.php?mensaje=registro_exitoso");
        exit;
    } else {
        echo "Error al registrar el usuario.";
    }
}