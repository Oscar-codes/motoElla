<?php
require_once "conexion.php";

    class modeloMecanicos {

        static public function insertarMecanicos($tabla, $datos) {
            #statement: declaración
		    #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(direccion, telefono, correo) VALUES (:direccion, :telefono, :correo)");

		    /*bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de 
            signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.*/
		    $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		    $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);

		    if($stmt->execute()){

			    return "ok";

		    }else{

			    print_r(Conexion::conectar()->errorInfo());

		    }

		    $stmt->close();

		    $stmt = null;	
        }

        static public function listarMecanicos($tabla, $item, $valor) {
            
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

        static public function actualizarMecanicos($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET direccion=:direccion, telefono=:telefono,correo:correo WHERE mecanico = :mecanico");

		    $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		    $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		    $stmt->bindParam(":mecanico", $datos["mecanico"], PDO::PARAM_INT);

		    if($stmt->execute()){

			    return "ok";

		    }else{

			    print_r(Conexion::conectar()->errorInfo());

		    }

		    $stmt->close();

		    $stmt = null;	
            }

        static public function eliminarMecanicos($tabla,$valor){
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE mecacanico = :mecanico");

            $stmt->bindParam(":mecanico", $valor, PDO::PARAM_STR);
    
            if($stmt->execute()){
    
                return "ok";
    
            }else{
    
                print_r(Conexion::conectar()->errorInfo());
    
            }
    
            $stmt->close();
    
            $stmt = null;	
    
        }

    }