<?php
    include_once "../bd/conect_db.php";
    // Se registran los datos para ser enviado a la DB
    $nom_proyecto = $_POST['nom_proyecto_b'];

    $query = $mysqli->query("SELECT id FROM briefs WHERE nombre = '$nom_proyecto'");
    while ($valores = mysqli_fetch_array($query)) {
        $clientes = $valores[id];
    }

    $idPieza = $clientes;
    $nombre = $_POST['name_b'];
    $caracteristicas = $_POST['caracteristicas_b'];
    $medidas = $_POST['medidas_b'];
    $fechaIni = $_POST['fechaInicio_b'];
    $fechaSalida = $_POST['fechaSalida_b'];
    
    date_default_timezone_set('America/Mexico_City');  
    $hora = date('H:i:s', time());  
    $fecha = substr($fechaIni, 0, 10);
    $fechaInicio = $fecha . " " . $hora;

    // Se condiciona que se rellenen todo los campos del formulario
    if (empty($nombre) || empty($caracteristicas) || empty($medidas) || empty($fechaInicio) || empty($fechaSalida)) {
        echo '<script>
            Swal.fire({
            type: "Error",
            title: "Datos incompletos",
            text: "Rellene todos los campos!"
            });
        </script>';
    } else {
        $sql = "INSERT INTO piezasBrief (idPieza, nombre, caracteristicas, medidas, fechaInicio, fechaSalida, semaforo) VALUES ('$idPieza', '$nombre', '$caracteristicas', '$medidas', '$fechaInicio', '$fechaSalida', '#FFC500')";
        //$sql_query = mysqli_query($mysqli,$sql);
        if (!$mysqli->query($sql)){
            echo '<script>
                    Swal.fire({
                        type: "Error",
                        title: "Error de Datos",
                        text: "Hubo un error al guardar los datos!"
                    });
                </script>';
        } else {
                echo '<script>
                    Swal.fire({
                        type: "success",
                        title: "Datos correctos",
                        text: "Pieza registrada correctamente!"
                    });
                </script>';
        }
    }
?>
