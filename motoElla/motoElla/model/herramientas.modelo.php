<?php

require_once "conexion.php";

class modeloHerramientas {

    static public function listarHerramientas($tabla,$item,$valor) {
        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM herramientas ORDER BY id DESC");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM herramientas WHERE $item = :$item ORDER BY id DESC");
        

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	
    }


    static public function insertarHerramientas($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (marca,mecanico_mecanico,nombre.tipo) VALUES (:marca,:mecanico_mecanico,:nombre,:tipo)");
        
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":mecanico_mecanico", $datos["mecanico_mecanico"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    static public function actualizarHerramientas($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET marca=:marca,mecanico_mecanico=:mecanico_mecanico,nombre=:nombre,tipo=:tipo WHERE herramientasID = :herramientasID");
        
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":mecanico_mecanico", $datos["mecanico_mecanico"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":herramientasID", $datos["herramientasID"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
		$stmt = null;	
    }

    static public function eliminarHerramientas($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE herramientasID = :herramientasID");
        
        $stmt->bindParam(":herramientasID", $datos["herramientasID"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }
        else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
    }
}