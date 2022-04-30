<?php
require_once "conexion.php";

class modeloEstado{

    static public function listarEstado($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE EstadoID = :EstadoID");

        $stmt->bindParam(":EstadoID", $datos["EstadoID"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function insertarEstado($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Estado_Solicitud,Estado_Actual,Detalle,Costototal,Prestacion,Fecha_Inicio,Fecha_Fin,Solicitud_SolicitudID,Mecanico_Mecanico) VALUES (:Estado_Solicitud,:Estado_Actual,:Detalle,:Costototal,:Prestacion,:Fecha_Inicio,:Fecha_Fin,:Solicitud_SolicitudID,:Mecanico_Mecanico)");

        /*bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de 
        signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.*/
        $stmt->bindParam(":Estado_Solicitud", $datos["Estado_Solicitud"], PDO::PARAM_BOOL);
        $stmt->bindParam(":Estado_Actual", $datos["Estado_Actual"], PDO::PARAM_STR);
        $stmt->bindParam(":Detalle", $datos["Detalle"], PDO::PARAM_STR);
        $stmt->bindParam(":Costototal", $datos["Costototal"]);
        $stmt->bindParam(":Prestacion", $datos["Prestacion"], PDO::PARAM_BOOL);
        $stmt->bindParam(":Fecha_Inicio", $datos["Fecha_Inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_Fin", $datos["Fecha_Fin"], PDO::PARAM_STR);
        $stmt->bindParam(":Solicitud_SolicitudID", $datos["Solicitud_SolicitudID"], PDO::PARAM_INT);
        $stmt->bindParam(":Mecanico_Mecanico", $datos["Mecanico_Mecanico"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function actualizarEstado($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado_Solicitud=:Estado_Solicitud,Estado_Actual=:Estado_Actual,Detalle=:Detalle,Costototal:=Costototal,Prestacion=:Prestacion,Fecha_Inicio=:Fecha_Inicio,Fecha_Fin=:Fecha_Fin,Solicitud_SolicitudID=:Solicitud_SolicitudID,Mecanico_Mecanico=:Mecanico_Mecanico WHERE EstadoID = :EstadoID");

        $stmt->bindParam(":Estado_Solicitud", $datos["Estado_Solicitud"], PDO::PARAM_BOOL);
        $stmt->bindParam(":Estado_Actual", $datos["Estado_Actual"], PDO::PARAM_STR);
        $stmt->bindParam(":Detalle", $datos["Detalle"], PDO::PARAM_STR);
        $stmt->bindParam(":Costototal", $datos["Costototal"]);
        $stmt->bindParam(":Prestacion", $datos["Prestacion"], PDO::PARAM_BOOL);
        $stmt->bindParam(":Fecha_Inicio", $datos["Fecha_Inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_Fin", $datos["Fecha_Fin"], PDO::PARAM_STR);
        $stmt->bindParam(":Solicitud_SolicitudID", $datos["Solicitud_SolicitudID"], PDO::PARAM_INT);
        $stmt->bindParam(":Mecanico_Mecanico", $datos["Mecanico_Mecanico"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function eliminarEstado($tabla,$valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE EstadoID = :EstadoID");

        $stmt->bindParam(":EstadoID", $valor,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }
}