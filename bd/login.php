<?php

session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
//$pass = md5($password);

$consulta = "SELECT usuarios.idRol, usuarios.nombre, usuarios.genero, roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol = roles.id WHERE usuario='$usuario' AND password='$password' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1) {
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["s_password"] = $password;
    $_SESSION["s_idRol"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcioin"] = $data[0]["rol"];
    $_SESSION["s_nombre"] = $data[0]["nombre"];
    $_SESSION["s_genero"] = $data[0]["genero"];
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}
echo "todo bien\n";
print json_encode($data);
$conexion=null;


?>
