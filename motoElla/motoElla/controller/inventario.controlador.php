<?php


class ControladorInventario {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroInventario"])){
            $tabla = "inventario";
            $datos = array("stock" => $_POST["registroStock"],
                           "marca" => $_POST["registroMarca"],
                           "costo" => $_POST["registroCosto"]);
            $respuesta = modeloInventario::insertarInventario($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "inventario";
        $respuesta = modeloInventario::listarInventario($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarInventario"])){
            $tabla = "inventario";
            $datos = array("stock" => $_POST["registroStock"],
                           "marca" => $_POST["registroMarca"],
                           "costo" => $_POST["registroCosto"]);
            $respuesta = modeloInventario::actualizarInventario($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarInventario"])){
            $tabla = "inventario";
            $datos = array("id" => $_POST["eliminarInventario"]);
            $respuesta = modeloInventario::eliminarInventario($tabla, $datos);
            return $respuesta;
        }
    }
}