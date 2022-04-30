<?php


class ControladorEstado {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroEstado"])){
            $tabla = "estado";
            $datos = array("estado_solicitud" => $_POST["registroEstado_Solicitud"],
                           "estado_actual" => $_POST["registroEstado_Actual"],
                           "detalle" => $_POST["registroDetalle"],
                           "costototal" => $_POST["registroCostototal"],
                           "prestacion" => $_POST["registroPrestacion"],
                           "fecha_inicio" => $_POST["registroFecha_Inicio"],
                           "fecha_fin" => $_POST["registroFecha_Fin"]);
            $respuesta = modeloEstado::insertarEstado($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "estado";
        $respuesta = modeloEstado::listarEstado($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarEstado"])){
            $tabla = "Moto";
            $datos = array("estado_solicitud" => $_POST["actualizarEstado_Solicitud"],
            "estado_actual" => $_POST["actualizarEstado_Actual"],
            "detalle" => $_POST["actualizarDetalle"],
            "costototal" => $_POST["actualizarCostototal"],
            "prestacion" => $_POST["actualizarPrestacion"],
            "fecha_inicio" => $_POST["actualizarFecha_Inicio"],
            "fecha_fin" => $_POST["actualizarFecha_Fin"]);
            $respuesta = modeloEstado::actualizarEstado($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarEstado"])){
            $tabla = "Estado";
            $datos = array("id" => $_POST["eliminarEstado"]);
            $respuesta = modeloEstado::eliminarEstado($tabla, $datos);
            return $respuesta;
        }
    }
}