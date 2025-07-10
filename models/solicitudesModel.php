<?php
class solicitud{
    public function Registro_solicitud($idUsuario,$tipo, $cantidad,$descripcion,$ubicacion, $imagen){

        // Validar que los campos no esten vacios
        try {
            //llamar a la conexion
            include "conexion.php";

            
            $regSolicitud = $conexion->prepare("insert into solicitud_de_recoleccion( usuario_id, tipo_residuo, cantidad, descripccion, ubicacion, imagen ) values(?,?,?,?,?,?)");

            // Ejecutar la consulta con los parámetros proporcionados y obtener los resultados
            $regSolicitud ->execute([$idUsuario, $tipo, $cantidad,$descripcion,$ubicacion, $imagen]);

            // Verificar si se encontró un usuario con el correo y contraseña proporcionados
            

            // Cerrar la conexión
            $conexion = null;
            // Retornar la lista de usuarios encontrados
            return true;
        } catch (Exception $e) {// Si ocurre una excepción, retornar el objeto de excepción
            return $e;// Retornar el objeto de excepción
        }
    }

    public function ConsultaGeneral(){
          try{
            include "conexion.php";
            $consultar = $conexion->prepare("select * from solicitud_de_recoleccion where estado_peticion != 'Cancelada' order by id desc");
            $consultar->execute();
            $lista = $consultar->fetchAll(PDO::FETCH_NUM); 
            $conexion = null;
            return $lista;
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function ConsultaEspecifica($campo, $valor) {
    try {
        include "conexion.php";
        $sql = "SELECT * FROM solicitud_de_recoleccion WHERE $campo = ?";
        if ($campo == 'estado_peticion'|| $campo=='tipo_residuo' || $campo== 'id') {
                $sql = "SELECT * FROM solicitud_de_recoleccion WHERE estado_peticion LIKE ?";
            }
        $consultar = $conexion->prepare($sql);
        $consultar->execute([$valor]);
        $lista = $consultar->fetchAll(PDO::FETCH_NUM);
        $conexion = null;
        return $lista;
    } catch(Exception $e) {
        return $e;
    }
}

    
  public function Actualizar($id, $tipo, $cantidad, $estado, $descripccion, $ubicacion, $imagen) {
    try {
        include "conexion.php";
        $actualizar = $conexion->prepare("UPDATE solicitud_de_recoleccion 
            SET tipo_residuo = ?, 
                cantidad = ?, 
                estado_peticion = ?, 
                descripccion = ?, 
                ubicacion = ?,
                imagen = ?
            WHERE id = ?");
        
        $actualizar->execute([$tipo, $cantidad, $estado, $descripccion, $ubicacion, $imagen, $id]);
        
        $conexion = null;
        return true; // Retorna true si todo salió bien
    } catch (Exception $e) {
        return $e; // Retorna el mensaje del error
    }
}
    public function Cancelar($id){
        try{
            include "conexion.php";
            $cancelar = $conexion->prepare("update solicitud_de_recoleccion set estado_peticion='Cancelada' where id=?");
            $cancelar->execute([$id]);
            $conexion=null;
            return true;
        }catch(Exception $e){
            return $e;
        }
    }
     public function Aceptar($id){
        try{
            include "conexion.php";
            $aceptar = $conexion->prepare("update solicitud_de_recoleccion set estado_peticion='En Proceso' where id=?");
            $aceptar->execute([$id]);
            $conexion=null;
            return true;
        }catch(Exception $e){
            return $e;
        }
    }

    public function ConsultaGeneralEmpresaReciclador(){
          try{
            include "conexion.php";
            $consultar = $conexion->prepare("select * from solicitud_de_recoleccion where estado_peticion = 'Pendiente' or estado_peticion = 'Finalizada'  order by id desc");
            $consultar->execute();
            $lista = $consultar->fetchAll(PDO::FETCH_NUM); 
            $conexion = null;
            return $lista;
        }
        catch(Exception $e){
            return $e;
        }
}
}