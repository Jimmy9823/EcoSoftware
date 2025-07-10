<?php
// Clase capacitaciones
class capacitaciones {

    // Registrar nueva capacitación
    public function registrarCapacitacion($titulo, $descripcion, $fecha, $duracion, $imagen) {
        try {
            include "conexion.php";
            $registrar = $conexion->prepare("INSERT INTO capacitacion (nombre, descripcion, fecha, duracion, imagen) VALUES (?, ?, ?, ?, ?)");
            $registrar->execute([$titulo, $descripcion, $fecha, $duracion, $imagen]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    // Consultar todas las capacitaciones
    public function consultaGeneral() {
        try {
            include "conexion.php";
            $consultar = $conexion->prepare("SELECT * FROM capacitacion ORDER BY id DESC");
            $consultar->execute();
            return $consultar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e;
        }
    }

    // Buscar capacitaciones por nombre
    public function consultaEspecifica($valor) {
        try {
            include "conexion.php";
            $consultar = $conexion->prepare("SELECT * FROM capacitacion WHERE nombre LIKE ?");
            $consultar->execute(["%$valor%"]);
            return $consultar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e;
        }
    }

    // Editar capacitación existente
    public function editarCapacitacion($id, $titulo, $descripcion, $fecha, $duracion, $imagen) {
        try {
            include "conexion.php";
            $actualizar = $conexion->prepare("UPDATE capacitacion SET nombre = ?, descripcion = ?, fecha = ?, duracion = ?, imagen = ? WHERE id = ?");
            $actualizar->execute([$titulo, $descripcion, $fecha, $duracion, $imagen, $id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    // Eliminar capacitación
    public function eliminarCapacitacion($id) {
        try {
            include "conexion.php";
            $eliminar = $conexion->prepare("DELETE FROM capacitacion WHERE id = ?");
            $eliminar->execute([$id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}
?>
