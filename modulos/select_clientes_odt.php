<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
include ('../bd/conect_db.php');
$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
//$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');

/*$var_PHP = "<script> document.writeln(selectedValue); </script>"; // igualar el valor de la variable JavaScript a PHP
$consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = '$var_PHP'");
while ($valores = mysqli_fetch_array($consult)) {
    $empresa_nom = $valores[empresa];
}
*/
if ($useridRol == 1){
        // Realizamos la consulta para extraer los datos
    /*$query = $mysqli -> query ("SELECT DISTINCT nombreCliente FROM clientes");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }*/

    $empresa = '--MICHELIN--';
    echo '<option value="MICHELIN" disabled selected>'.$empresa.'</option>';
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nombreCliente, empresaCliente FROM clientes WHERE empresaCliente = 'MICHELIN' OR empresaCliente = 'Michelin'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }

    $empresa = '--BFGOODRICH--';
    echo '<option value="GFGOODRICH" disabled selected>'.$empresa.'</option>';
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nombreCliente, empresaCliente FROM clientes WHERE empresaCliente = 'GFGOODRICH' OR empresaCliente = 'BFGoodrich'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }

    $empresa = '--BRASKEM--';
    echo '<option value="BRASKEM" disabled selected>'.$empresa.'</option>';
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nombreCliente, empresaCliente FROM clientes WHERE empresaCliente = 'BRASKEM' OR empresaCliente = 'Braskem'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }

    $empresa = '--JOHNSON & JOHNSON--';
    echo '<option value="JOHNSON & JOHNSON" disabled selected>'.$empresa.'</option>';
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nombreCliente, empresaCliente FROM clientes WHERE empresaCliente = 'JOHNSON & JOHNSON' OR empresaCliente = 'Johnson & Johnson'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }

    $empresa = '--VMGE ABOGADOS--';
    echo '<option value="VMGE ABOGADOS" disabled selected>'.$empresa.'</option>';
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nombreCliente, empresaCliente FROM clientes WHERE empresaCliente = 'VMGE ABOGADOS' OR empresaCliente = 'VMGE Abogados'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
    }

}else{
    if ($useridRol == 2){
        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'MICHELIN' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Michelin'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "MICHELIN" OR $valores[empresaCliente] == "Michelin") {
                $empresa = '--MICHELIN--';
                echo '<option value="MICHELIN" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'MICHELIN' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Michelin'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BFGOODRICH' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BFGoodrich'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "BFGOODRICH" OR $valores[empresaCliente] == "BFGoodrich") {
                $empresa = '--BFGOODRICH--';
                echo '<option value="BFGOODRICH" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BFGOODRICH' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BFGoodrich'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'UNIROYAL' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Uniroyal'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "UNIROYAL" OR $valores[empresaCliente] == "Uniroyal") {
                $empresa = '--UNIROYAL--';
                echo '<option value="UNIROYAL" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'UNIROYAL' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Uniroyal'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BRASKEM' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Braskem'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "BRASKEM" OR $valores[empresaCliente] == "Braskem") {
                $empresa = '--BRASKEM--';
                echo '<option value="BRASKEM" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'BRASKEM' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Braskem'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'CARGILL' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Cargill'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "CARGILL" OR $valores[empresaCliente] == "Cargill") {
                $empresa = '--CARGILL--';
                echo '<option value="CARGILL" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'CARGILL' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Cargill'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'JOHNSON & JOHNSON' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Johnson & Johnson'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "JOHNSON & JOHNSON" OR $valores[empresaCliente] == "Johnson & Johnson") {
                $empresa = '--JOHNSON & JOHNSON--';
                echo '<option value="JOHNSON & JOHNSON" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'JOHNSON & JOHNSON' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'Johnson & Johnson'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'VMGE ABOGADOS' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'VMGE Abogados'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresaCliente] == "VMGE ABOGADOS" OR $valores[empresaCliente] == "VMGE Abogados") {
                $empresa = '--VMGE ABOGADOS--';
                echo '<option value="VMGE ABOGADOS" disabled selected>'.$empresa.'</option>';
                $query = $mysqli -> query("SELECT DISTINCT nombreCliente, ejecutivasCliente, empresaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'VMGE ABOGADOS' OR ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'VMGE Abogados'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores[nombreCliente].'">'.$valores[nombreCliente].'</option>';
                }
            }
            break;
        }
    }
}
?>