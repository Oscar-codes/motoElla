<?php
require_once "conexion.php";

class modeloInventario{

    static public function listarInventario($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE InventarioID = :InventarioID");

        $stmt->bindParam(":InventarioID", $datos["InventarioID"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function insertarInventario($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Stock,Marca,Costo,Mecanico_Mecanico) VALUES (:Stock,:Marca,:Costo,:Mecanico_Mecanico)");

        /*bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de 
        signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.*/
        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_INT);
        $stmt->bindParam(":Marca", $datos["Marca"], PDO::PARAM_STR);
        $stmt->bindParam(":Costo", $datos["Costo"]);
        $stmt->bindParam(":Mecanico_Mecanico", $datos["Mecanico_Mecanico"],PDO::PARAM_INT);
     

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function actualizarInventario($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Stock=:Stock,Marca=:Marca,Costo=:Costo,Mecanico_Mecanico=:Mecanico_Mecanico WHERE InventarioID = :InventarioID");

        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_INT);
        $stmt->bindParam(":Marca", $datos["Marca"], PDO::PARAM_STR);
        $stmt->bindParam(":Costo", $datos["Costo"]);
        $stmt->bindParam(":Mecanico_Mecanico", $datos["Mecanico_Mecanico"],PDO::PARAM_INT);
        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function eliminarInventario($tabla,$valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE InventarioID = :InventarioID");

        $stmt->bindParam(":InventarioID", $valor,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }
}