<?php
require_once "conexion.php";

class modeloUsuarios{

    static public function listarUsuarios($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuariosID = :usuariosID");

        $stmt->bindParam(":usuariosID", $datos["usuarioID"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

    static public function insertarUsuarios(){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, rol,password) VALUES (:nombre, :apellido, :rol, :password)");

        /*bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de 
        signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.*/
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function actualizarUsuarios($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, rol=:rol, password=:password WHERE usuariosID = :usuariosID");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuariosID", $datos["usuariosID"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }

    static public function eliminarUsuarios($tabla,$valor){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuariosID = :usuariosID");

        $stmt->bindParam(":usuariosID", $valor,PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;	
    }
}