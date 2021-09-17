<?php
session_start();
if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
//$mysqli = new mysqli('localhost', 'root', 'password', 'db_follower');
//$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
$subject = $_GET['nom_proy'];
$subject2 = $_GET['nom_pieza'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Guardar Imagen Tabla -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/funciones_semaforo.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <script src="../js/watermark.js"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema Follower Ezqualo">
    <meta name="author" content="Xavier Escamilla, Ivan Salazar">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-128x128.png" sizes="128x128">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    
    <!-- Conversor de HTML a Canvas Tabla -->
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js">
    </script>

    <title>Follower</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../tablas/css/estilos.css" />
    <link rel="stylesheet" href="../css/semaforo.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.24/css/dataTables.bootstrap.min.css">

    <!-- Bootstrap Table Treegrid -->
    <link rel="stylesheet" href="../bootstrap/jquery-treegrid-master/css/jquery.treegrid.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
</head>
<body id="fondo">

<!-- Logo Vista y Boton Cerrar Sesión -->
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">
            <img id="img-principal" src="../img/pantalla4.png" width="75%">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="../bd/logout.php"><input type="image" src="../img/boton_cerrar sesion.png" alt="Submit"
                                              style="float: right;"></a>
        </div>
    </div>
</div>
<!-- Logo Vista y Boton Cerrar Sesión -->


<!-- Menu principal -->
<div class="container-fluid sticky-top" style="background-color: #000000;" align="center">
	<div class="row">
	<div class="col">
	</div>
	<div class="col">
	<nav class="navbar navbar-expand-lg navbar-dark sticky-top" align="center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto mx-auto">
							<div class="container-images nav-item">
								<li class="nav-item">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/proyectos_clientes.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
                                </li>
							</div>
						</ul>
					</div>
		</nav>
	</div>
	<div class="col">
	
	</div>
		
	</div>
	<div class="row">
		<image src="../img/barra_amarilla.png" class="barra_amarilla" style="height: 35px;">
	</div>
    </div>

    <!-- Menu principal -->

   <div class="container-fluid table-wrapper" style="background-color: #000000;">
    <?php
    require_once "../bd/conect_db.php";
    //$conexion=conexion();
    if (empty($subject2) == false){
        //echo "Funciona";
        $fechas_dif = $mysqli -> query("SELECT fechaInicio, fechaSalida FROM piezasBrief WHERE nombre = '$subject2'");
        while($fechas_piezas = mysqli_fetch_array($fechas_dif)) {
            $fecha_inicial = $fechas_piezas[fechaInicio];
            $fecha_final = $fechas_piezas[fechaSalida];
        }
        $dias_semana = date('l-d', strtotime($fecha_inicial));
        $dia_semana = substr($dias_semana, 0, -3);
        //echo $dia_semana;
        $odt_ini = substr($fecha_inicial, 0, 10);
        $odt_fin = substr($fecha_final, 0, 10);
        $fecha1 = new DateTime($odt_ini);
        $fecha2 = new DateTime($odt_fin);
        $resultado = $fecha1->diff($fecha2);
        $contador = $resultado->format('%R%a');
        $columnas = substr($contador, 1);
        $fecha_final_p = substr($fecha_final, 5,5);
        //echo "fecha_final: " . $fecha_final_p;
        

        $year1 = substr($fecha_inicial, 0, 4);
        $mes1 = substr($fecha_inicial, 5, 2);
        $num_mes = substr($fecha_inicial, 5, 2);
        $dia1 = substr($fecha_inicial, 8, 2);
        //echo $year1 . " " . $mes1 . " " . $dia1;

        $year2 = substr($fecha_final, 0, 4);
        $mes2 = substr($fecha_final, 5, 2);
        $num_mes2 = substr($fecha_final, 5, 2);
        $dia2 = substr($fecha_final, 8, 2);
        //echo $year2 . " " . $mes2 . " " . $dia2;

        //calculo timestam de las dos fechas
        $timestamp1 = mktime(0,0,0,$mes1,$dia1,$year1);
        $timestamp2 = mktime(4,12,0,$mes2,$dia2,$year2);
        //resto a una fecha la otra
        $segundos_diferencia = $timestamp1 - $timestamp2;
        //echo $segundos_diferencia;
        //convierto segundos en días
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia = abs($dias_diferencia);
        //quito los decimales a los días de diferencia
        $dias_diferencia = floor($dias_diferencia);
        $dias_contados = $dias_diferencia + 1;  
        //echo " Dias " . $dias_contados;

        $inicio = $fecha_inicial;
        $fin = $fecha_final;
        
        $date1  = $fecha_inicial;
        $date2  = $fecha_final;
        $output = [];
        $time   = strtotime($date1);
        $last   = date('M-Y', strtotime($date2));

        do {
        $month = date('M-Y', $time);
        $total = date('t', $time);

        $output[] = $month;

        $time = strtotime('+1 month', $time);
        } while ($month != $last);

        //echo implode(",", $output);
        $reset = 1;

    }else{
        $fechas_dif = $mysqli -> query("SELECT fechaEntrega, fechaSalida FROM briefs WHERE nombre = '$subject'");
        while($fechas_proy = mysqli_fetch_array($fechas_dif)) {
            $fecha_inicial = $fechas_proy[fechaEntrega];
            $fecha_final = $fechas_proy[fechaSalida];
            //$idodt = $fechas_proy[idOdt];
        }
        $dias_semana = date('l-d', strtotime($fecha_inicial));
        $dia_semana = substr($dias_semana, 0, -3);
        //echo $dia_semana;
        $odt_ini = substr($fecha_inicial, 0, 10);
        $odt_fin = substr($fecha_final, 0, 10);
        $fecha1 = new DateTime($odt_ini);
        $fecha2 = new DateTime($odt_fin);
        $resultado = $fecha1->diff($fecha2);
        $contador = $resultado->format('%R%a');
        $columnas = substr($contador, 1);
        $fecha_final_p = substr($fecha_final, 5,5);
        //echo "fecha_final: " . $fecha_final_p;
        

        $year1 = substr($fecha_inicial, 0, 4);
        $mes1 = substr($fecha_inicial, 5, 2);
        $num_mes = substr($fecha_inicial, 5, 2);
        $dia1 = substr($fecha_inicial, 8, 2);
        //echo $year1 . " " . $mes1 . " " . $dia1;

        $year2 = substr($fecha_final, 0, 4);
        $mes2 = substr($fecha_final, 5, 2);
        $num_mes2 = substr($fecha_final, 5, 2);
        $dia2 = substr($fecha_final, 8, 2);
        //echo $year2 . " " . $mes2 . " " . $dia2;

        //calculo timestam de las dos fechas
        $timestamp1 = mktime(0,0,0,$mes1,$dia1,$year1);
        $timestamp2 = mktime(4,12,0,$mes2,$dia2,$year2);
        //resto a una fecha la otra
        $segundos_diferencia = $timestamp1 - $timestamp2;
        //echo $segundos_diferencia;
        //convierto segundos en días
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia = abs($dias_diferencia);
        //quito los decimales a los días de diferencia
        $dias_diferencia = floor($dias_diferencia);
        $dias_contados = $dias_diferencia + 1;  
        //echo " Dias " . $dias_contados;

        $inicio = $fecha_inicial;
        $fin = $fecha_final;
        
        $date1  = $fecha_inicial;
        $date2  = $fecha_final;
        $output = [];
        $time   = strtotime($date1);
        $last   = date('M-Y', strtotime($date2));

        do {
        $month = date('M-Y', $time);
        $total = date('t', $time);

        $output[] = $month;

        $time = strtotime('+1 month', $time);
        } while ($month != $last);

        //echo implode(",", $output);
        $reset = 1;

    }
    //

    if($mes2 == '01'){
        $mes2 = 'ENERO';
        $dias_mes = '31';
    }elseif ($mes2 == '02'){
        $mes2 = 'FEBRERO';
        $dias_mes = '28';
    }elseif ($mes2 == '03'){
        $mes2 = 'MARZO';
        $dias_mes = '31';
    }elseif ($mes2 == '04'){
        $mes2 = 'ABRIL';
        $dias_mes = '30';
    }elseif ($mes2 == '05'){
        $mes2 = 'MAYO';
        $dias_mes = '31';
    }elseif ($mes2 == '06'){
        $mes2 = 'JUNIO';
        $dias_mes = '30';
    }elseif ($mes2 == '07'){
        $mes2 = 'JULIO';
        $dias_mes = '30';
    }elseif ($mes2 == '08'){
        $mes2 = 'AGOSTO';
        $dias_mes = '31';
    }elseif ($mes2 == '09'){
        $mes2 = 'SEPTIEMBRE';
        $dias_mes = '30';
    }elseif ($mes2 == '10'){
        $mes2 = 'OCTUBRE';
        $dias_mes = '31';
    }elseif ($mes2 == '11'){
        $mes2 = 'NOVIEMBRE';
        $dias_mes = '30';
    }elseif ($mes2 == '12'){
        $mes2 = 'DICIEMBRE';
        $dias_mes = '31';
    }
    if($mes1 == '01'){
        $mes1 = 'ENERO';
        $dias2_mes = '31';
    }elseif ($mes1 == '02'){
        $mes1 = 'FEBRERO';
        $dias2_mes = '28';
    }elseif ($mes1 == '03'){
        $mes1 = 'MARZO';
        $dias2_mes = '31';
    }elseif ($mes1 == '04'){
        $mes1 = 'ABRIL';
        $dias2_mes = '30';
    }elseif ($mes1 == '05'){
        $mes1 = 'MAYO';
        $dias2_mes = '31';
    }elseif ($mes1 == '06'){
        $mes1 = 'JUNIO';
        $dias2_mes = '30';
    }elseif ($mes1 == '07'){
        $mes1 = 'JULIO';
        $dias2_mes = '30';
    }elseif ($mes1 == '08'){
        $mes1 = 'AGOSTO';
        $dias2_mes = '31';
    }elseif ($mes1 == '09'){
        $mes1 = 'SEPTIEMBRE';
        $dias2_mes = '30';
    }elseif ($mes1 == '10'){
        $mes1 = 'OCTUBRE';
        $dias2_mes = '31';
    }elseif ($mes1 == '11'){
        $mes1 = 'NOVIEMBRE';
        $dias2_mes = '30';
    }elseif ($mes1 == '12'){
        $mes1 = 'DICIEMBRE';
        $dias2_mes = '31';
    }
    $lista_meses = array(1 => "Jan", 2 => "Feb", 
                        3 => "Mar", 4 => "Apr", 
                        5 => "May", 6 => "Jun", 
                        7 => "Jul", 8 => "Aug", 
                        9 => "Sep", 10 => "Oct", 
                        11 => "Nov", 12 => "Dec");

    ?>
    <div class="container-fluid" id="tablatocsv">
        <div id="tabla">
            <div class="row">
                <div class="col">
                <?php
                    if(empty($subject2) == false){
                    	?><h1 class="text-center"><span class="">Tabla de Tiempos: <?php echo $subject ?> - <?php echo $subject2 ?></span></h1><?php
                    }else{
                    	?><h1 class="text-center"><span class="">Tabla de Tiempos: <?php echo $subject ?></span></h1><?php
                    }
                ?>
                    <!-- Boton Exportar tabla -->
                    <div class="container-fluid">
                        <!--<button id="demo" class="downloadtable" onclick="downloadtable()"> Descargar Tabla de Tiempos</button>-->
                        <!--<input type="button" class="btn tw" id="btnSave2" value="Exportar Tabla de Tiempos">-->
                        <button id="demo" class=" btn downloadtable" onclick="downloadtable()"> Descargar Tabla de Tiempos </button>
                        <br></br>
                    </div>
                    <!-- Boton Exportar tabla -->
                    <table class="table table-condensed table-bordered" id="table_tt">
                        
                        <tr>
                            <td colspan="3"><?php echo utf8_encode($subject); ?></td>
                            <td colspan="<?php echo $dias_contados; ?>"><?php echo $mes1 .'-'.$year1 .' / '. $mes2 .'-'.$year2; ?></td>
                            <!-- <td><svg width="100px" height="30px"><rect id="semaforo_colors" class="rect_colors" x="5" y="5" width="150" height="350" stroke="white" stroke-width="2"/></svg></td> -->
                            <?php
                            if (empty($subject2) == false){
                                $sql_semaforo = $mysqli -> query("SELECT semaforo FROM piezasBrief WHERE nombre = '$subject2'");
                                while($colores_semaforo = mysqli_fetch_array($sql_semaforo)) {
                                    $color_semaforo = $colores_semaforo[semaforo];
                                }
                                echo '<td> 
					<div class="radio-item">';
					    if( $color_semaforo=="#FFC500" ){

					        echo '<input  type="radio" id="InicioB" name="droneB" checked value="#FFC500" disabled>';
					    }else{
					        echo '<input  type="radio" id="InicioB" name="droneB" value="#FFC500" disabled>';
					    }
					    echo '<label id="iniciolabel" for="InicioB"></label>
					</div>
					<div class="radio-item">';
					    if($color_semaforo=="#1CB707"){
					        echo '<input  type="radio" id="Enviado1" name="droneB" checked value="#1CB707" disabled>';
					    }else{
					        echo '<input  type="radio" id="Enviado1" name="droneB" value="#1CB707" disabled>';
					    }

					    echo '<label id="enviadolabel" for="Enviado1"></label>
					</div>
					div class="radio-item">';
					if($color_semaforo=="#FF0C00"){
					    echo '<input  type="radio" id="PausadoB" name="drone" checked value="#FF0C00" disabled>';
					}else{
					    echo '<input  type="radio" id="PausadoB" name="drone" value="#FF0C00" disabled>';
					}
					
					echo '<label id="pausadolabel" for="PausadoB"></label>
					</div>
					<div class="radio-item">';
					    if($color_semaforo=="#6900D1"){
					        echo '<input type="radio" id="CerradoB" name="droneB" checked value="#6900D1" disabled>';
					    }else{
					        echo '<input type="radio" id="CerradoB" name="droneB" value="#6900D1" disabled>';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoB"></label>
					</div>
					<

				    </td>';

                            } else{
                                $sql_semaforo = $mysqli -> query("SELECT semaforo FROM briefs WHERE nombre = '$subject'");
                                while($colores_semaforo = mysqli_fetch_array($sql_semaforo)) {
                                    $color_semaforo = $colores_semaforo[semaforo];
                                }

                                echo '<td> 
					
					<div class="radio-item">';
					    if( $color_semaforo=="#FFC500" ){

					        echo '<input type="radio" id="InicioA" name="droneA" checked value="#FFC500" disabled>';
					    }else{
					        echo '<input  type="radio" id="InicioA" name="droneA" value="#FFC500" disabled>';
					    }
					    echo '<label id="iniciolabel" for="InicioA"></label>
					</div>
					<div class="radio-item">';
					    if($color_semaforo=="#1CB707"){
					        echo '<input  type="radio" id="EnviadoA" name="droneA" checked value="#1CB707" disabled>';
					    }else{
					        echo '<input type="radio" id="EnviadoA" name="droneA" value="#1CB707" disabled>';
					    }

					    echo '<label id="enviadolabel" for="EnviadoA"></label>
					</div>
					<div class="radio-item">';
					if($color_semaforo=="#FF0C00"){
					    echo '<input  type="radio" id="PausadoA" name="droneA" checked value="#FF0C00" disabled>';
					}else{
					    echo '<input  type="radio" id="PausadoA" name="droneA" value="#FF0C00" disabled>';
					}
					
					echo '<label id="pausadolabel" for="PausadoA"></label>
					</div>
					<div class="radio-item">';
					    if($color_semaforo=="#6900D1"){
					        echo '<input  type="radio" id="CerradoA" name="droneA" checked value="#6900D1" disabled>';
					    }else{
					        echo '<input  type="radio" id="CerradoA" name="droneA" value="#6900D1" disabled>';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoA"></label>
					</div>
					

				    </td>';
                            }
                            //echo "COLOR ". $colores_semaforo;
                            
                            ?>
                        </tr>
                        
                        <!-- Inicia fila de nombres de meses -->
                        <tr>
                        <td colspan="3">Meses</td>
                        <?php
                        if($mes1 == $mes2){
                            echo '<td colspan="'.$dias_contados.'">'. $mes1 .'</td>';
                        } else{
                            $array_num = count($output);
        
                            for ($i = 0; $i < $array_num; ++$i){
                                //print $output[$i];
                                $mes_ciclo_fechas = substr($output[$i], 0, 3);
                                //echo " mes ciclo " . $mes_ciclo_fechas; 
                                $mes_C = array_search($mes_ciclo_fechas, $lista_meses);
                                //echo " dias del mes ciclo : " . $mes_C;
                                                    
                                if($mes_C == 1){
                                    $days_C = 31;
                                    $nombre_mes = "ENERO";
                                } elseif($mes_C == 2){
                                    $days_C = 28;
                                    $nombre_mes = "FEBRERO";
                                } elseif($mes_C == 3){
                                    $days_C = 31;
                                    $nombre_mes = "MARZO";
                                } elseif($mes_C == 4){
                                    $days_C = 30;
                                    $nombre_mes = "ABRIL";
                                } elseif($mes_C == 5){
                                    $days_C = 31;
                                    $nombre_mes = "MAYO";
                                } elseif($mes_C == 6){
                                    $days_C = 30;
                                    $nombre_mes = "JUNIO";
                                } elseif($mes_C == 7){
                                    $days_C = 31;
                                    $nombre_mes = "JULIO";
                                } elseif($mes_C == 8){
                                    $days_C = 31;
                                    $nombre_mes = "AGOSTO";
                                } elseif($mes_C == 9){
                                    $days_C = 30;
                                    $nombre_mes = "SEPTIEMBRE";
                                } elseif($mes_C == 10){
                                    $days_C = 31;
                                    $nombre_mes = "OCTUBRE";
                                } elseif($mes_C == 11){
                                    $days_C = 30;
                                    $nombre_mes = "NOVIEMBRE";
                                } elseif($mes_C == 12){
                                    $days_C = 31;
                                    $nombre_mes = "DICIEMBRE";
                                }
                                //$num_mes = substr($fecha_final, 5, 2);
                                if($mes_C < 10){
                                    $mes_C = "0" . $mes_C;
                                } else{
                                    $mes_C = $mes_C;
                                }

                                //echo " mes antes" . $num_mes ;

                                if($mes_C == $num_mes){
                                    $dias_restantes = $days_C - $dia1;
                                    //echo " dias restantes " . $dias_restantes ;
                                    $dias_restantes++;
                                    echo '<td colspan="'.$dias_restantes.'">'.$nombre_mes.'</td>';
                                } else if($mes_C == $num_mes2){
                                    //$dias_restantes = $days_C - $dia1;
                                    //echo " entre al ultimo mes";
                                    //echo " dias restantes2 " . $dia2 ;
                                    echo '<td colspan="'.$dia2.'">'.$nombre_mes.'</td>';
                                } else{
                                    //$dias_restantes = $days_C - $dia1;
                                    //echo " dias restantes " . $dias_restantes ;
                                    //$dias_restantes++;
                                    echo '<td colspan="'.$days_C.'">'.$nombre_mes.'</td>';
                                }
                                //echo '<td colspan="">'.$mes_C.'</td>';
                                //$mes_C++;
                            }
                            
                        }
                        ?>
                        </tr>
                        <!-- Termina fila de nombres de meses -->
                        
                        <tr>

                            <?php
                            $lista_dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
                            $nombres_dias = array("Domingo" => 0, "Lunes" => 1, "Martes" => 2, "Miércoles" => 3, "Jueves" => 4, "Viernes" => 5, "Sábado" => 6);
                            $clave_dia = array_search($dia_semana, $lista_dias);
                            $n = $clave_dia;
                            //echo "dia num ".$clave_dia;

                            echo '<td colspan="2">Acciones</td>';
                            echo utf8_encode('<td>'.$subject2.'</td>');
                            $cont = $dia1;
                            if($mes1 == $mes2){
                                while($cont <= $dia2){
                                    if($n == 0 || $n == 6){
                                        $nombres_semana = array_search($n, $nombres_dias);
                                        //echo $nombres_semana;
                                        echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                        $n = $n + 1;
                                        if($n == 7){
                                            $n = 0;
                                        }
                                    }else{
                                        if(empty($subject2) == false){
                                            //echo " entre al ciclo";
                                            $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM piezasBrief WHERE nombre = '$subject2'");
                                            while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                $fecha_Ant = $valor_fecha_anterior[0];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                                if($cont < 10){
                                                    $aux_dia = "0" . $cont;
                                                }else{
                                                    $aux_dia = $cont;
                                                }

                                                //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                                if($fechaAnteriorOdt == $aux_dia){
                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                    $n = $n + 1;
                                                    if($n == 7){
                                                        $n = 0;
                                                    }
                                                    $cont++;

                                                    if($nombres_semana == "Viernes"){
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        $cont++;
                                                        if($nombres_semana == "Sábado"){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;
                                                        }
                                                    }
                                                    break;
                                                }                                                
                                            }
                                        } else{
                                            $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM briefs WHERE nombre = '$subject'");
                                            while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                $fecha_Ant = $valor_fecha_anterior[0];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                                if($cont < 10){
                                                    $aux_dia = "0" . $cont;
                                                }else{
                                                    $aux_dia = $cont;
                                                }
                                                //echo " La fecha anterior es: " . $finalizar_ciclo;
                                                if($fechaAnteriorOdt == $aux_dia){
                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                    $n = $n + 1;
                                                    if($n == 7){
                                                        $n = 0;
                                                    }
                                                    $cont++;

                                                    if($nombres_semana == "Viernes"){
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        $cont++;
                                                        if($nombres_semana == "Sábado"){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;
                                                        }
                                                    }
                                                    break;
                                                }                                                
                                            }
                                        }

                                        if($cont > $dia2){
                                            break;
                                        }

                                        $nombres_semana = array_search($n, $nombres_dias);
                                        //echo $nombres_semana;
                                        echo '<td>'.$cont." ".$nombres_semana.'</td>';
                                        $n = $n + 1;
                                        if($n == 7){
                                            $n = 0;
                                        }
                                    }

                                    $cont = $cont + 1;

                                }
                            }else{
                                $array_num = count($output);
                                
                                for ($i = 0; $i < $array_num; ++$i){
                                    //print $output[$i];
                                    $mes_ciclo_fechas = substr($output[$i], 0, 3);
                                    //echo " mes ciclo " . $mes_ciclo_fechas; 
                                    $mes_C = array_search($mes_ciclo_fechas, $lista_meses);
                                    //echo " dias del mes ciclo : " . $mes_C;
                                                        
                                    if($mes_C == 1){
                                        $days_C = 31;
                                    } elseif($mes_C == 2){
                                        $days_C = 28;
                                    } elseif($mes_C == 3){
                                        $days_C = 31;
                                    } elseif($mes_C == 4){
                                        $days_C = 30;
                                    } elseif($mes_C == 5){
                                        $days_C = 31;
                                    } elseif($mes_C == 6){
                                        $days_C = 30;
                                    } elseif($mes_C == 7){
                                        $days_C = 31;
                                    } elseif($mes_C == 8){
                                        $days_C = 31;
                                    } elseif($mes_C == 9){
                                        $days_C = 30;
                                    } elseif($mes_C == 10){
                                        $days_C = 31;
                                    } elseif($mes_C == 11){
                                        $days_C = 30;
                                    } elseif($mes_C == 12){
                                        $days_C = 31;
                                    }
                                    while($cont <= $days_C){
                                        if($n == 0 || $n == 6){
                                            $nombres_semana = array_search($n, $nombres_dias);
                                            echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                            $n = $n + 1;
                                            if($n == 7){
                                                $n = 0;
                                            }
                                            
                                        }else{
                                            if (empty($subject2) == false){
                                                $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM piezasBrief WHERE nombre = '$subject2'");
                                                while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                    $fecha_Ant = $valor_fecha_anterior[0];
                                                    $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                    $dia_anterior = substr($fecha_Ant, 8, 2);
                                                }

                                                if($cont < 10){
                                                    $aux_dia_ant = "0" . $cont;
                                                }else{
                                                    $aux_dia_ant = $cont;
                                                }
                                                
                                                if($aux_dia_ant == $days_C){
                                                    if($cont < 10){
                                                        $aux_dia = "0" . $cont;
                                                    }else{
                                                        $aux_dia = $cont;
                                                    }
                                                    if($mes_C < 10){
                                                        $aux_mes = "0" . $mes_C;
                                                    }else{
                                                        $aux_mes = $mes_C;
                                                    }
                                                    
                                                    $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                    if($fechaAnteriorOdt == $finalizar_ciclo){
                                                        ////////////
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                        
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        $cont++;
    
                                                        $auxiliar = 1;
    
                                                        if($nombres_semana == "Viernes"){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;
                                                            if($nombres_semana == "Sábado"){
                                                                $nombres_semana = array_search($n, $nombres_dias);
                                                                echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                $n = $n + 1;
                                                                if($n == 7){
                                                                    $n = 0;
                                                                }
                                                                $cont++;
                                                            }
                                                        }

                                                    }else{
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td>'.$cont." ".$nombres_semana.'</td>';
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        if($cont < 10){
                                                            $aux_dia = "0" . $cont;
                                                        }else{
                                                            $aux_dia = $cont;
                                                        }
                                                        if($mes_C < 10){
                                                            $aux_mes = "0" . $mes_C;
                                                        }else{
                                                            $aux_mes = $mes_C;
                                                        }
                                                        
                                                        $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                        if($fecha_final_p == $finalizar_ciclo){
                                                            break;
                                                        }                                                        
                                                    }   
                                                } else{
                                                    $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM piezasBrief WHERE nombre = '$subject2'");
                                                    while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                        $fecha_Ant = $valor_fecha_anterior[0];
                                                        $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                        if($cont < 10){
                                                            $aux_dia = "0" . $cont;
                                                        }else{
                                                            $aux_dia = $cont;
                                                        }
                                                        if($mes_C < 10){
                                                            $aux_mes = "0" . $mes_C;
                                                        }else{
                                                            $aux_mes = $mes_C;
                                                        }
                                                        
                                                        $finalizar_ciclo = $aux_mes . "-" . $aux_dia;

                                                        if($fechaAnteriorOdt == $finalizar_ciclo){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                            
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;

                                                            if($nombres_semana == "Viernes"){
                                                                $nombres_semana = array_search($n, $nombres_dias);
                                                                echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                $n = $n + 1;
                                                                if($n == 7){
                                                                    $n = 0;
                                                                }
                                                                $cont++;
                                                                if($nombres_semana == "Sábado"){
                                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                                    echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                    $n = $n + 1;
                                                                    if($n == 7){
                                                                        $n = 0;
                                                                    }
                                                                    $cont++;
                                                                }
                                                            }
                                                            
                                                            break;
                                                        }                                                
                                                    }

                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td>'.$cont." ".$nombres_semana.'</td>';
                                                    $n = $n + 1;
                                                    if($n == 7){
                                                        $n = 0;
                                                    }
                                                    if($cont < 10){
                                                        $aux_dia = "0" . $cont;
                                                    }else{
                                                        $aux_dia = $cont;
                                                    }
                                                    if($mes_C < 10){
                                                        $aux_mes = "0" . $mes_C;
                                                    }else{
                                                        $aux_mes = $mes_C;
                                                    }
                                                    
                                                    $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                    
                                                    if($fecha_final_p == $finalizar_ciclo){
                                                        break;
                                                    }
                                                }

                                            } else{
                                                //echo " entre al ciclo";
                                                $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM briefs WHERE nombre = '$subject'");
                                                while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                    $fecha_Ant = $valor_fecha_anterior[0];
                                                    $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                    $dia_anterior = substr($fecha_Ant, 8, 2);
                                                }

                                                if($cont < 10){
                                                    $aux_dia_ant = "0" . $cont;
                                                }else{
                                                    $aux_dia_ant = $cont;
                                                }
                                                
                                                if($aux_dia_ant == $days_C){
                                                    if($cont < 10){
                                                        $aux_dia = "0" . $cont;
                                                    }else{
                                                        $aux_dia = $cont;
                                                    }
                                                    if($mes_C < 10){
                                                        $aux_mes = "0" . $mes_C;
                                                    }else{
                                                        $aux_mes = $mes_C;
                                                    }
                                                    
                                                    $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                    if($fechaAnteriorOdt == $finalizar_ciclo){
                                                        ////////////
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                        
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        $cont++;
    
                                                        $auxiliar = 1;
    
                                                        if($nombres_semana == "Viernes"){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;
                                                            if($nombres_semana == "Sábado"){
                                                                $nombres_semana = array_search($n, $nombres_dias);
                                                                echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                $n = $n + 1;
                                                                if($n == 7){
                                                                    $n = 0;
                                                                }
                                                                $cont++;
                                                            }
                                                        }

                                                    }else{
                                                        $nombres_semana = array_search($n, $nombres_dias);
                                                        echo '<td>'.$cont." ".$nombres_semana.'</td>';
                                                        $n = $n + 1;
                                                        if($n == 7){
                                                            $n = 0;
                                                        }
                                                        if($cont < 10){
                                                            $aux_dia = "0" . $cont;
                                                        }else{
                                                            $aux_dia = $cont;
                                                        }
                                                        if($mes_C < 10){
                                                            $aux_mes = "0" . $mes_C;
                                                        }else{
                                                            $aux_mes = $mes_C;
                                                        }
                                                        
                                                        $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                        if($fecha_final_p == $finalizar_ciclo){
                                                            break;
                                                        }                                                        
                                                    }   
                                                } else{
                                                    $sql_fechaAnt = $mysqli -> query("SELECT fechaAnterior FROM briefs WHERE nombre = '$subject'");
                                                    while($valor_fecha_anterior = mysqli_fetch_array($sql_fechaAnt)){
                                                        $fecha_Ant = $valor_fecha_anterior[0];
                                                        $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                        if($cont < 10){
                                                            $aux_dia = "0" . $cont;
                                                        }else{
                                                            $aux_dia = $cont;
                                                        }
                                                        if($mes_C < 10){
                                                            $aux_mes = "0" . $mes_C;
                                                        }else{
                                                            $aux_mes = $mes_C;
                                                        }
                                                        
                                                        $finalizar_ciclo = $aux_mes . "-" . $aux_dia;

                                                        if($fechaAnteriorOdt == $finalizar_ciclo){
                                                            $nombres_semana = array_search($n, $nombres_dias);
                                                            echo '<td class="tt-gplus" id="'.$cont." ".$nombres_semana.'" name="fech_ant"> <span class="">'.$cont." ".$nombres_semana.'</span></td>';   
                                                            
                                                            $n = $n + 1;
                                                            if($n == 7){
                                                                $n = 0;
                                                            }
                                                            $cont++;

                                                            if($nombres_semana == "Viernes"){
                                                                $nombres_semana = array_search($n, $nombres_dias);
                                                                echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                $n = $n + 1;
                                                                if($n == 7){
                                                                    $n = 0;
                                                                }
                                                                $cont++;
                                                                if($nombres_semana == "Sábado"){
                                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                                    echo '<td class="grey">'.$cont." ".$nombres_semana.'</td>';
                                                                    $n = $n + 1;
                                                                    if($n == 7){
                                                                        $n = 0;
                                                                    }
                                                                    $cont++;
                                                                }
                                                            }
                                                            
                                                            break;
                                                        }                                                
                                                    }

                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td>'.$cont." ".$nombres_semana.'</td>';
                                                    $n = $n + 1;
                                                    if($n == 7){
                                                        $n = 0;
                                                    }
                                                    if($cont < 10){
                                                        $aux_dia = "0" . $cont;
                                                    }else{
                                                        $aux_dia = $cont;
                                                    }
                                                    if($mes_C < 10){
                                                        $aux_mes = "0" . $mes_C;
                                                    }else{
                                                        $aux_mes = $mes_C;
                                                    }
                                                    
                                                    $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                    
                                                    if($fecha_final_p == $finalizar_ciclo){
                                                        break;
                                                    }
                                                }
                                            }

                                        }
                                        $cont = $cont + 1;
                                        
                                    }
                                    $cont = 1;
                                }
                            }
                            
                            echo '<td><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        width="150" height="50" viewBox="0 0 120 100">
                                    <rect x="10" y="10" width="100" height="100"
                                        fill="black" />
                                </svg></td>';
                                
                            ?>
                        </tr>
                        <?php
                        if($mes1 == $mes2){//CONDICION PARA CUANDO EL PERIODO SEA DENTRO DEL MISMO MES
                            include_once 'tabla_mismo_mes.php';
                        }else{
                            include_once 'tabla_dos_meses.php';
                            //echo " mande a llamar include de piezas ";
                            
                            if (empty($subject2) == true){
                                //echo " termina el ciclo while ";
                                include_once 'tabla_piezas_brief.php';
                                //echo " mande a llamar include ";
                            } 
                        }
                        
                        /*if (empty($subject2) == true){
                            echo " termina el ciclo while ";
                            include_once 'tabla_piezas.php';
                            echo " mande a llamar include ";
                        } */
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Exportar Tabla -->
<script>
    /* Funcion DOM to image */
    function downloadtable() {
        var node = document.getElementById('tablatocsv');
        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';
        domtoimage.toJpeg(node)
            .then(function (dataUrl) {
                var imgX = new Image();
                imgX.src = dataUrl;
                watermark([imgX])
                .image(watermark.text.center('CONFIDENCIAL', '192px Franklin Gothic', '#fff', 0.5))
                .then(function (img) {
                    if(pieza_rec === ""){
                            downloadURI(img.src, "Tabla_De_Tiempos_"+ project +".png")
                        }else{
                            downloadURI(img.src, "Tabla_De_Tiempos_"+ project + "_" + pieza_rec +".png")
                        }
                });
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });
    }

    /* Funcion Descargar o Abrir imagen */
    function downloadURI(uri, name) {
        var link = document.createElement("a");

        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
    }

</script>
<!-- Script Exportar Tabla -->

<script type="text/javascript">
    
    function GuardarColorTT(cel) {
        var id_td = $(cel).attr("id");
        //alert(id_td);
        var cod = document.getElementById(id_td).value;
        var tabla = "odt";

        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(0)").text();   
            //alert(nombre);
            
            actualizarSemaforo(cod, tabla, nombre);
        });
    };   

    function GuardarColorTTP(cel) {
        var id_td = $(cel).attr("id");
        //alert(id_td);
        var cod = document.getElementById(id_td).value;
        var tabla = "odt_pieza";

        var nombre = "<?php echo utf8_encode($subject2);?>";
        
        actualizarSemaforo(cod, tabla, nombre);
        
    };  

</script>


<script type="text/javascript">
    
    function GuardarColorComet(cel) {
        var id_td = $(cel).attr("id");
        var cod = document.getElementById(id_td).value;
        var tabla = "comentarios";

        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';
        //alert(cod);
        if(pieza_rec === ""){
            proyecto = project;
            pieza = project;
        } else{
            proyecto = project;
            pieza = pieza_rec;
        }
        
        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
            var cadena = nombre;
            var listaAreas = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            for (var i=0; i<listaAreas.length; i++) { 
                msgForNormal = listaAreas[i]; 
                var index = cadena.indexOf(msgForNormal);

		if(index >= 0) {
		    console.log("la palabra existe dentro de la cadena y se encuentra en la posición " + index);
		    var re = msgForNormal;
		    var resultado = cadena.replace(re, '');
		    //alert(resultado);
		    nombre = resultado;
		    actualizarSemaforoComet(cod, nombre, tabla, proyecto, pieza);
		    break;
		} else {
		    console.log("la palabra no existe dentro de la cadena");
		}
            }
            
            
        });
        
    };   
</script>


<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agrega nueva tarea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="" id="nombre" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input type="date" name="apellido" id="apellido" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Fecha Salida</label>
                            <input type="date" name="email" id="email" class="form-control input-sm">
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Comentario</label>
                            <input type="text" name="" id="telefono" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Área</label>
                            <select class="form-control" style="height:60px; height: 40px;" name="areas_p" id="areas_p" value="" onchange="funcionAreas(this.value)">
                                <option value="0" disabled selected>--Seleccionar--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Persona Encargada</label>
                            <select class="form-control" style="height:60px; height: 40px;" name="persona_enc" id="persona_enc" value="" onchange="funcionPersonas(this.value)">
                                <option value="0" disabled selected>--Seleccionar--</option>
                            </select>
                            <input type="text" name="proyecto" id="proyecto" class="form-control input-sm" hidden>
                            <input type="text" name="pieza" id="pieza" class="form-control input-sm" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var fechaI = <?php echo json_encode($fecha_inicial);?>;
    var fechaF = <?php echo json_encode($fecha_final);?>;
    var fechaInicialRango = fechaI.slice(0, -9);
    var fechaFinalRango = fechaF.slice(0, 10);
    //alert(fechaFinalRango);
    $('#apellido').attr('min', fechaInicialRango);
    $('#apellido').attr('max', fechaFinalRango);
    $('#email').attr('min', fechaInicialRango);
    $('#email').attr('max', fechaFinalRango);
</script>

<!-- Modal para regisro Piezas -->
<div class="modal fade" id="modalPieza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_b" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_b">Añadir piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../bd/save_piezas_briefNew.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_b" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name_b" name="name_b">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas_b" class="col-form-label">Caracteristicas:</label>
                                <input type="text" class="form-control" id="caracteristicas_b" name="caracteristicas_b">
                            </div>
                            <div class="form-group">
                                <label for="medidas_b" class="col-form-label">Medidas:</label>
                                <input type="text" class="form-control" id="medidas_b" name="medidas_b">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_b" class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control"  id="fechaInicio_b" name="fechaInicio_b">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_b" class="col-form-label">Fecha Salida:</label>
                                <input type="date" class="form-control"  id="fechaSalida_b" name="fechaSalida_b">
                            </div>
                            <input type="text" class="form-control"  id="nom_proyecto_b" name="nom_proyecto_b" class="nom_proyecto_b" value="<?php echo $subject; ?>" hidden>
                            <input type="text" class="form-control"  id="tabla_tiempos" name="tabla_tiempos" class="tabla_tiempos" value=1 hidden>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btn btn-primary" value="Añadir Pieza">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_pieza" onclick="">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Pieza</button>-->
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var fechaI = <?php echo json_encode($fecha_inicial);?>;
    var fechaF = <?php echo json_encode($fecha_final);?>;
    var fechaInicialRango = fechaI.slice(0, -9);
    var fechaFinalRango = fechaF.slice(0, 10);
    $('#fechaInicio_b').attr('min', fechaInicialRango);
    $('#fechaInicio_b').attr('max', fechaFinalRango);
    $('#fechaSalida_b').attr('min', fechaInicialRango);
    $('#fechaSalida_b').attr('max', fechaFinalRango);
</script>


<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Actualizar datos de la tarea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="idpersona" name="" hidden>
                            <label>Titulo</label>
                            <input type="text" name="" id="nombreu" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input type="date" name="" id="apellidou" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Fecha Salida</label>
                            <input type="date" name="" id="emailu" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Comentario</label>
                            <input type="text" name="" id="telefonou" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label>Área</label>
                                <select class="form-control" style="height:60px; height: 40px;" name="areau" id="areau" value="" onchange="funcionAreasEditar(this.value)">
                                    <option value="0" disabled selected>--Seleccionar--</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Persona Seleccionada</label>
                                <select class="form-control" style="height:60px; height: 40px;" name="persona_enc_u" id="persona_enc_u" value="" onchange="funcion(this.value)">
                                    <option value="0" disabled selected>--Seleccionar--</option>
                                </select>
                            <input type="text" name="" id="proyectou" class="form-control input-sm" >
                            <input type="text" name="" id="piezau" class="form-control input-sm" >
                            <input type="text" name="" id="fechau" class="form-control input-sm" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var fechaI = <?php echo json_encode($fecha_inicial);?>;
    var fechaF = <?php echo json_encode($fecha_final);?>;
    var fechaInicialRango = fechaI.slice(0, -9);
    var fechaFinalRango = fechaF.slice(0, 10);
    $('#apellidou').attr('min', fechaInicialRango);
    $('#apellidou').attr('max', fechaFinalRango);
    $('#emailu').attr('min', fechaInicialRango);
    $('#emailu').attr('max', fechaFinalRango);
</script>

<!-- Modal para eventos -->
<div class="modal fade" id="modalevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Comentario</label>
                <input type="text" name="" id="comentariob" class="form-control input-sm">
                <label>Color</label>
                <input type="color" id="color_eventb" class="form-control input-sm">
                <input type="text" id="dia_eventb" class="form-control input-sm" >
                <input type="text" id="coment_asigb" class="form-control input-sm" >
                <input type="text" id="proyectoeb" class="form-control input-sm" >
                <input type="text" id="piezaeb" class="form-control input-sm" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarevento">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar eventos -->
<div class="modal fade" id="modaleditarevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Comentario</label>
                <input type="text" name="" id="comentario_u" class="form-control input-sm">
                <label>Color</label>
                <input type="color" id="color_event_u" class="form-control input-sm">
                <label>Día</label>
                <input type="text" id="dia_event_u" class="form-control input-sm">
                <label>Motivo</label>
                <input type="text" id="motivo_u" class="form-control input-sm">
                <input type="text" id="idevento" class="form-control input-sm" hidden>
                <input type="text" id="coment_asig_u" class="form-control input-sm" hidden>
                <input type="text" id="proyectoe_u" class="form-control input-sm" hidden>
                <input type="text" id="piezae_u" class="form-control input-sm" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizaDatosEvento">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="position-sticky">
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Fin Footer -->

<!-- JQuery -->
<script src="../jquery/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="../popper/popper.min.js"></script>

<!-- Sweet Alert 2 JS -->
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Bootstrap Table JS -->
<script type="text/javascript" src="../bootstrap/jquery-treegrid-master/js/jquery.treegrid.js"></script>
<script type="text/javascript">
    $('.tree').treegrid();
</script>

<!-- Custom JS -->
<script src="../js/codigo.js"></script>

<!-- Ionic Iconos -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>

<script type="text/javascript">
//funcion para enviar valores al modal de editar evento 
    function editarE(datos) {
        //var id_td = $(cel).attr("id");
        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';

        var idevento = "<?php echo utf8_encode($id_evento);?>";
        var comentario = "<?php echo utf8_encode($comentario_event);?>";
        var color = "<?php echo utf8_encode($color_event);?>";
        //alert(idevento);

        /*$("#tabla tbody tr").on("click", function(event){
            var id= $(this).find("td:eq(2)").html();   
            //alert(id);
            
            $("#coment_asig_u").val(id);
        });*/
        
        
        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
            var cadena = nombre;
            var listaAreas = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            for (var i=0; i<listaAreas.length; i++) { 
                msgForNormal = listaAreas[i]; 
                var index = cadena.indexOf(msgForNormal);

		if(index >= 0) {
		    console.log("la palabra existe dentro de la cadena y se encuentra en la posición " + index);
		    var re = msgForNormal;
		    var resultado = cadena.replace(re, '');
		    //alert(resultado);
		    nombre = resultado;
		    $("#coment_asig_u").val(nombre);
		    break;
		} else {
		    console.log("la palabra no existe dentro de la cadena");
		}
            }
            
            
        });
        

        d=datos.split('||');

        if(pieza_rec === ''){
            $('#idevento').val(d[0]);
            //$("#idevento").val(idevento);
            $("#color_event_u").val(d[2]);
            $("#comentario_u").val(d[3]);
            $("#proyectoe_u").val(project);
            $("#piezae_u").val(project);
            $("#dia_event_u").val(d[1]);
        }else{
            $('#idevento').val(d[0]);
            //$("#idevento").val(idevento);
            $("#color_event_u").val(d[2]);
            $("#comentario_u").val(d[3]);
            $("#proyectoe_u").val(project);
            $("#piezae_u").val(pieza_rec);
            $("#dia_event_u").val(d[1]);
        }
    };
</script>


<script>
    $( document ).ready(function() {

        $("#guardarevento").click(function(){
            var color_fondo_tabla = $("#color_eventb").val();

            //alert(color_fondo_tabla);
            dia_event = $('#dia_eventb').val();
            //
            //$("td").css("background-color", color_fondo_tabla);
            document.getElementById(dia_event).style.backgroundColor = color_fondo_tabla;

            comentario = $('#comentariob').val();
            color_event = $('#color_eventb').val();
            dia_event = $('#dia_eventb').val();
            coment_asig = $('#coment_asigb').val();
            proyectoe = $('#proyectoeb').val();
            piezae = $('#piezaeb').val();
            //alert(coment_asig);
            agregarevento(comentario, color_event, dia_event, coment_asig, proyectoe, piezae);
        
        });

        $("#actualizaDatosEvento").click(function () {
            //alert("click");
            actualizarDatosEvento();
        });
    });

</script>

<script type="text/javascript">
//var boton = document.getElementById('guardar_evento');
    function borrar( cel ) {
        var id_td = $(cel).attr("id");
        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';
        //alert("Hola Mundo ");
        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
            var cadena = nombre;
            var listaAreas = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            for (var i=0; i<listaAreas.length; i++) { 
                msgForNormal = listaAreas[i]; 
                var index = cadena.indexOf(msgForNormal);

		if(index >= 0) {
		    console.log("la palabra existe dentro de la cadena y se encuentra en la posición " + index);
		    var re = msgForNormal;
		    var resultado = cadena.replace(re, '');
		    //alert(resultado);
		    nombre = resultado;
		    $("#coment_asigb").val(nombre);
		    break;
		} else {
		    console.log("la palabra no existe dentro de la cadena");
		}
            }
            
        });

        if(pieza_rec === ''){
            $("#proyectoeb").val(project);
            $("#piezaeb").val(project);
            $("#dia_eventb").val(id_td);
        }else{
            $("#proyectoeb").val(project);
            $("#piezaeb").val(pieza_rec);
            $("#dia_eventb").val(id_td);
        }
    };
</script>

<script>
    function form_actualizar(datos){

        $('#areau option').remove();
        $('#persona_enc_u option').remove();

        var areas_a_select = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            var option = '';

        for (var i = 0; i < areas_a_select.length; i++){
            option += '<option value="'+ areas_a_select[i] + '">' + areas_a_select[i] + '</option>';
        }
        $('#areau').append(option);

        <?php
        //$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoArte");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $artephp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoProgramacion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $programacionphp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoAdministracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $administracionphp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoCopyCorreccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $copycorreccionphp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoEstrategia");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $estrategiaphp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoIlustracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $ilustracionphp[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoPostProduccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $postproduccionphp[] = $valores[nombre];
        }
        ?>

        var arte_php = ["<?php echo utf8_encode(implode('","', $artephp)); ?>"];
        var programacion_php = ["<?php echo utf8_encode(implode('","', $programacionphp)); ?>"];
        var administracion_php = ["<?php echo utf8_encode(implode('","', $administracionphp)); ?>"];
        var copy_correcion_php = ["<?php echo utf8_encode(implode('","', $copycorreccionphp)); ?>"];
        var estrategia_php = ["<?php echo utf8_encode(implode('","', $estrategiaphp)); ?>"];
        var ilustracion_php = ["<?php echo utf8_encode(implode('","', $ilustracionphp)); ?>"];
        var post_produccion_php = ["<?php echo utf8_encode(implode('","', $postproduccionphp)); ?>"];
        var list_personas = {
            'Arte': arte_php,
            'Programación': programacion_php,
            'Administración': administracion_php,
            'Copy y Corrección de estilo': copy_correcion_php,
            'Estrategia': estrategia_php,
            'Ilustración': ilustracion_php,
            'Post Producción': post_produccion_php,
            'Compras': ['Omar Coria']
        }

        var $list_personas = $('#persona_enc_u');
        $('#areau').change(function () {
            var allareas = $(this).val(), persona = list_personas[allareas] || [];
            var html = $.map(persona, function (t) {
                return '<option value="' + t + '">' + t + '</option>'
            }).join('');
            $list_personas.html(html)
        });

    
    d=datos.split('||');

    lista_vacia = [d[6]];
    var ddlItems = document.getElementById("persona_enc_u"),itemArray = lista_vacia;
    for (var i = 0; i < itemArray.length; i++) {
        var opt = itemArray[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        ddlItems.appendChild(el);
    }

        $('#idpersona').val(d[0]);
        $('#nombreu').val(d[1]);
        $('#apellidou').val(d[2]);
        $('#emailu').val(d[3]);
        $('#telefonou').val(d[4]);
        $('#areau').val(d[5]);
        $('#persona_enc_u').val(d[6]);
        $('#fechau').val(d[3]);
        //$('#proyectou').val(d[7]);
        //$('#piezau').val(d[8]);
        //alert(d[5]);
        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';

        if(pieza_rec === ''){
            $("#proyectou").val(project);
            $("#piezau").val(project);
        }else{
            $("#proyectou").val(project);
            $("#piezau").val(pieza_rec);
        }
    }
</script>

<script>
    var boton = document.getElementById('agregar_nuevo');
    
    boton.onclick = function(e) {
        var project = '<?php echo utf8_encode($subject);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';

        if(pieza_rec === ''){
            $("#proyecto").val(project);
            $("#pieza").val(project);
        }else{
            $("#proyecto").val(project);
            $("#pieza").val(pieza_rec);
        }
        
        $('#areas_p option').remove();
        $('#persona_enc option').remove();

        var areas_a_select = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            var option = '';
            option += '<option value="" selected="true" disabled="disabled">Seleccione Area </option>';
        for (var i = 0; i < areas_a_select.length; i++){
            option += '<option value="'+ areas_a_select[i] + '">' + areas_a_select[i] + '</option>';
        }
        $('#areas_p').append(option);

        <?php
        //$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoArte");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $artephp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoProgramacion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $programacionphp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoAdministracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $administracionphp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoCopyCorreccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $copycorreccionphp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoEstrategia");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $estrategiaphp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoIlustracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $ilustracionphp2[] = $valores[nombre];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre FROM equipoPostProduccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $postproduccionphp2[] = $valores[nombre];
        }
        ?>

        var arte_php = ["<?php echo utf8_encode(implode('","', $artephp)); ?>"];
        //alert(arte_php);
        var programacion_php = ["<?php echo utf8_encode(implode('","', $programacionphp2)); ?>"];
        var administracion_php = ["<?php echo utf8_encode(implode('","', $administracionphp2)); ?>"];
        var copy_correcion_php = ["<?php echo utf8_encode(implode('","', $copycorreccionphp2)); ?>"];
        var estrategia_php = ["<?php echo utf8_encode(implode('","', $estrategiaphp2)); ?>"];
        var ilustracion_php = ["<?php echo utf8_encode(implode('","', $ilustracionphp2)); ?>"];
        var post_produccion_php = ["<?php echo utf8_encode(implode('","', $postproduccionphp2)); ?>"];
        var list_personas = {
            'Arte': arte_php,
            'Programación': programacion_php,
            'Administración': administracion_php,
            'Copy y Corrección de estilo': copy_correcion_php,
            'Estrategia': estrategia_php,
            'Ilustración': ilustracion_php,
            'Post Producción': post_produccion_php,
            'Compras': ['Omar Coria']
        }

        var $list_personas = $('#persona_enc');
        $('#areas_p').change(function () {
            var allareas = $(this).val(), persona = list_personas[allareas] || [];
            var html = $.map(persona, function (t) {
                return '<option value="' + t + '">' + t + '</option>'
            }).join('');
            $list_personas.html(html)
        });


        CargarModal_b();
    
	    function CargarModal_b(){
            $( document ).ready(function() {
                $('#modalNuevo').modal('toggle')
            });
	    }
    }
    
</script>

<!-- accion agregar pieza boton -->
<script>
    var botonPieza = document.getElementById('agregar_pieza');
    
    botonPieza.onclick = function(e) {
        CargarModal_b();
    
	    function CargarModal_b(){
            $( document ).ready(function() {
                $('#modalPieza').modal('toggle')
            });
	    }
    }
    
</script>
<script>
    $(document).ready(function (){
        $('.agregar_pieza').on('click', function (e){
            e.preventDefault();

            $("#tablab tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();   
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();   
                //alert(f_fin);
                $('#fechaSalida').attr('min', odt_ini);
                $('#fechaSalida').attr('max', f_fin);
                $('#fechaInicio').attr('min', odt_ini);
                $('#fechaInicio').attr('max', f_fin);
            });            
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $( ".grey" ).css( "background-color", "#febe10" );

        var x = document.getElementsByName("6");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.backgroundColor = "#454444";
        }
        var y = document.getElementsByName("0");
        var i;
        for (i = 0; i < y.length; i++) {
            y[i].style.backgroundColor = "#454444";
        }
        var z = document.getElementsByName("fech_fin");
        var i;
        for (i = 0; i < z.length; i++) {
            z[i].style.backgroundColor = "#05761B";
        }
        var a = document.getElementsByName("fech_ini");
        var i;
        for (i = 0; i < a.length; i++) {
            a[i].style.backgroundColor = "grey";
        }
        var f = document.getElementsByName("fines");
        var i;
        for (i = 0; i < f.length; i++) {
            f[i].style.backgroundColor = "#454444";
        }
        var z = document.getElementsByName("fech_ant");
        var i;
        for (i = 0; i < z.length; i++) {
            z[i].style.backgroundColor = "#cb3234";
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo').click(function () {
            nombre = $('#nombre').val();
            apellido = $('#apellido').val();
            email = $('#email').val();
            telefono = $('#telefono').val();
            area = $('#areas_p').val(); 
            persona = $('#persona_enc').val();
            proyecto = $('#proyecto').val();
            pieza = $('#pieza').val();
            //alert(area);
            agregardatos(nombre, apellido, email, telefono, area, persona, proyecto, pieza);
        });


        $('#actualizadatos').click(function () {
            actualizaDatos();
        });

    });
</script>

<script>
    var rectangulo = document.querySelectorAll('.rect_colors');
    var rectangulo2 = document.querySelectorAll('.rect_colors_piezas');
    const fecha = new Date();
    //alert(rectangulo.length);
    rectangulo.forEach(element => {
        if (fecha.getDate() == 10){
            element.style.fill="green";
        } else{
            element.style.fill="yellow";
        }
    });
    rectangulo2.forEach(element => {
        if (fecha.getDate() == 10){
            element.style.fill="green";
        } else{
            element.style.fill="green";
        }
    });
</script>

<script>
    var botonPieza = document.getElementById('agregar_pieza');
    
    botonPieza.onclick = function(e) {
        CargarModal_b();
    
	    function CargarModal_b(){
            $( document ).ready(function() {
                $('#modalPieza').modal('toggle')
            });
	    }
    }
    
</script>


