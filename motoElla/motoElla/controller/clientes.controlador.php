<?php

class controladorClientes {

    static public function ctrRegistro(){
        if(isset($_POST["registroCliente"])){
            $tabla = "cliente";
            $datos = array("correo" => $_POST["registroCorreo"],
                           "telefono" => $_POST["registroTelefono"]);
            $respuesta = modeloClientes::insertarClientes($tabla, $datos);
            return $respuesta;
        }
    }


    static public function ctrSeleccionar($item, $valor){
        $tabla = "cliente";
        $respuesta = modeloClientes::listarClientes($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarCliente"])){
            $tabla = "cliente";
            $datos = array("correo" => $_POST["actualizarCorreo"],
                           "telefono" => $_POST["actualizarTelefono"]);
            $respuesta = modeloClientes::actualizarClientes($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarCliente"])){
            $tabla = "cliente";
            $datos = array("id" => $_POST["eliminarCliente"]);
            $respuesta = modeloClientes::eliminarClientes($tabla, $datos);
            return $respuesta;
        }
    }
}