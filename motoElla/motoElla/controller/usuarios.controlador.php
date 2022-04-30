<?php


class ControladorUsuarios {
    
    static public function ctrRegistro(){
        if(isset($_POST["registroUsuarios"])){
            $tabla = "usuarios";
            $datos = array("nombre" => $_POST["registroNombre"],
                           "apellido" => $_POST["registroApellido"],
                           "rol" => $_POST["registroRol"],
                           "password" => $_POST["registroPassword"]);
            $respuesta = modeloUsuarios::insertarUsuarios($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrSeleccionar($item, $valor){
        $tabla = "usuarios";
        $respuesta = modeloUsuarios::listarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrActualizar(){
        if(isset($_POST["actualizarUsuarios"])){
            $tabla = "usuarios";
            $datos = array("nombre" => $_POST["actualizarNombre"],
                           "apellido" => $_POST["actualizarApellido"],
                           "rol" => $_POST["actualizarRol"],
                           "password" => $_POST["actualizarPassword"]);
            $respuesta = modeloUsuarios::actualizarUsuarios($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrEliminar(){
        if(isset($_POST["eliminarUsuarios"])){
            $tabla = "Usuarios";
            $datos = array("id" => $_POST["eliminarUsuarios"]);
            $respuesta = modeloUsuarios::eliminarUsuarios($tabla, $datos);
            return $respuesta;
        }
    }
}