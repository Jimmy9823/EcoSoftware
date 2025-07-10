<?php

// Clase base usuarios
class usuarios {

    // Login de usuario
    public function Login($correo, $contraseña) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("SELECT id, correo, contraseña, tipo_rol FROM usuario WHERE correo=? AND contraseña=?");
            $query->execute([$correo, $contraseña]);
            return $query->fetchAll(PDO::FETCH_NUM);
        } catch (Exception $e) {
            return null;
        }
    }

    // Consultar usuario por ID
    public function Consulta($id) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("SELECT * FROM usuario WHERE id=?");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }

    // Eliminar usuario
    public function Eliminar($id) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("UPDATE usuario SET estado='I' WHERE id=?");
            $query->execute([$id]);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }
}

// Clase administrador hereda de usuarios
class administrador extends usuarios {

    // Registrar usuario
    public function Registrar($rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $contraseña) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("INSERT INTO usuario (rol_id, tipo_rol, nombre, cedula, correo, telefono, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $contraseña]);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }

    // Actualizar usuario
    public function Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $contraseña = null, $imagen_perfil = null) {
        try {
            include "conexion.php";
            $sql = "UPDATE usuario SET tipo_rol=?, nombre=?, correo=?, telefono=?";
            $params = [$tipo_rol, $nombre, $correo, $telefono];

            if (!empty($contraseña)) {
                $sql .= ", contraseña=?";
                $params[] = $contraseña;
            }

            if (!empty($imagen_perfil)) {
                $sql .= ", imagen_perfil=?";
                $params[] = $imagen_perfil;
            }

            $sql .= " WHERE id=?";
            $params[] = $id;

            $query = $conexion->prepare($sql);
            $query->execute($params);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }
}

// Clase ciudadano hereda de usuarios
class ciudadano extends usuarios {

    // Registrar ciudadano
    public function Registrar($rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $direccion, $barrio, $localidad, $contraseña) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("INSERT INTO usuario (rol_id, tipo_rol, nombre, cedula, correo, telefono, direccion, barrio, localidad, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $direccion, $barrio, $localidad, $contraseña]);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }

    // Actualizar ciudadano
    public function Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad, $contraseña = null, $imagen_perfil = null) {
        try {
            include "conexion.php";
            $sql = "UPDATE usuario SET tipo_rol=?, nombre=?, correo=?, telefono=?, direccion=?, barrio=?, localidad=?";
            $params = [$tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad];

            if (!empty($contraseña)) {
                $sql .= ", contraseña=?";
                $params[] = $contraseña;
            }

            if (!empty($imagen_perfil)) {
                $sql .= ", imagen_perfil=?";
                $params[] = $imagen_perfil;
            }

            $sql .= " WHERE id=?";
            $params[] = $id;

            $query = $conexion->prepare($sql);
            $query->execute($params);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }
}

// Clase reciclador hereda de usuarios
class reciclador extends usuarios {

    // Registrar reciclador
    public function Registrar($rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $zona_de_trabajo, $horario, $cantidad_minina, $contraseña) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("INSERT INTO usuario (rol_id, tipo_rol, nombre, cedula, correo, telefono, zona_de_trabajo, horario, cantidad_minina, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$rol_id, $tipo_rol, $nombre, $cedula, $correo, $telefono, $zona_de_trabajo, $horario, $cantidad_minina, $contraseña]);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }

    // Actualizar reciclador
    public function Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $zona_de_trabajo, $horario, $contraseña = null, $imagen_perfil = null) {
        try {
            include "conexion.php";
            $consulta = "UPDATE usuario SET tipo_rol=?, nombre=?, correo=?, telefono=?, zona_de_trabajo=?, horario=?";
            $resultados = [$tipo_rol, $nombre, $correo, $telefono, $zona_de_trabajo, $horario];

            if (!empty($contraseña)) {
                $consulta .= ", contraseña=?";
                $resultados[] = $contraseña;
            }

            if (!empty($imagen_perfil)) {
                $consulta .= ", imagen_perfil=?";
                $resultados[] = $imagen_perfil;
            }

            $consulta .= " WHERE id=?";
            $resultados[] = $id;

            $actualizacion = $conexion->prepare($consulta);
            $actualizacion->execute($resultados);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }
}

// Clase empresa hereda de usuarios
class empresa extends usuarios {

    // Registrar empresa
    public function Registrar($rol_id, $tipo_rol, $nombre, $nit, $correo, $telefono, $direccion, $barrio, $localidad, $horario, $cantidad_minina, $contraseña) {
        try {
            include "conexion.php";
            $query = $conexion->prepare("INSERT INTO usuario (rol_id, tipo_rol, nombre, nit, correo, telefono, direccion, barrio, localidad, horario, cantidad_minina, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$rol_id, $tipo_rol, $nombre, $nit, $correo, $telefono, $direccion, $barrio, $localidad, $horario, $cantidad_minina, $contraseña]);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }

    // Actualizar empresa
    public function Actualizar($id, $tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad, $representante, $horario, $contraseña = null, $imagen_perfil = null) {
        try {
            include "conexion.php";
            $sql = "UPDATE usuario SET tipo_rol=?, nombre=?, correo=?, telefono=?, direccion=?, barrio=?, localidad=?, zona_de_trabajo=?, horario=?";
            $params = [$tipo_rol, $nombre, $correo, $telefono, $direccion, $barrio, $localidad, $representante, $horario];

            if (!empty($contraseña)) {
                $sql .= ", contraseña=?";
                $params[] = $contraseña;
            }

            if (!empty($imagen_perfil)) {
                $sql .= ", imagen_perfil=?";
                $params[] = $imagen_perfil;
            }

            $sql .= " WHERE id=?";
            $params[] = $id;

            $query = $conexion->prepare($sql);
            $query->execute($params);
            return true;
        } catch (Exception $e) {
            return null;
        }
    }
}

?>

