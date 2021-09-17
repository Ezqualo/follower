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

if ($useridRol == 1){
    $empresa = '-------MICHELIN-------';
    echo utf8_encode('<option value="MICHELIN" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    //$query = "SELECT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'MICHELIN'";
    //$result = mysqli_query ($link, $query);
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'MICHELIN'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------BFGOODRICH-------';
    echo utf8_encode('<option value="MICHELIN" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'BFGOODRICH'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------UNIROYAL-------';
    echo utf8_encode('<option value="UNIROYAL" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'UNIROYAL'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------CARGILL-------';
    echo utf8_encode('<option value="CARGILL" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'CARGILL'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------BRASKEM-------';
    echo utf8_encode('<option value="BRASKEM" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'BRASKEM'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------ACUVUE-------';
    echo utf8_encode('<option value="ACUVUE" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'ACUVUE'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------BALMORAL-------';
    echo utf8_encode('<option value="BALMORAL" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'BALMORAL'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------BANCOMER-------';
    echo utf8_encode('<option value="BANCOMER" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'BANCOMER'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------EZQUALO-------';
    echo utf8_encode('<option value="EZQUALO" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'EZQUALO'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }
    $empresa = '-------VMGE Abogados-------';
    echo utf8_encode('<option value="VMGE Abogados" disabled selected>'.$empresa.'</option>');
    // Realizamos la consulta para extraer los datos
    $query = $mysqli -> query ("SELECT DISTINCT nomenclatura, empresa FROM nomenclaturas WHERE empresa = 'VMGE Abogados'");
    while ($valores = mysqli_fetch_array($query)) {
        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
        echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
    }

}else{
    if ($useridRol == 2){
        // Realizamos la consulta para extraer los datos
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BFGOODRICH'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "BFGOODRICH") {
                $empresa = '-------BFGOODRICH-------';
                echo utf8_encode('<option value="BFGOODRICH" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BFGOODRICH'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'MICHELIN'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "MICHELIN") {
                $empresa = '-------MICHELIN-------';
                echo utf8_encode('<option value="MICHELIN" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'MICHELIN'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }

        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'UNIROYAL'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "UNIROYAL") {
                $empresa = '-------UNIROYAL-------';
                echo utf8_encode('<option value="UNIROYAL" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'UNIROYAL'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'CARGILL'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "CARGILL") {
                $empresa = '-------CARGILL-------';
                echo utf8_encode('<option value="CARGILL" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'CARGILL'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BRASKEM'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "BRASKEM") {
                $empresa = '-------BRASKEM-------';
                echo utf8_encode('<option value="BRASKEM" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BRASKEM'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'ACUVUE'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "ACUVUE") {
                $empresa = '-------ACUVUE-------';
                echo utf8_encode('<option value="ACUVUE" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'ACUVUE'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BALMORAL'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "BALMORAL") {
                $empresa = '-------BALMORAL-------';
                echo utf8_encode('<option value="BALMORAL" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BALMORAL'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BANCOMER'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "BANCOMER") {
                $empresa = '-------BANCOMER-------';
                echo utf8_encode('<option value="BANCOMER" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'BANCOMER'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
        $consult = $mysqli -> query("SELECT DISTINCT empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'VMGE Abogados'");
        while ($valores = mysqli_fetch_array($consult)) {
            if ($valores[empresa] == "VMGE Abogados") {
                $empresa = '-------VMGE Abogados-------';
                echo utf8_encode('<option value="VMGE Abogados" disabled selected>'.$empresa.'</option>');
                $query = $mysqli -> query("SELECT DISTINCT nomenclatura, usuario, empresa FROM nomenclaturas WHERE usuario like '%$userlogin%' AND empresa = 'VMGE Abogados'");
                while ($valores = mysqli_fetch_array($query)) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo utf8_encode('<option value="'.$valores[nomenclatura].'">'.$valores[nomenclatura].'</option>');
                }
            }
            break;
        }
    }
}

?>
