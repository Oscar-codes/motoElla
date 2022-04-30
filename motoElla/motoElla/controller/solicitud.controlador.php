<?php


class ControladorSolicitud {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroSolicitud"])){
            $tabla = "solicitud";
            $datos = array("tipo" => $_POST["registroTipo"],
                           "detalle" => $_POST["registroDetalle"],
                           "fecha" => $_POST["registroFecha"],
                           "recoleccion" => $_POST["registroRecoleccion"],
                           "direccion" => $_POST["registroDireccion"]);
            $respuesta = modeloSolicitud::insertarSolicitud($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "solicitud";
        $respuesta = modeloSolicitud::listarSolicitud($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarSolicitud"])){
            $tabla = "solicitud";
            $datos = array("tipo" => $_POST["actualizarTipo"],
                           "detalle" => $_POST["actualizarDetalle"],
                           "fecha" => $_POST["actualizarFecha"],
                           "recoleccion" => $_POST["actualizarRecoleccion"],
                           "direccion" => $_POST["actualizarDireccion"]);
            $respuesta = modeloSolicitud::actualizarSolicitud($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarSolicitud"])){
            $tabla = "solicitud";
            $datos = array("id" => $_POST["eliminarSolicitud"]);
            $respuesta = modeloSolicitud::eliminarSolicitud($tabla, $datos);
            return $respuesta;
        }
    }
}