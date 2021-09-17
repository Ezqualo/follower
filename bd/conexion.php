<?php
    class Conexion{
        public static function Conectar(){
            define('servidor','localhost');
            define('nombre_db','ezqualof_follower');
            define('usuario','ezqualof_adminfollower');
            define('password','3zqu4l0++');
            //define('usuario','dbadmin_ezqualo');
            //define('password','3zqu4l0++');
            //'localhost','ezqualof_adminfollower','3zqu4l0++','ezqualo_follower'
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try{
                $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_db, usuario, password, $opciones);
                return $conexion;
            }catch (Exception $e){
                die("El error de Conexion es :".$e->getMessage());
            }
        }
    }
?>