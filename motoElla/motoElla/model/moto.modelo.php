<?php
require_once "conexion.php";

class modeloMoto{

    static public function listarMoto($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE MotoID = :MotoID");

        $stmt->bindParam(":MotoID", $datos["MotoID"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function insertarMoto(){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(kilometraje,Fecha_Compra,Chasis_Numero,Motor_Numero,anio,placa,Cliente_ClienteID) VALUES (:kilometraje,:Fecha_Compra,:Chasis_Numero,:Motor_Numero,:anio,:placa,:Cliente_ClienteID)");

        /*bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de 
        signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.*/
        $stmt->bindParam(":kilometraje", $datos["kilometraje"], PDO::PARAM_INT);
        $stmt->bindParam(":Fecha_Compra", $datos["Fecha_Compra"], PDO::PARAM_STR);
        $stmt->bindParam(":Chasis_Numero", $datos["Chasis_Numero"], PDO::PARAM_INT);
        $stmt->bindParam(":Motor_Numero", $datos["Motor_Numero"], PDO::PARAM_INT);
        $stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_INT);
        $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        $stmt->bindParam(":Cliente_ClienteID", $datos["Cliente_ClienteID"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function actualizarMoto($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET kilometraje=:kilometraje, Fecha_Compra=:Fecha_Compra, Chasis_Numero=:Chasis_Numero,Motor_Numero=:Motor_Numero, anio=:anio, placa=:placa,Cliente_ClienteID=:Cliente_ClienteID WHERE MotoID = :MotoID");

        $stmt->bindParam(":kilometraje", $datos["kilometraje"], PDO::PARAM_INT);
        $stmt->bindParam(":Fecha_Compra", $datos["Fecha_Compra"], PDO::PARAM_STR);
        $stmt->bindParam(":Chasis_Numero", $datos["Chasis_Numero"], PDO::PARAM_INT);
        $stmt->bindParam(":Motor_Numero", $datos["Motor_Numero"], PDO::PARAM_INT);
        $stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_INT);
        $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        $stmt->bindParam(":Cliente_ClienteID", $datos["Cliente_ClienteID"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function eliminarMoto($tabla,$valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE MotoID = :MotoID");

        $stmt->bindParam(":MotoID", $valor,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }
}