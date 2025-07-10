<?php

class PuntoReciclaje {

    public function Registrar($nombre, $ubicacion, $horario, $tipo_residuo, $otro, $latitud, $longitud, $usuario_id, $imagen = null) {
        try {
            include "conexion.php";
            $insertar = $conexion->prepare("INSERT INTO punto_de_reciclaje (nombre, ubicacion, horario, tipo_de_residuo, otro, latitud, longitud, usuario_id, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insertar->execute([$nombre, $ubicacion, $horario, $tipo_residuo, $otro, $latitud, $longitud, $usuario_id, $imagen]);
            $conexion = null;
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function ConsultaGeneral() {
        try {
            include "conexion.php";
            $consulta = $conexion->prepare("SELECT * FROM punto_de_reciclaje");
            $consulta->execute();
            $lista = $consulta->fetchAll(PDO::FETCH_NUM);
            return $lista;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function ConsultaEspecifica($columna, $valor) {
        try {
            include "conexion.php";
            $consulta = $conexion->prepare("SELECT * FROM punto_de_reciclaje WHERE $columna = ?");
            $consulta->execute([$valor]);
            $lista = $consulta->fetchAll(PDO::FETCH_NUM);
            return $lista;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function Actualizar($id, $nombre, $ubicacion, $horario, $tipo_residuo, $otro, $latitud, $longitud, $imagen = null) {
        try {
            include "conexion.php";

            if ($imagen !== null) {
                $actualizar = $conexion->prepare("UPDATE punto_de_reciclaje SET nombre=?, ubicacion=?, horario=?, tipo_de_residuo=?, otro=?, latitud=?, longitud=?, imagen=? WHERE id=?");
                $actualizar->execute([$nombre, $ubicacion, $horario, $tipo_residuo, $otro, $latitud, $longitud, $imagen, $id]);
            } else {
                $actualizar = $conexion->prepare("UPDATE punto_de_reciclaje SET nombre=?, ubicacion=?, horario=?, tipo_de_residuo=?, otro=?, latitud=?, longitud=? WHERE id=?");
                $actualizar->execute([$nombre, $ubicacion, $horario, $tipo_residuo, $otro, $latitud, $longitud, $id]);
            }

            $conexion = null;
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function Eliminar($id) {
        try {
            include "conexion.php";
            $eliminar = $conexion->prepare("DELETE FROM punto_de_reciclaje WHERE id=?");
            $eliminar->execute([$id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}

?>
