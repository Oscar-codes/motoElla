<?php
require_once "conexion.php";

class modeloSolicitud{

    static public function insertarSolicitud($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, detalle, fecha,recoleccion) VALUES (:tipo, :detalle, :fecha, :recoleccion)");
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":recoleccion", $datos["recoleccion"], PDO::PARAM_STR);
       
        if($stmt->execute()){

            return "ok";

        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();

        $stmt = null;	


    }

    static public function mostrarSolicitud($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    static public function eliminarSolicitud($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE solictudID = :solictudID");  

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
}