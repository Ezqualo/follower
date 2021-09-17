<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
include ('../bd/conect_db.php');
$mysqli = mysqli_connect('localhost', 'root', 'password', 'db_follower');

$valor_marca = $_POST['opcion_marca'];
echo $valor_marca;

$query = $mysqli -> query ("SELECT empresa FROM nomenclaturas WHERE empresa = '$valor_marca'");
while ($row = mysqli_fetch_row($query)) {
    $empresa_nom = $row[empresa];
}

// Realizamos la consulta para extraer los datos
$query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = '$empresa_nom'");
while ($valores = mysqli_fetch_array($query)) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
    echo utf8_encode('<option value="' . $valores[nombreCliente] . '">' . $valores[nombreCliente] . '</option>');
    //$cliente_php[] = $valores[nombreCliente];
}

?>