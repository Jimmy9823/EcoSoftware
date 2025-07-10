<?php

class blog {

    public function Registrar($nombre, $descripcion, $contenido, $reacciones, $vistas, $comentarios, $blog_id, $usuario_id)
    {
        try {
            include "conexion.php";
            $sql = $conexion->prepare("INSERT INTO blog(nombre, descripcion, contenido, reacciones, vistas, comentarios, blog_id, usuario_id, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, true)");
            $sql->execute([$nombre, $descripcion, $contenido, $reacciones, $vistas, $comentarios, $blog_id, $usuario_id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function Consultar()
    {
        try {
            include "conexion.php";
            $sql = $conexion->prepare("SELECT * FROM blog WHERE estado = true");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_NUM);
            return $lista;
        } catch (Exception $e) {
            return $e;
        }
    }
    // Método para consultar un blog específico por ID

    public function ConsultaEspecifica($campo, $valor)
    {
        try {
            include "conexion.php";

            if ($campo === 'nombre') {
                $sql = $conexion->prepare("SELECT * FROM blog WHERE nombre LIKE ? AND estado = true");
                $sql->execute(["%{$valor}%"]);
            } else {
                $sql = $conexion->prepare("SELECT * FROM blog WHERE $campo = ? AND estado = true");
                $sql->execute([$valor]);
            }

            $resultado = $sql->fetchAll(PDO::FETCH_NUM);
            return $resultado;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function Actualizar($id, $nombre, $descripcion, $contenido, $estado)
    {
        try {
            include "conexion.php";
            $sql = $conexion->prepare("UPDATE blog SET 
                nombre = ?, 
                descripcion = ?, 
                contenido = ?,
                estado = ?, 
                WHERE id = ?");
            $sql->execute([$nombre, $descripcion, $contenido, $estado, $id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function Eliminar($id)
    {
        try {
            include "conexion.php";
            // Eliminación lógica
            $sql = $conexion->prepare("UPDATE blog SET estado = false WHERE id = ?");
            $sql->execute([$id]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}
?>
