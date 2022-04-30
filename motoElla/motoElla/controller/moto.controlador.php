<?php


class ControladorMoto {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroMoto"])){
            $tabla = "moto";
            $datos = array("kilometraje" => $_POST["registroKilometraje"],
                           "fecha_compra" => $_POST["registroFecha_Compra"],
                           "chasis_numero" => $_POST["registroChasis_Numero"],
                           "motor_numero" => $_POST["registroMotor_Numero"],
                           "anio" => $_POST["registroAnio"],
                           "placa" => $_POST["registroPlaca"],
                           "Cliente_ClienteID" => $_POST["Cliente_ClienteID"]);
            $respuesta = modeloMoto::insertarMoto($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "Moto";
        $respuesta = modeloMoto::listarMoto($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarMoto"])){
            $tabla = "Moto";
            $datos = array("kilometraje" => $_POST["actualizarKilometraje"],
                           "fecha_compra" => $_POST["actualizarFecha_Compra"],
                           "chasis_numero" => $_POST["actualizarChasis_Numero"],
                           "motor_numero" => $_POST["actualizarMotor_Numero"],
                           "anio" => $_POST["actualizarAnio"],
                           "placa" => $_POST["actualizarPlaca"],
                           "Cliente_ClienteID" => $_POST["Cliente_ClienteID"]);
            $respuesta = modeloMoto::actualizarMoto($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarMoto"])){
            $tabla = "Moto";
            $datos = array("id" => $_POST["eliminarMoto"]);
            $respuesta = modeloMoto::eliminarMoto($tabla, $datos);
            return $respuesta;
        }
    }
}