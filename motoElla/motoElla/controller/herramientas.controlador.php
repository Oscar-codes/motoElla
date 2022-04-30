<?php


class ControladorHerramientas {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroHerramientas"])){
            $tabla = "herramientas";
            $datos = array("tipo" => $_POST["registroTipo"],
                           "marca" => $_POST["registroMarca"],
                           "nombre" => $_POST["registroNombre"]);
            $respuesta = modeloHerramientas::insertarHerramientas($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "herramientas";
        $respuesta = modeloHerramientas::listarHerramientas($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarHerramientas"])){
            $tabla = "herramientas";
            $datos = array("tipo" => $_POST["actualizarTipo"],
                           "marca" => $_POST["actualizarMarca"],
                           "nombre" => $_POST["actualizarNombre"]);
            $respuesta = modeloHerramientas::actualizarHerramientas($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarHerramientas"])){
            $tabla = "herramientas";
            $datos = array("id" => $_POST["eliminarHerramientas"]);
            $respuesta = modeloHerramientas::eliminarHerramientas($tabla, $datos);
            return $respuesta;
        }
    }
}