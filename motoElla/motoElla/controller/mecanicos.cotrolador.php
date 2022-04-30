<?php


class ControladorMecanicos {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroMecanico"])){
            $tabla = "mecanico";
            $datos = array("mecanico" => $_POST["registroMecanico"],
                           "direccion" => $_POST["registroDireccion"],
                           "telefono" => $_POST["registroTelefono"],
                           "correo" => $_POST["registroCorreo"]);
            $respuesta = modeloMecanicos::insertarMecanicos($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "mecanico";
        $respuesta = modeloMecanicos::listarMecanicoss($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarMecanico"])){
            $tabla = "mecanico";
            $datos = array("mecanico" => $_POST["actualizarMecanico"],
                           "direccion" => $_POST["actualizarDireccion"],
                           "telefono" => $_POST["actualizarTelefono"],
                           "correo" => $_POST["actualizarCorreo"]);
            $respuesta = modeloMecanicos::actualizarMecanicos($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarMecanico"])){
            $tabla = "mecanico";
            $datos = array("id" => $_POST["eliminarMecanico"]);
            $respuesta = modeloMecanicos::eliminarMecanicos($tabla, $datos);
            return $respuesta;
        }
    }
}