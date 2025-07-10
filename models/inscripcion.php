<?php


//class Inscripcion
class Inscripcion {

    //metodo para registrar una inscripción
    public function registrar($fecha, $estado, $curso_id, $usuario_id) {
        try {
            include "conexion.php";  // Importas la conexión con $conexion (PDO)

            // Preparar consulta
            $insertar = $conexion->prepare("INSERT INTO inscripcion (fecha_de_inscripcion, estado_curso, curso_id, usuario_id) VALUES (?, ?, ?, ?)");
            
            // Ejecutar la consulta
            $insertar->execute([$fecha, $estado, $curso_id, $usuario_id]);

            $conexion = null;  // Cerrar conexión
            return true;  // Todo bien
        }
        catch (Exception $e) {
            return $e;  // Devuelve el error si ocurre algo
        }
    }

    // Método para consultar las capacitaciones a las que un usuario está inscrito
    public function consultarCapacitacionesUsuario($usuario_id){
    try {
        include "conexion.php";
        $consulta = $conexion->prepare("
            SELECT capacitacion.id, capacitacion.nombre, capacitacion.descripcion, capacitacion.imagen, inscripcion.fecha_de_inscripcion, inscripcion.estado_curso
            FROM inscripcion
            INNER JOIN capacitacion ON inscripcion.curso_id = capacitacion.id
            WHERE inscripcion.usuario_id = ?
        ");
        $consulta->execute([$usuario_id]);
        $lista = $consulta->fetchAll(PDO::FETCH_ASSOC); 
        return $lista;
    } catch (Exception $e) {
        return [];
    }
}


}
?>

