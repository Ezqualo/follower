<?php
    //Se asisgnan valores a variables de conexion a DB

    // Se establece conexion a BD
    //$conn = new mysqli($servername, $username, $password, $dbname);
    $mysqli = new mysqli('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
    // Se valida conexion
    if ($mysqli->connect_error) {
        die("Connection failed: "
            . $mysqli->connect_error);
    }

    // Se registran los datos para ser enviado a la DB
    $nom_proyecto = $_POST['nom_proyecto'];

    $query = $mysqli->query("SELECT id FROM odts WHERE proyecto = '$nom_proyecto'");
    while ($valores = mysqli_fetch_array($query)) {
        $clientes = $valores[id];
    }

    $idPieza = $clientes;
    $nombre = $_POST['name'];
    $caracteristicas = $_POST['caracteristicas'];
    $medidas = $_POST['medidas'];
    $fechaIni = $_POST['fechaInicio'];
    $fechaSalida = $_POST['fechaSalida'];
    
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
        $sql = "INSERT INTO piezas (idPieza, nombre, caracteristicas, medidas, fechaInicio, fechaSalida, semaforo) VALUES ('$idPieza', '$nombre', '$caracteristicas', '$medidas', '$fechaInicio', '$fechaSalida', '#FFC500')";
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
