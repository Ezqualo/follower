<?php
include ('../bd/conect_db.php');

$correo = $_POST['correo']; 
$marca = $_POST['marca']; 
$resultado = $resultado1 . " " . $resultado2;
if ($marca == "Todos") {
    $separado_por_comas = "Todos";
    echo $separado_por_comas;
    
} else{
    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$correo%' AND empresaCliente = '$marca'");
    while ($valores = mysqli_fetch_array($query)) {
        $clientes[] = $valores[nombreCliente];
    }
    
    array_push($clientes,"Todos");
    $separado_por_comas = implode(",",$clientes);
    echo utf8_encode($separado_por_comas);
}



?>

