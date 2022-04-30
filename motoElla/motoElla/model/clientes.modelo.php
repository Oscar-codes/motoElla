<?php

require_once "conexion.php";

class modeloClientes {

    static public function insertarClientes(){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(correo, telefono) VALUES (:correo, :telefono)");
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
       
        if($stmt->execute()){

            return "ok";

        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();

        $stmt = null;	

    }

    static public function listarClientes($tabla, $item, $valor) {
        
        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt -> fetch();
        }

        $stmt->close();

        $stmt = null;	

    }

    static public function actualizarClientes($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET correo=:correo, telefono=:telefono WHERE clienteID = :clienteID");
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":clienteID", $datos["clienteID"], PDO::PARAM_INT);
  
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
        $stmt = null;	
    }

    static public function eliminarClientes($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE clienteID = :clienteID");
        $stmt->bindParam(":clienteID", $datos["clienteID"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
        $stmt = null;	
    }
}