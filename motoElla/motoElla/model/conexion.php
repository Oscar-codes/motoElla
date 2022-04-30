<?php

    class Conexion {
        static public function conectar() {
           	#PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")
		    $con = new PDO("mysql:host=localhost;dbname=motoella", 
            "root", 
            "");

            $con->exec("set names utf8");

            return $con;
        }
    }

