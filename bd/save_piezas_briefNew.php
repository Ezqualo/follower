<?php
    session_start();

    if ($_SESSION["s_usuario"] === null) {
        header("Location: ../index.php");
    }
    $userlogin = $_SESSION["s_usuario"];
    $useridRol = $_SESSION["s_idRol"];
    //$conn = new mysqli($servername, $username, $password, $dbname);
    $mysqli = new mysqli('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
    // Se valida conexion
    if ($mysqli->connect_error) {
        die("Connection failed: "
            . $mysqli->connect_error);
    }
    $mysqli -> set_charset("utf8");
    
    $marca_get = $_GET["marcas"];
    $cliente_get = $_GET["clientes"];
    $ejecutiva_get=$_GET["ejecutiva"];
    $nom_proyecto = $_POST['nom_proyecto_b'];
    $tt = $_POST['tabla_tiempos'];
    $id_proyecto = $_POST['id_proyecto']; //solucion

    /*$query = $mysqli->query("SELECT id FROM briefs WHERE nombre = '$nom_proyecto'");

    while ($valores = mysqli_fetch_array($query)) {
        $clientes = $valores[0];
    }*/

    $idPieza = $id_proyecto;
    $nombre = $_POST['name_b'];
    $caracteristicas = $_POST['caracteristicas_b'];
    $medidas = $_POST['medidas_b'];
    $fechaIni = $_POST['fechaInicio_b'];
    $fechaSalida = $_POST['fechaSalida_b'];

    //echo '<script type="text/javascript">alert("Nombre ' . $nom_proyecto . '");</script>';

    /*echo '<script type="javascript">alert("';
    echo "Nombre de proyecto " . $nom_proyecto;
    echo "tt " . $tt;
    echo "id_proyecto " . $id_proyecto;
    echo "nombre " . $nombre;
    echo "caracteristicas " . $caracteristicas;
    echo '");</script>';*/
    
    date_default_timezone_set('America/Mexico_City');  
    $hora = date('H:i:s', time());  
    $fecha = substr($fechaIni, 0, 10);
    $fechaInicio = $fecha . " " . $hora;

    // Se condiciona que se rellenen todo los campos del formulario
    if (empty($nombre) || empty($caracteristicas) || empty($medidas) || empty($fechaInicio) || empty($fechaSalida)) {
        // nose supongo un warning\
        header("Location: ../vistas/proyectos.php?marcas=$marca_get&clientes=$cliente_get&ejecutiva=$ejecutiva_get");
        die();
    } else {
        $sql = "INSERT INTO piezasBrief (idPieza, nombre, caracteristicas, medidas, fechaInicio, fechaSalida, semaforo, fechaAnterior) VALUES ('$idPieza', '$nombre', '$caracteristicas', '$medidas', '$fechaInicio', '$fechaSalida', '#FFC500', '')";
        //$sql_query = mysqli_query($mysqli,$sql);
                if (!$mysqli->query($sql)){
                    //echo "<p>Registro malo</p>";
                    header("Location: ../vistas/proyectos.php?marcas=$marca_get&clientes=$cliente_get&ejecutiva=$ejecutiva_get");
                    die();
                } else {
                    if($tt==1){
               	 //echo "consulta chida vaz para tt brief";
               	 function eliminar_acentos($cadena){
		
				//Reemplazamos la A y a
				$cadena = str_replace(
				array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
				array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
				$cadena
				);
		 
				//Reemplazamos la E y e
				$cadena = str_replace(
				array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
				array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
				$cadena );
		 
				//Reemplazamos la I y i
				$cadena = str_replace(
				array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
				array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
				$cadena );
		 
				//Reemplazamos la O y o
				$cadena = str_replace(
				array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
				array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
				$cadena );
		 
				//Reemplazamos la U y u
				$cadena = str_replace(
				array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
				array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
				$cadena );
		 
				//Reemplazamos la N, n, C y c
				/*$cadena = str_replace(
				array('Ç', 'ç'),
				array('C', 'c'),
				$cadena
				);*/
				
				return $cadena;
			}
			
			$tabla =$_POST['tabla'];
			$cadena = $nom_proyecto;
			$nombre_del_proyecto = eliminar_acentos($cadena);
			$texto = str_replace ("ñ", "%F1" ,$nombre_del_proyecto);
			$texto2 = str_replace ("Ñ", "%F1" ,$texto);
			$texto3 = str_replace (" ", "+" ,$texto2);
			
			
                	 //header("Location: ../tablas/tt_briefs.php?nom_proy=$nom_proyecto");
                	 //header(utf8_encode("Location: ../tablas/tt_briefs.php?nom_proy=$nombre_del_proyecto&tabla=$tabla&id=$idPieza"));
                	 //header(	"Location: ../tablas/tt_briefs.php?nom_proy=$nombre_del_proyecto&tabla=$tabla&id=$idPieza");
                	 header("Location: ../tablas/tt_briefs.php?nom_proy=$texto2&tabla=$tabla&id=$idPieza");
                	 die();
                	                 	 

            		}else{
                		//echo "consulta chida vas para proyectos";
                		header("Location: ../vistas/proyectos.php?marcas=$marca_get&clientes=$cliente_get&ejecutiva=$ejecutiva_get");
                		die();
            		}
                }
    }
    header("Location: ../vistas/proyectos.php?marcas=$marca_get&clientes=$cliente_get&ejecutiva=$ejecutiva_get");
    die();
?>
