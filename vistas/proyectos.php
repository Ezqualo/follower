<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

$marca_get = $_GET["marcas"];
$cliente_get = $_GET["clientes"];
$ejecutiva_get = $_GET["ejecutiva"];

$marca_post = $_POST["marcas"];
$cliente_post = $_POST["clientes"];
$ejecutivaCorreo = $_POST["ejecutivas"];

if (strlen(stristr($cliente_post,'Todos'))>0) {
	$cliente_post="Todos";
}
if(strlen($cliente_post)==7){
	
}

if( (empty($marca_post)||empty($cliente_post)) ){
    if(empty($marca_get) || empty($cliente_get)){
        header("Location: ../vistas/busqueda.php");
        die();
    }
}

if(empty($marca_get == false)){
    $marca_obt = $marca_get;
    $cliente_obt = $cliente_get;
    $ejecutiva = $ejecutiva_get;
}else{
    $marca_obt = $marca_post;
    $cliente_obt = $cliente_post;
    $ejecutiva = $ejecutivaCorreo;
}

	
//$mysqli = new mysqli('localhost','root','password','ezqualof_follower');

$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');

?>

<!DOCTYPE html>
<html lang="en">
<head>

    
    <script src="../tablas/librerias/jquery-3.2.1.min.js"></script>
    <script src="../tablas/js/funciones_semaforo.js"></script>
    <script src="../tablas/librerias/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/alertifyjs/css/themes/default.css">
    <script src="../tablas/librerias/alertifyjs/alertify.js"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema Follower Ezqualo">
    <meta name="author" content="Xavier Escamilla, Ivan Salazar">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-128x128.png" sizes="128x128">

    <title>Follower</title>

    <!-- Ionic Iconos -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/semaforo.css">
    <link rel="stylesheet" href="../css/file.css">
    <link rel="stylesheet" href="../css/slide.css">
    
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.24/css/dataTables.bootstrap.min.css">

    <!-- DataTables Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/custom-tabla.css">

    <!-- Bootstrap Table Treegrid -->
    <link rel="stylesheet" href="../bootstrap/jquery-treegrid-master/css/jquery.treegrid.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <!-- Lirebrias para Edicion de BRIEF y ODT-->
    <script src="js/funciones_ODT.js"></script>
    <script src="js/funciones_BRIEF.js"></script>
    <style type="text/css">
        a:hover{ background-color:#51575e; cursor: pointer;}
        #tituloA:hover{cursor: pointer;};
    </style>
    <!-- Sweet Alert -->
    
	

</head>

<body>

<!-- Logo Vista y Boton Cerrar Sesión -->
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">
            <img id="img-principal" src="../img/pantalla4.png" width="75%">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="../bd/logout.php"><input  type="image" src="../img/boton_cerrar sesion.png" alt="Submit" style="float: right;"></a>
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
                                <?php
                                if($useridRol == 1){
                                ?>
									<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
                                    <div class="dropdown" style="border-radius: 8px;">
										<input type="image" onClick="parent.location='#'" src="../img/btncatalogos_blanco.png" onMouseOver="this.src='../img/btncatalogos_amarillo.png'" onMouseOut="this.src='../img/btncatalogos_blanco.png'" style="height: 35px;">
										<div class="dropdown-content" style="border-radius: 8px; border:2px solid #febe10;">
                                            					<a href="../tablas/usuarios.php">Usuarios</a>
										<a href="../tablas/personal.php">Ezqualo</a>
										<a href="../tablas/vista_clientes.php">Clientes</a>
										<a href="../tablas/proveedor.php">Proveedores</a>
										<a href="../tablas/archivero.php">Archivero</a>
										</div>
									</div>
                                <?php
                                } else if($useridRol == 2){
                                ?>
                                	<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
                                <?php							
                                } 
                                ?>
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


<?php

if($marca_obt == "Todos" && $cliente_obt == "Todos "){
    echo '<h2 class="text-center"><span class=""></span></h2>';
}else{
    echo '<h2 class="text-center"><span class="">'.$marca_obt.'</span></h2>';
    echo '<h4 class="text-center"><span class="">'.$cliente_obt.'</span></h4>';
}

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
	$cadena = str_replace(
	array('Ñ', 'ñ', 'Ç', 'ç'),
	array('N', 'n', 'C', 'c'),
	$cadena
	);
	
	return $cadena;
}
?>
<?php
    //Codigo de sistema de condiciones para mostrar todos los clientes por marca

    //$marca_obt="EZQ Ezqualo";
    $muchos=0;
    $msgODT=0;
    $numTabla=1;
    if($cliente_obt == "Todos" && $marca_obt!="Todos"){
        if($useridRol == 1){
            if($ejecutiva=="admin"){
                $sqlX = $mysqli -> query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = '$marca_obt'");
            }else{
            
                $sqlX = $mysqli -> query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = '$marca_obt' and ejecutivasCliente like'%$ejecutiva%'");
            }
        }else{
            $sqlX = $mysqli -> query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = '$marca_obt' and ejecutivasCliente like'%$userlogin%'");
        }
        
        $msgODT=1;
    }
    elseif($cliente_obt == "Todos" && $marca_obt=="Todos"){
            $sqlX = $mysqli -> query("SELECT nombreCliente FROM clientes LIMIT 1" );
    }
    else{
        $cadena = $cliente_obt;
        $nombre_cliente_odt = eliminar_acentos($cadena);
        if($useridRol == 1){
            $sqlX = $mysqli -> query("SELECT nombreCliente FROM clientes WHERE nombreCliente = '$nombre_cliente_odt' LIMIT 1");
        }else{
            $sqlX = $mysqli -> query("SELECT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND nombreCliente = '$nombre_cliente_odt' LIMIT 1");
        }
    }
    $muchos=mysqli_num_rows($sqlX);
    if($muchos==0){
        echo('<h1 class="text-center"><span class="">No tiene Datos Registrados</span></h1>');
    }
    while($grupos = mysqli_fetch_array($sqlX)) {
    
?>

<!-- Tabla ODTS -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <?php 
            if($msgODT==1){
                echo utf8_encode('<h1 class="text-center"><span class="">ODTS - '.$grupos[0].'</span></h1>');
            }
            else{
                echo('<h1 class="text-center"><span class="">ODTS</span></h1>');
            }
        ?>
        <table class="table table-striped table-dark tree" id="tabla">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Añadir Pieza</th>
                <th scope="col">Inicio</th>
                <th scope="col">Salida</th>
                <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                <th scope="col"><ion-icon name="chatboxes" size="large"></ion-icon></th>
                <th scope="col">Semáforo</th>
                <th scope="col"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></th>
                <th scope="col">Archivo</th>
            </tr>
            </thead>
            <tbody>
            <!-- Fila 1 -->
            <?php
            
            //nuevo sistema de condiciones 
            if($cliente_obt == "Todos" && $marca_obt!="Todos"){
                if($useridRol == 1){
                    if($ejecutiva=="admin"){
                        $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE cliente = '$grupos[nombreCliente]'");
                    }else{
                        $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE cliente = '$grupos[nombreCliente]' and ejecutivaCuenta like '%$ejecutiva%'");
                    }
                }else{
                    $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE cliente = '$grupos[nombreCliente]' and ejecutivaCuenta like '%$userlogin%'");

                }
            }
            elseif($cliente_obt == "Todos" && $marca_obt=="Todos"){
                if($useridRol == 1){
                    $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts,clientes WHERE clientes.nombreCliente = odts.cliente and clientes.ejecutivasCliente like '%$ejecutiva%' GROUP BY id");
                }else{
                    $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE ejecutivaCuenta like '%$userlogin%'");
                }
            }else{
                $cadena = $cliente_obt;
                $nombre_cliente_odt = eliminar_acentos($cadena);
                if($useridRol == 1){
                    //echo($ejecutiva);
                    //echo($nombre_cliente_odt);
                    $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE cliente = '$nombre_cliente_odt'");
                }else{
                    $sql = $mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE ejecutivaCuenta like '%$userlogin%' AND cliente = '$nombre_cliente_odt'");
                }
            }
            //$resultado=mysqli_query($con,$sql);
            $num_projects = mysqli_num_rows($sql);
            $cont1 = 1;
            $add_pieza = 1;
            $idSemaforo_Odt = 1;
            $idSemaforo_Pieza = 1;
            while($columnas=mysqli_fetch_array($sql)) {
                //$datos = $columnas[1];
                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                //echo utf8_encode("<td>$columnas[proyecto]</td>");
                
                // codigo para odt
                $cadena=$columnas[id]."||".$columnas[proyecto]."||".$columnas[fechaSolicitud]."||".$columnas[fechaEntrega];
                ?>
                	<td><a data-toggle="modal" id="tituloA" data-target="#edicion_odt" onclick="form_actualizarODT('<?php echo utf8_encode($cadena) ?>')"><u style="color:white; font-size:20px;"><b><?php echo utf8_encode($columnas[proyecto]) ?></b></u></a></td>
                <?php
                //fin de edicion para odt
                ////////////////////////////actualizacion
                $id_de_odt = $columnas[id] . '-' . $columnas[proyecto] . '-ODT' ;
                echo '<td><a href="" data-toggle="modal" id="' . $columnas[id] . '" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></td>';
                echo "<td>$columnas[fechaSolicitud]</td>";
                echo "<td>$columnas[fechaEntrega]</td>";
                ////////////////////////////actualizacion
                echo "<td><a href='../tablas/tabla_de_tiempos.php?nom_proy=" .urlencode($columnas[proyecto]). "&tabla=odt&id=".$columnas[id]."' class='class_coment' style='color: orange; font-size: 25px;' >;</a></td>";
                echo "<td><a href='../vistas/comentarios.php?nom_proy=" . $columnas[proyecto] . "'style='color: orange; font-size: 20px;'>Chat</a></td>";
                
                $sql_semaforo = $mysqli -> query("SELECT semaforo FROM odts WHERE idOdt = '$columnas[idOdt]'");
                while($colores_semaforo = mysqli_fetch_array($sql_semaforo)) {
                    $color_semaforo = $colores_semaforo[semaforo];
                }
                $a=$columnas[id];
                //codigo para semaforo por medio de radio buttons
                echo '<td> 
                        <div class="radio-item">';
                            if( $color_semaforo=="#FFC500" ){

                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Inicio'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" checked value="#FFC500">';
                            }else{
                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Inicio'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" value="#FFC500">';
                            }
                            echo '<label id="iniciolabel" for="Inicio'.$numTabla.'-'.$idSemaforo_Odt.'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo=="#1CB707"){
                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Enviado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" checked value="#1CB707">';
                            }else{
                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Enviado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" value="#1CB707">';
                            }

                            echo '<label id="enviadolabel" for="Enviado'.$numTabla.'-'.$idSemaforo_Odt.'"></label>
                        </div>
                        
                        <div class="radio-item">';
                        if($color_semaforo=="#FF0C00"){
                            echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Pausado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" checked value="#FF0C00">';
                        }else{
                            echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Pausado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" value="#FF0C00">';
                        }
                        
                        echo '<label id="pausadolabel" for="Pausado'.$numTabla.'-'.$idSemaforo_Odt.'"></label>
                        </div>
                        
                        <div class="radio-item">';
                            if($color_semaforo=="#6900D1"){
                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Cerrado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" checked value="#6900D1">';
                            }else{
                                echo '<input onclick="act_semaforo('.$a.',value)" type="radio" id="Cerrado'.$numTabla.'-'.$idSemaforo_Odt.'" name="drone'.$numTabla.'-'.$idSemaforo_Odt.'" value="#6900D1">';
                            }
                            
                            echo '<label id="cerradolabel" for="Cerrado'.$numTabla.'-'.$idSemaforo_Odt.'"></label>
                        </div>
                            
                    </td>';
                echo "<td></td>";
                                        
                /*
                echo '<td><select id="idsemaforo'.$idSemaforo_Odt.'" name="idsemaforo" style="background-color: '.$color_semaforo.';" onchange="this.style.backgroundColor=this.value , GuardarColor(this)">
                        <option value=""></option>
                        <option value="#FFC500">Inicio</option>
                        <option value="#1CB707">Enviado</option>
                        <option value="#6900D1">Cerrado</option>
                        <option value="#FF0C00">Pausado</option>
                        </select>
                    </td>';
		*/
                //onchange="changeColor(this);"
                //<script>function changeColor() { var cod = document.getElementById("idsemaforo"); var codigo = document.getElementById("idsemaforo").value;cod.style.backgroundColor = codigo;};</script>
                
                echo '<td>';
                
                $archivos=$columnas[archivo];
                $jsonNew=json_decode($archivos, true);
                foreach($jsonNew as $i => $value){
                    echo '<a title="Descargar Archivo" href="../uploads/'.$jsonNew[$i].'" download="'.$jsonNew[$i].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$jsonNew[$i].'</span> </a><br>';
                }
                echo "</td></tr>";
                
                /*
                echo '<td><a title="Descargar Archivo" href="../uploads/'.$columnas[archivo].'" download="'.$columnas[archivo].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$columnas[archivo].'</span> </a></td>';
                echo "</tr>";
		*/
                $var2 = $cont1 + 1;
                $nom_proy = $columnas[proyecto];
                $sql_piezas=$mysqli -> query("SELECT piezas.id, piezas.idPieza,piezas.nombre,piezas.caracteristicas, piezas.medidas, piezas.fechaInicio, piezas.fechaSalida, odts.fechaEntrega FROM piezas inner join odts on piezas.idPieza = '$columnas[id]' AND odts.id = '$columnas[id]'");
                while($piezas=mysqli_fetch_array($sql_piezas)) {
                    // if($contador2 == 2){
                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                    
                    //echo utf8_encode("<td>$piezas[nombre]</td>");
                    
                    //codigo para editar pieza odt
                    $cadena=$piezas[id]."||".$piezas[idPieza]."||".$piezas[nombre]."||".$piezas[caracteristicas]."||".$piezas[medidas]."||".$piezas[fechaInicio]."||".$piezas[fechaSalida]."||".$piezas[fechaEntrega];
                    ?>
                    <td><a style="color:#D8D8D8; font-size:18px;" data-toggle="modal" data-target="#edicion_odt_pieza" onclick="form_actualizarODTpieza('<?php echo utf8_encode($cadena) ?>')"><?php echo utf8_encode($piezas[nombre]) ?></a></td>
                    <?php
                    //fin de codigo para editar pieza odt
                    
                    echo "<td></td>";
                    echo '<td style="color:#D8D8D8;">'.$piezas[fechaInicio].'</td>';
                    echo '<td style="color:#D8D8D8;">'.$piezas[fechaSalida].'</td>';
                    echo '<td><a href="../tablas/tabla_de_tiempos.php?nom_proy='.urlencode($nom_proy).'&nom_pieza='.$piezas[nombre].'&tabla=odt&id='.$piezas[id].'" class="class_coment" style="color: orange; font-size: 25px;">;</a></td>';
                    echo '<td><a href="../vistas/comentarios.php?nom_proy='.$nom_proy.'&nom_pieza='.$piezas[nombre].'" style="color: orange; font-size: 20px;"></a></td>';
                    
                    $sql_semaforo_piezas = $mysqli -> query("SELECT semaforo FROM piezas WHERE id = '$piezas[id]' ");
                    while($colores_semaforo_piezas = mysqli_fetch_array($sql_semaforo_piezas)) {
                        $color_semaforo_piezas = $colores_semaforo_piezas[semaforo];
                    }
                    $ab=$piezas[id];
                //codigo para semaforo por medio de radio buttons
                echo '<td>
                        <div class="radio-item">';
                        //echo($color_semaforo_piezas);
                            if( $color_semaforo_piezas=="#FFC500" ){

                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="InicioP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" checked value="#FFC500">';
                            }else{
                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="InicioP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" value="#FFC500">';
                            }
                            echo '<label id="iniciolabel" for="InicioP'.$numTabla.'-'.$idSemaforo_Pieza.'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_piezas=="#1CB707"){
                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="EnviadoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" checked value="#1CB707">';
                            }else{
                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="EnviadoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" value="#1CB707">';
                            }

                            echo '<label id="enviadolabel" for="EnviadoP'.$numTabla.'-'.$idSemaforo_Pieza.'"></label>
                        </div>
                        <div class="radio-item">';
                        if($color_semaforo_piezas=="#FF0C00"){
                            echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="PausadoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" checked value="#FF0C00">';
                        }else{
                            echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="PausadoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" value="#FF0C00">';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoP'.$numTabla.'-'.$idSemaforo_Pieza.'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_piezas=="#6900D1"){
                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="CerradoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" checked value="#6900D1">';
                            }else{
                                echo '<input onclick="act_semaforo_p('.$ab.',value)" type="radio" id="CerradoP'.$numTabla.'-'.$idSemaforo_Pieza.'" name="droneP'.$numTabla.'-'.$idSemaforo_Pieza.'" value="#6900D1">';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoP'.$numTabla.'-'.$idSemaforo_Pieza.'"></label>
                        </div>
                        

                    </td>';
                    
                    // VISTA PREVIA ODT

                    echo '<td>';
                        $datos1=$nom_proy."||".
                                $piezas['nombre'];
                    	if($color_semaforo_piezas=="#6900D1"){
                            $sql_pieza = $mysqli -> query("SELECT * FROM previaPiezas WHERE idPiezaOdt = '$piezas[id]' AND fechafinal = '$piezas[fechaSalida]'");
                            $row_cnt = mysqli_num_rows($sql_pieza);
                            //echo " num rows ".$row_cnt;
                            if($row_cnt == 0){
                                //echo " num entre if";
                                
                                $no_existe_vista = 0;
                                $datos= "../img/btnportada.png";
                                ?>
                                <a href="" onclick="form_actualizar_previa('<?php echo $datos ?>','<?php echo $datos1 ?>')" data-toggle="modal" id="<?php echo $piezas[id] ?>" class="previa_pieza_odt"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></a>
                                <?php
                                $var_cero = 1;
                            } else{
                                $no_existe_vista = 2;
                                while ($row_pieza = mysqli_fetch_array($sql_pieza)) {
                                    
                                    $datos= $row_pieza[0]."||".
                                            $row_pieza[1]."||".
                                            $row_pieza[2]."||".
                                            $row_pieza[3]."||".
                                            $row_pieza[4]."||".
                                            $row_pieza[5]."||".
                                            $row_pieza[6]."||".
                                            $row_pieza[7]."||".
                                            $row_pieza[8]."||".
                                            $row_pieza[9];

                                    if($row_pieza[1] == $piezas[id] && $row_pieza[2] == $piezas[6]){
                                        ?>
                                        <a href="" onclick="form_actualizar_previa('<?php echo $datos ?>','<?php echo $datos1 ?>')" data-toggle="modal" id="<?php echo $piezas[id] ?>" class="previa_pieza_odt"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></a>
                                        <?php
                                    } 
                                }
                                
                            }
                            
                            
                            
                        }
                    echo '</td>';
                    // VISTA PREVIA ODT
                    
                    
                    //echo '<td>';
                    	//if($color_semaforo_piezas=="#6900D1"){
                    	//	echo '<a href="" data-toggle="modal" id="' . $columnas[proyecto] . '" class="previa_pieza"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></a>';
                         //  }
                    //echo '</td>';
                    
                    /*
                    echo '<td><select id="idsemaforopieza'.$idSemaforo_Pieza.'" style="font-size: 13px; background-color: '.$color_semaforo_piezas.';" onchange="this.style.backgroundColor=this.value , GuardarColorP(this)">
                            <option value=""></option>
                            <option value="#FFC500">Inicio</option>
                            <option value="#1CB707">Enviado</option>
                            <option value="#6900D1">Cerrado</option>
                            <option value="#FF0C00">Pausado</option>
                    </select></td>';
                    */
                    echo "<td></td>";
                    echo "</tr>";

                    $nom_piezas = $piezas[id];
                    $var3 = $var2 + 1;
                    $sql_caracteristicas = $mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezas WHERE id = '$nom_piezas'");
                    while($piezas2=mysqli_fetch_array($sql_caracteristicas)) {
                        // if($contador2 == 2){
                        //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo '<td style="color:#A0A0A0;">Características:</td><td style="color:#A0A0A0;">'.$piezas2[caracteristicas].'</td>';
                        ?>
                        <!-- <td style="color:#A0A0A0;">Características:</td><td style="color:#A0A0A0;"><?php echo utf8_encode($piezas2[caracteristicas]) ?></td> -->
                        <?php
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";

                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo '<td style="color:#A0A0A0;">Medidas:</td><td style="color:#A0A0A0;">'.$piezas2[medidas].'</td>';
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";

                    }
                    $var2 = $var3 + 1;
                    $idSemaforo_Pieza = $idSemaforo_Pieza + 1;
                }
                $cont1 = $var2 + 1;
                $idSemaforo_Odt = $idSemaforo_Odt + 1;
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Fin Tabla Odt-->


<!-- Tabla BRIEF -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
    <?php 
        if($msgODT==1){
            echo utf8_encode('<h1 class="text-center"><span class="">BRIEFS - '.$grupos[0].'</span></h1>');
        }
        else{
            echo('<h1 class="text-center"><span class="">BRIEFS</span></h1>');
        }
    ?>
        <table class="table table-striped table-dark tree" id="tablab">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Añadir Pieza</th>
                <th scope="col">Inicio</th>
                <th scope="col">Salida</th>
                <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                <th scope="col"><ion-icon name="chatboxes" size="large"></ion-icon></th>
                <th scope="col">Semáforo</th>
                <th scope="col"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></ion-icon></th>
                <th scope="col">Archivo</th>
            </tr>
            </thead>
            <tbody>
            <!-- Fila 1 -->
            <?php
            
            //nuevas condiciones
            if($cliente_obt == "Todos" && $marca_obt!="Todos"){
                if($useridRol == 1){
                    if($ejecutiva=="admin"){
                        $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE cliente = '$grupos[nombreCliente]'");

                    }else{
                        $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE cliente = '$grupos[nombreCliente]' and ejecutiva like '%$ejecutiva%'");
                    }
                }else{
                    $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE cliente = '$grupos[nombreCliente]' and ejecutiva like '%$userlogin%'");
                }
            }
            elseif($cliente_obt == "Todos" && $marca_obt=="Todos"){
                if($useridRol == 1){
                    $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs,clientes WHERE clientes.nombreCliente = briefs.cliente and clientes.ejecutivasCliente like '%$ejecutiva%' GROUP BY id");    

                }else{
                    $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE ejecutiva like '%$userlogin%'");
                }
            }else{
                $cadena = $cliente_obt;
                $nombre_cliente_odt = eliminar_acentos($cadena);
                if($useridRol == 1){
                    $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE cliente = '$nombre_cliente_odt'");
                }else{
                    $sql_b = $mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE ejecutiva like '%$userlogin%' AND cliente = '$nombre_cliente_odt'");
                }
            }
            //$resultado=mysqli_query($con,$sql);
            $num_projects_b = mysqli_num_rows($sql_b);
            $cont1 = 1;
            $add_pieza = 1;
            $idSemaforo_Brief = 1;
            $idSemaforo_Pieza_B = 1;
            while($columnas_b=mysqli_fetch_array($sql_b)) {
                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                //echo utf8_encode("<td>$columnas_b[nombre]</td>");
                
                //codigo para editar brief
                $cadena=$columnas_b[id]."||".$columnas_b[nombre]."||".$columnas_b[fechaEntrega]."||".$columnas_b[fechaSalida];
                ?>
                <td><a data-toggle="modal" data-target="#edicion_brief" onclick="form_actualizarBRIEF('<?php echo utf8_encode($cadena) ?>')"><u style="color:white; font-size:20px"><b><?php echo utf8_encode($columnas_b[nombre]) ?></b></u></a></td>
                <?php
                //fin de codigo para editar brief
                
                echo '<td><a href="" data-toggle="modal" id="' . $columnas_b[nombre] . '" class="add_pieza_b"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></td>';
                echo "<td>$columnas_b[fechaEntrega]</td>";
                echo "<td>$columnas_b[fechaSalida]</td>";
                echo "<td><a href='../tablas/tt_briefs.php?nom_proy=" ,urlencode($columnas_b[nombre]), "&tabla=brief&id=".$columnas_b[id]."' class='class_coment' style='color: orange; font-size: 25px;' >;</a></td>";
                echo "<td><a href='../vistas/comentarios_brief.php?nom_proy=" . $columnas_b[nombre] . "'style='color: orange; font-size: 20px;'>Chat</a></td>";
                //echo '<td><svg width="100px" height="30px"><rect id="semaforo_colors_b" class="rect_colors_b" x="5" y="5" width="150" height="350" stroke="white" stroke-width="2"/></svg></td>';
                $sql_semaforo_b = $mysqli -> query("SELECT semaforo FROM briefs WHERE id = '$columnas_b[id]' AND nombre = '$columnas_b[nombre]'");
                while($colores_semaforo_b = mysqli_fetch_array($sql_semaforo_b)) {
                    $color_semaforo_b = $colores_semaforo_b[semaforo];
                }
                $ba=$columnas_b[id];
                //codigo para semaforo por medio de radio buttons
                echo '<td>
                        <div class="radio-item">';
                            if( $color_semaforo_b=="#FFC500" ){

                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="InicioB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" checked value="#FFC500">';
                            }else{
                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="InicioB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" value="#FFC500">';
                            }
                            echo '<label id="iniciolabel" for="InicioB'.$numTabla.'-'.$idSemaforo_Brief.'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_b=="#1CB707"){
                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="EnviadoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" checked value="#1CB707">';
                            }else{
                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="EnviadoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" value="#1CB707">';
                            }

                            echo '<label id="enviadolabel" for="EnviadoB'.$numTabla.'-'.$idSemaforo_Brief.'"></label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                        if($color_semaforo_b=="#FF0C00"){
                            echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="PausadoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" checked value="#FF0C00">';
                        }else{
                            echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="PausadoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" value="#FF0C00">';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoB'.$numTabla.'-'.$idSemaforo_Brief.'"></label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                            if($color_semaforo_b=="#6900D1"){
                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="CerradoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" checked value="#6900D1">';
                            }else{
                                echo '<input onclick="act_semaforo_b('.$ba.',value)" type="radio" id="CerradoB'.$numTabla.'-'.$idSemaforo_Brief.'" name="droneB'.$numTabla.'-'.$idSemaforo_Brief.'" value="#6900D1">';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoB'.$numTabla.'-'.$idSemaforo_Brief.'"></label>
                        </div>';
                        
                        
                /*
                echo '<td><select id="idsemaforoBrief'.$idSemaforo_Brief.'" style="background-color: '.$color_semaforo_b.';" onchange="this.style.backgroundColor=this.value , GuardarColorB(this)">
                        <option value=""></option>
                        <option value="#FFC500">Inicio</option>
                        <option value="#1CB707">Enviado</option>
                        <option value="#6900D1">Cerrado</option>
                        <option value="#FF0C00">Pausado</option>
                    </select>
                </td>';
                */
                echo '</td>';
                echo "<td></td>";
                
                echo '<td>';
                $archivos=$columnas_b[archivo];
                $jsonNew=json_decode($archivos, true);
                    foreach($jsonNew as $i => $value){
                        echo '<a title="Descargar Archivo" href="../uploads/'.$jsonNew[$i].'" download="'.$jsonNew[$i].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$jsonNew[$i].'</span> </a><br>';
                    }
                 
                /*
                echo '<td><a title="Descargar Archivo" href="../uploads/'.$columnas_b[archivo].'" download="'.$columnas_b[archivo].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$columnas_b[archivo].'</span> </a></td>';
                echo "</td></tr>";
		*/
                $var2 = $cont1 + 1;
                $nom_proy_b = $columnas_b[nombre];
                //$sql_piezas=$mysqli -> query("SELECT piezas.id, piezas.idPieza,piezas.nombre,piezas.caracteristicas, piezas.medidas, piezas.fechaInicio, piezas.fechaSalida, odts.fechaEntrega FROM piezas inner join odts on piezas.idPieza = '$columnas[id]' AND odts.id = '$columnas[id]'");
                $sql_piezas_b=$mysqli -> query("SELECT piezasBrief.id,piezasBrief.idPieza, piezasBrief.nombre, piezasBrief.caracteristicas,piezasBrief.medidas,piezasBrief.fechaInicio, piezasBrief.fechaSalida, briefs.fechaSalida FROM piezasBrief inner join briefs on piezasBrief.idPieza = '$columnas_b[id]' AND briefs.id = '$columnas_b[id]'");
                while($piezas_b=mysqli_fetch_array($sql_piezas_b)) {
                    // if($contador2 == 2){
                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                    //echo utf8_encode("<td>$piezas_b[nombre]</td>");
                    //codigo para editar piezas brief
                    $cadena=$piezas_b[id]."||".$piezas_b[idPieza]."||".$piezas_b[nombre]."||".$piezas_b[caracteristicas]."||".$piezas_b[medidas]."||".$piezas_b[fechaInicio]."||".$piezas_b[6]."||".$piezas_b[7];
                    ?>
                    
                    <td style="color:#D8D8D8; font-size:18px;"><a data-toggle="modal" data-target="#edicion_brief_pieza" onclick="form_actualizarBRIEFpieza('<?php echo utf8_encode($cadena) ?>')"><?php echo utf8_encode($piezas_b[nombre]) ?></a></td>
                    <?php
                    //fin de cdigo para ediar pieazs brief
                    echo "<td></td>";
                    echo '<td style="color:#D8D8D8;">'.$piezas_b[fechaInicio].'</td>';
                    echo '<td style="color:#D8D8D8;">'.$piezas_b[6].'</td>';
                    echo '<td><a href="../tablas/tt_briefs.php?nom_proy='.$nom_proy_b.'&nom_pieza='.$piezas_b[nombre].'&tabla=brief&id='.$piezas_b[id].'" class="class_coment" style="color: orange; font-size: 25px;">;</a></td>';
                    echo '<td><a href="../vistas/comentarios_brief.php?nom_proy='.$nom_proy_b.'&nom_pieza='.$piezas_b[nombre].'" style="color: orange; font-size: 20px;"></a></td>';
                    
                    $sql_semaforo_piezas_b = $mysqli -> query("SELECT semaforo FROM piezasBrief WHERE id = '$piezas_b[id]' AND nombre = '$piezas_b[nombre]'");
                    while($colores_semaforo_piezas_b = mysqli_fetch_array($sql_semaforo_piezas_b)) {
                        $color_semaforo_piezas_b = $colores_semaforo_piezas_b[semaforo];
                    }
                    $bb=$piezas_b[id];
                //codigo para semaforo por medio de radio buttons
                
                echo '<td>
                        <div class="radio-item">';
                            if( $color_semaforo_piezas_b=="#FFC500" ){
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="InicioPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" checked value="#FFC500">';
                            }else{
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="InicioPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" value="#FFC500">';
                            }
                            echo '<label id="iniciolabel" for="InicioPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'"> </label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_piezas_b=="#1CB707"){
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="EnviadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" checked value="#1CB707">';
                            }else{
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="EnviadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" value="#1CB707">';
                            }

                            echo '<label id="enviadolabel" for="EnviadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'"</label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                        if($color_semaforo_piezas_b=="#FF0C00"){
                            echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="PausadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" checked value="#FF0C00">';
                        }else{
                            echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="PausadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" value="#FF0C00">';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'"> </label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                            if($color_semaforo_piezas_b=="#6900D1"){
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="CerradoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" checked value="#6900D1">';
                            }else{
                                echo '<input onclick="act_semaforo_pb('.$bb.',value)" type="radio" id="CerradoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" name="dronePB'.$numTabla.'-'.$idSemaforo_Pieza_B.'" value="#6900D1">';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoPB'.$numTabla.'-'.$idSemaforo_Pieza_B.'"> </label>
                        </div> </td>';
                        
                    /*
                    echo '<td><select id="idsemaforoBriefPieza'.$idSemaforo_Pieza_B.'" style="font-size: 13px; background-color: '.$color_semaforo_piezas_b.';" onchange="this.style.backgroundColor=this.value , GuardarColorPB(this)">
                            <option value=""></option>
                            <option value="#FFC500">Inicio</option>
                            <option value="#1CB707">Enviado</option>
                            <option value="#6900D1">Cerrado</option>
                            <option value="#FF0C00">Pausado</option>
                    </select></td>';
                    */
                    
                    
                    // VISTA PREVIA BRIEF

                    echo '<td>';
                        $datos1=$nom_proy_b."||".
                                $piezas_b['nombre'];
                    	if($color_semaforo_piezas_b=="#6900D1"){
                            $sql_pieza = $mysqli -> query("SELECT * FROM previaPiezasb WHERE idPiezaBrief = '$piezas_b[id]' AND fechafinal = '$piezas_b[6]'");
                            $row_cnt = mysqli_num_rows($sql_pieza);
                            //echo " num rows ".$row_cnt;
                            if($row_cnt == 0){
                                //echo " num entre if";
                                $no_existe_vista = 0;
                                $datos= "../img/btnportada.png";
                                ?>
                                <a href="" onclick="form_actualizar_previaB('<?php echo $datos ?>','<?php echo $datos1 ?>')" data-toggle="modal" id="<?php echo $piezas_b[id] ?>" class="previa_pieza_brief"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></a>
                                <?php
                                $var_cero = 1;
                            } else{
                                $no_existe_vista = 2;
                                while ($row_pieza = mysqli_fetch_array($sql_pieza)) {
                                    
                                    $datos= $row_pieza[0]."||".
                                            $row_pieza[1]."||".
                                            $row_pieza[2]."||".
                                            $row_pieza[3]."||".
                                            $row_pieza[4]."||".
                                            $row_pieza[5]."||".
                                            $row_pieza[6]."||".
                                            $row_pieza[7]."||".
                                            $row_pieza[8]."||".
                                            $row_pieza[9];

                                    if($row_pieza[1] == $piezas_b[id] && $row_pieza[2] == $piezas_b[6]){
                                        ?>
                                        <a href="" onclick="form_actualizar_previaB('<?php echo $datos ?>','<?php echo $datos1 ?>')" data-toggle="modal" id="<?php echo $piezas_b[id] ?>" class="previa_pieza_brief"><img src="../img/polaroid_icono.png" alt="icono_polaroid"></a>
                                        <?php
                                    } 
                                }
                                
                            }
                            
                            
                            
                        }
                    echo '</td>';
                    // FIN VISTA PREVIA BRIEF
                    
                    echo "<td></td>";
                    echo "</tr>";

                    $nom_piezas_b = $piezas_b[id];
                    $var3 = $var2 + 1;
                    $sql_caracteristicas_b = $mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezasBrief WHERE id = '$nom_piezas_b'");
                    while($piezas2_b=mysqli_fetch_array($sql_caracteristicas_b)) {
                        // if($contador2 == 2){
                        //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo '<td style="color:#A0A0A0;">Características:</td><td style="color:#A0A0A0;">'.$piezas2_b[caracteristicas].'</td>';
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";

                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo '<td style="color:#A0A0A0;">Medidas:</td><td style="color:#A0A0A0;">'.$piezas2_b[medidas].'</td>';
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";

                    }
                    $var2 = $var3 + 1;
                    $idSemaforo_Pieza_B = $idSemaforo_Pieza_B + 1;
                }
                $cont1 = $var2 + 1;
                $idSemaforo_Brief = $idSemaforo_Brief + 1;
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$numTabla++;
    }//fin de ciclo while de brief
?>
<!-- Fin Tabla Brief-->
<script type="text/javascript">
    function act_semaforo(id,valor) {
        var val=valor;
        var i=id;
        actualizarSemaforoNew(val, "odt", i);
    }
    function act_semaforo_p(id,valor) {
        var valp=valor;
        var ip=id;
        actualizarSemaforoNew(valp, "odt_pieza", ip);
    }
    function act_semaforo_b(id,valor) {
        var valb=valor;
        var ib=id;
        actualizarSemaforoNew(valb, "brief", ib);
    }
    function act_semaforo_pb(id,valor) {
        var valpb=valor;
        var ipb=id;
        actualizarSemaforoNew(valpb, "brief_pieza", ipb);
    }   
    
</script>

<script type="text/javascript">
    
    function GuardarColor(cel) {
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
</script>

<script type="text/javascript">
    
    function GuardarColorP(cel) {
        var id_td = $(cel).attr("id");
        //alert(id_td);
        var cod = document.getElementById(id_td).value;
        var tabla = "odt_pieza";

        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(0)").text();   
            //alert(nombre);
            actualizarSemaforo(cod, tabla, nombre);
        });
        
    };   
</script>

<script type="text/javascript">
    
    function GuardarColorB(cel) {
        var id_td = $(cel).attr("id");
        //alert(id_td);
        var cod = document.getElementById(id_td).value;
        var tabla = "brief";

        $("#tablab tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(0)").text();   
            //alert(nombre);
            actualizarSemaforo(cod, tabla, nombre);
        });
        
    };   
</script>

<script type="text/javascript">
    
    function GuardarColorPB(cel) {
        var id_td = $(cel).attr("id");
        //alert(id_td);
        var cod = document.getElementById(id_td).value;
        var tabla = "brief_pieza";

        $("#tablab tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(0)").text();   
            //alert(nombre);
            actualizarSemaforo(cod, tabla, nombre);
        });
        
    };   
</script>

<br>
<!-- Footer -->
<footer class="">
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Fin Footer -->

<!-- obtener id del proyecto -->
<script>
    var botones_b = document.getElementsByClassName('add_pieza_b');
    for(var i = 0; i < botones_b.length; i++){
        botones_b[i].addEventListener('click', capturar_b);
    }
    function capturar_b(){
        console.log(this.id);
        var nombre_proyecto_b = this.id;
        history.pushState(null, "", "?project="+nombre_proyecto_b+"");
        $("#nom_proyecto_b").val(nombre_proyecto_b);
        CargarModal_b();
    }
    function CargarModal_b(){
        $( document ).ready(function() {
            $('#exampleModal_b').modal('toggle')
        });
    }
</script>

<!-- Modal Formulario Proyectos -->
<div class="modal fade" id="exampleModal_b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_b" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_b">Añadir piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name='modalFormPiezasB' action="../bd/save_piezas_briefNew.php?marcas=<?php echo $marca_obt ?>&clientes=<?php echo $cliente_obt ?>&ejecutiva=<?php echo $ejecutiva ?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_b" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name_b" name="name_b">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas_b" class="col-form-label">Caracteristicas:</label>
                                <input required type="text" class="form-control" id="caracteristicas_b" name="caracteristicas_b">
                            </div>
                            <div class="form-group">
                                <label for="medidas_b" class="col-form-label">Medidas:</label>
                                <input required type="text" class="form-control" id="medidas_b" name="medidas_b">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_b" class="col-form-label">Fecha Inicio:</label>
                                <input required type="date" class="form-control"  id="fechaInicio_b" name="fechaInicio_b">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_b" class="col-form-label">Fecha Salida:</label>
                                <input required type="date" class="form-control"  id="fechaSalida_b" name="fechaSalida_b">
                            </div>
                            <div class="form-group" >
                                <label for="nom_proyecto_b" class="col-form-label"></label>
                                <input type="text" class="form-control"  id="nom_proyecto_b" name="nom_proyecto_b" class="nom_proyecto_b" hidden>
                                <input type="text" class="form-control"  id="tabla_tiemposB" name="tabla_tiemposB" class="tabla_tiempos" value=0 hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" value="Añadir Pieza" onclick="valida_piezab()" >Añadir Pieza</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                            <?php
                                //if (isset($_POST['submit2'])){
                                  //  include ('../bd/save_pieza_brief.php');
                                //}
                            ?>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Pieza</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function valida_piezab(){
        f1 = document.getElementById('fechaInicio_b').value;
        f2 = document.getElementById('fechaSalida_b').value;
        if( f1>=f2) {
            alertify.error("Fecha Incorrectas");
            $('#fechaSalida_b').focus();
            return 0;
        }
        document.modalFormPiezasB.submit();
    }
</script>
<!-- obtener id del proyecto -->
<script>
    var botones = document.getElementsByClassName('add_pieza');
    for(var i = 0; i < botones.length; i++){
        botones[i].addEventListener('click', capturar);
    }
    function capturar(){
        console.log(this.id);
        var nombre_proyecto = this.id;
        history.pushState(null, "", "?project="+nombre_proyecto+"");
        $("#id_proyecto").val(nombre_proyecto);
        CargarModal();
    }
    function CargarModal(){
        $( document ).ready(function() {
            $('#exampleModal').modal('toggle')
        });
    }
</script>

<!-- Modal Formulario Proyectos -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name='modalFormPiezas' action="../bd/save_piezasNew.php?marcas=<?php echo $marca_obt ?>&clientes=<?php echo $cliente_obt ?>&ejecutiva=<?php echo $ejecutiva?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas" class="col-form-label">Caracteristicas:</label>
                                <input required type="text" class="form-control" id="caracteristicas" name="caracteristicas">
                            </div>
                            <div class="form-group">
                                <label for="medidas" class="col-form-label">Medidas:</label>
                                <input required type="text" class="form-control" id="medidas" name="medidas">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio" class="col-form-label">Fecha Inicio:</label>
                                <input required type="date" class="form-control"  id="fechaInicio" name="fechaInicio">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                                <input required type="date" class="form-control"  id="fechaSalida" name="fechaSalida">
                            </div>
                            <div class="form-group" >
                                <label for="id_proyecto" class="col-form-label"></label>
                                <input type="text" class="form-control"  id="id_proyecto" name="id_proyecto" class="id_proyecto" hidden>
                                <input type="text" class="form-control"  id="tabla_tiempos" name="tabla_tiempos" class="tabla_tiempos" value=0 hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" value="Añadir Pieza" onclick="valida_pieza()" >Añadir Pieza</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                            <?php
                                //if (isset($_POST['submit'])){
                                //    include ('../bd/save_pieza.php');
                                //}
                            ?>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Pieza</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function valida_pieza(){
    f1 = document.getElementById('fechaInicio').value;
    f2 = document.getElementById('fechaSalida').value;
    if( f1>=f2) {
    alertify.error("Fecha Incorrectas");
        $('#fechaSalida').focus();
        return 0;
    }
        document.modalFormPiezas.submit();
    }
</script>
<!-- Asignar rango a las fechas de piezas -->
<script>
    $(document).ready(function (){
        $('.add_pieza').on('click', function (e){
            e.preventDefault();

            $("#tabla tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();   
                var odt_ini = f_ini.slice(0, -9);
                var odt_final = $(this).find("td:eq(3)").html();   
                //alert(odt_final);
                $('#fechaSalida').attr('min', odt_ini);
                $('#fechaSalida').attr('max', odt_final);
                $('#fechaInicio').attr('min', odt_ini);
                $('#fechaInicio').attr('max', odt_final);
            });            
        })
    })
</script>
<script>
    $(document).ready(function (){
        $('.add_pieza_b').on('click', function (e){
            e.preventDefault();

            $("#tablab tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();   
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();   
                //alert(f_fin);
                $('#fechaSalida_b').attr('min', odt_ini);
                $('#fechaSalida_b').attr('max', f_fin);
                $('#fechaInicio_b').attr('min', odt_ini);
                $('#fechaInicio_b').attr('max', f_fin);
            });            
        })
    })
</script>



<script type="text/javascript">
    //Cookies.remove('nombre');
</script>
<script>
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, "../vistas/proyectos.php?marcas=<?php echo $marca_obt ?>&clientes=<?php echo ($cliente_obt) ?>&ejecutiva=<?php echo $ejecutiva ?>");
}
</script>

<!-- Modal Formulario Edicion Proyectos ODT -->
<div class="modal fade" id="edicion_odt" tabindex="-1" role="dialog" aria-labelledby="edicion_odtLabel_b" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edicion_odtModalLabel_b">Editar ODT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_edit_ODT" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name_edit_ODT" name="name_edit_ODT" readonly="readonly">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_edit_ODT" class="col-form-label">Fecha Inicio:</label>
                                <input required type="date" class="form-control"  id="fechaInicio_edit_ODT" name="fechaInicio_edit_ODT" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_edit_ODT" class="col-form-label">Fecha Salida:</label>
                                <input required type="date" class="form-control"  id="fechaSalida_edit_ODT" name="fechaSalida_edit_ODT">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btn btn-primary" id="actualizaODT" value="Actualizar ODT">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                            
                        </div>
                        <input type="text" class="form-control" id="id_edit_ODT" name="id_edit_ODT" hidden>
                        <input type="text" class="form-control" id="fechaAnterior_ODT" name="fechaAnterior_ODT" hidden>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Formulario Edicion Proyectos ODT piezas -->
<div class="modal fade" id="edicion_odt_pieza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar ODT Pieza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_edit_pieza" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name_edit_pieza" name="name_edit_pieza" required>
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas_edit_pieza" class="col-form-label">Caracteristicas:</label>
                                <input type="text" class="form-control" id="caracteristicas_edit_pieza" name="caracteristicas_edit_pieza" required>
                            </div>
                            <div class="form-group">
                                <label for="medidas_edit_pieza" class="col-form-label">Medidas:</label>
                                <input type="text" class="form-control" id="medidas_edit_pieza" name="medidas_edit_pieza" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_edit_pieza" class="col-form-label">Fecha Inicio:</label>
                                <input required type="date" class="form-control"  id="fechaInicio_edit_pieza" name="fechaInicio_edit_pieza" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_edit_pieza" class="col-form-label">Fecha Salida:</label>
                                <input required type="date" class="form-control"  id="fechaSalida_edit_pieza" name="fechaSalida_edit_pieza">
                            </div>
                            <div class="form-group" >
                                <input type="text" class="form-control"  id="id_edit_pieza" name="id_edit_pieza" class="id_edit_pieza" hidden>
                                <input type="text" class="form-control"  id="id_edit_odt" name="id_edit_odt" class="id_edit_odt" hidden>
                                <input type="text" class="form-control"  id="fechaInicio_completa" name="fechaInicio_completa" class="fechaInicio_completa" hidden>
                                <input type="text" class="form-control"  id="fechaAnterior" name="fechaAnterior" class="fechaAnterior" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btn btn-primary" id="actualizaODTpieza" value="Actualizar Pieza">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- obtener cadena para modal de editar ODT y ODT piezas $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
<script>
    function form_actualizarODT(datos){
        d=datos.split('||');
        var fI = d[2].slice(0, -9);
        //var fF = d[3].slice(0, 10);
        $('#fechaSalida_edit_ODT').attr('min', d[3]);
        $('#id_edit_ODT').val(d[0]);
        $('#name_edit_ODT').val(d[1]);
        $('#fechaInicio_edit_ODT').val(fI);
        $('#fechaSalida_edit_ODT').val(d[3]);
        $('#fechaAnterior_ODT').val(d[3]);
        //$('#idpersona').val(d[0]);
    }
    


    $( document ).ready(function() {
    $("#actualizaODT").click(function () {
            actualizaODT();
        });
    });
</script>
    
<script>
    function form_actualizarODTpieza(datos){
        d=datos.split('||');
        //var fF = d[3].slice(0, 10);
        $('#id_edit_pieza').val(d[0]);
        $('#id_edit_odt').val(d[1]);
        $('#name_edit_pieza').val(d[2]);
        $('#caracteristicas_edit_pieza').val(d[3]);
        $('#medidas_edit_pieza').val(d[4]);
        var fI = d[5].slice(0, -9);
        $('#fechaSalida_edit_pieza').attr('min', d[6]);
        $('#fechaSalida_edit_pieza').attr('max', d[7]);
        $('#fechaInicio_completa').val(d[5]);
        $('#fechaInicio_edit_pieza').val(fI);
        $('#fechaSalida_edit_pieza').val(d[6]);
        $('#fechaAnterior').val(d[6]);
        //$('#idpersona').val(d[0]);
    }
    


    $( document ).ready(function() {
    $("#actualizaODTpieza").click(function () {
            actualizaODTPieza();
        });
    });
    
</script>
<!-- Modal Formulario Edicion Proyectos BRIEF -->
<div class="modal fade" id="edicion_brief" tabindex="-1" role="dialog" aria-labelledby="edicion_briefLabel_b" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edicion_briefModalLabel_b">Editar BRIEF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_edit_BRIEF" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name_edit_BRIEF" name="name_edit_BRIEF" readonly="readonly">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_edit_BRIEF" class="col-form-label">Fecha Inicio:</label>
                                <input required type="date" class="form-control"  id="fechaInicio_edit_BRIEF" name="fechaInicio_edit_BRIEF" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_edit_BRIEF" class="col-form-label">Fecha Salida:</label>
                                <input required type="date" class="form-control"  id="fechaSalida_edit_BRIEF" name="fechaSalida_edit_BRIEF">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btn btn-primary" id="actualizaBRIEF" value="Actualizar BRIEF">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                            
                        </div>
                        <input type="text" class="form-control" id="id_edit_BRIEF" name="id_edit_BRIEF" hidden>
                        <input type="text" class="form-control" id="fechaAnt_BRIEF" name="fechaAnt_BRIEF" hidden>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Formulario Edicion Proyectos BRIEF piezas -->
<div class="modal fade" id="edicion_brief_pieza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar BRIEF Pieza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_edit_BRIEFpieza" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="name_edit_BRIEFpieza" name="name_edit_BRIEFpieza">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas_edit_BRIEFpieza" class="col-form-label">Caracteristicas:</label>
                                <input required type="text" class="form-control" id="caracteristicas_edit_BRIEFpieza" name="caracteristicas_edit_BRIEFpieza">
                            </div>
                            <div class="form-group">
                                <label for="medidas_edit_BRIEFpieza" class="col-form-label">Medidas:</label>
                                <input required type="text" class="form-control" id="medidas_edit_BRIEFpieza" name="medidas_edit_BRIEFpieza">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio_edit_BRIEFpieza" class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control"  id="fechaInicio_edit_BRIEFpieza" name="fechaInicio_edit_BRIEFpieza" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida_edit_BRIEFpieza" class="col-form-label">Fecha Salida:</label>
                                <input type="date" class="form-control"  id="fechaSalida_edit_BRIEFpieza" name="fechaSalida_edit_BRIEFpieza">
                            </div>
                            <div class="form-group" >
                                <input type="text" class="form-control"  id="id_edit_BRIEFpieza" name="id_edit_BRIEFpieza" class="id_edit_BRIEFpieza" hidden>
                                <input type="text" class="form-control"  id="id_edit_brief" name="id_edit_brief" class="id_edit_brief" hidden>
                                <input type="text" class="form-control"  id="fecha_anterior_piezabrief" name="fecha_anterior_piezabrief" class="fecha_anterior_piezabrief" hidden>
                                <input type="text" class="form-control"  id="fechaInicio_completaB" name="fechaInicio_completaB" class="fechaInicio_completaB" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btn btn-primary" id="actualizaBRIEFpieza" value="Actualizar BRIEF Pieza">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="">Cerrar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- obtener cadena para modal de editar ODT y ODT piezas -->
<script>
    function form_actualizarBRIEF(datos){
        d=datos.split('||');
        var fI = d[2].slice(0, -9);
        //var fF = d[3].slice(0, 10);
        $('#fechaSalida_edit_BRIEF').attr('min', d[3]);
        $('#id_edit_BRIEF').val(d[0]);
        $('#name_edit_BRIEF').val(d[1]);
        $('#fechaInicio_edit_BRIEF').val(fI);
        $('#fechaSalida_edit_BRIEF').val(d[3]);
        $('#fechaAnt_BRIEF').val(d[3]);
        //$('#idpersona').val(d[0]);
    }

    $( document ).ready(function() {
    $("#actualizaBRIEF").click(function () {
            actualizaBRIEF();
        });
    });
</script>

<script>
    function form_actualizarBRIEFpieza(datos){
        d=datos.split('||');
        //var fF = d[3].slice(0, 10);
        $('#id_edit_BRIEFpieza').val(d[0]);
        $('#id_edit_brief').val(d[1]);
        $('#name_edit_BRIEFpieza').val(d[2]);
        $('#caracteristicas_edit_BRIEFpieza').val(d[3]);
        $('#medidas_edit_BRIEFpieza').val(d[4]);
        var fI = d[5].slice(0, -9);
        $('#fechaSalida_edit_BRIEFpieza').attr('min', d[6]);
        $('#fechaSalida_edit_BRIEFpieza').attr('max', d[7]);
        $('#fechaInicio_completaB').val(d[5]);
        $('#fechaInicio_edit_BRIEFpieza').val(fI);
        $('#fechaSalida_edit_BRIEFpieza').val(d[6]);
        $('#fecha_anterior_piezabrief').val(d[6]);
        //$('#idpersona').val(d[0]);
    }

    $( document ).ready(function() {
    $("#actualizaBRIEFpieza").click(function () {
            actualizaBRIEFPieza();
        });
    });
    
</script>


<!-- Modal de visualizacion Previa Pieza ODT-->
<div class="modal fade" id="previa_pieza_o" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background-color:black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vista Previa ODT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- Tabla Previa Piezas -->
                <div class="container">
                  <div class="row">
                        <div class="col-md-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label id="LabelProyectoO" name="proyectoO"></label></td>
                                    </tr>
                                    <tr>
                                        <td><label id="LabelPiezaO" name="piezaO"></label></td>
                                    </tr>
                                </tbody>
                            </table>

                            <label id="LabelArchivoO" name="piezaO"></label><br>    
                            <input type="file" class="btn-secondary" id="archivoO" name="archivoO" style="width: 95%;" >
                                
                            
                        </div>

                        <div class="col-md-8">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <div id="content">
                                            <form method="POST" action="index.php" enctype="multipart/form-data">
                                                <div style='text-align:center;'>
                                                    <div class="form-group ">
                                                        <div class="slideshow-container ">
                                                            <!-- Full-width images with number and caption text -->
                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgO1" src="" alt='previa-piezas' style="width:238px; height=240px;" >
                                                            </div>

                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgO2" src="" alt='previa-piezas' style="width:238px; height=240px;" >
                                                            </div>

                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgO3" src="" alt='previa-piezas' style="width:238px; height=240px;" >
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- The dots/circles -->
                                                        <div style="text-align:center">
                                                            <span class="dot" onclick="currentSlide(1)"></span>
                                                            <span class="dot" onclick="currentSlide(2)"></span>
                                                            <span class="dot" onclick="currentSlide(3)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div style="padding-top: 5px; text-align:center;">

                                                    <details>
                                                    <summary><b style="color:white;">Subir Imagen</b></summary>
                                                        <div class="row justify-content-center" >
                                                            <div class="form-group">
                                                                <input type="file" class="btn-secondary" id="imagenO1" name="imagenO1" accept= "image/*" >
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center" >
                                                            <div class="form-group">
                                                                <input type="file" class="btn-secondary" id="imagenO2" name="imagenO2" accept= "image/*" >
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center" >
                                                            <div class="form-group">
                                                                <input type="file" class="btn-secondary" id="imagenO3" name="imagenO3" accept= "image/*" >
                                                            </div>
                                                        </div>
                                                    </details>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                  <!--<img src="../img/btnportada.png" alt="previa-piezas" width="300" height="300" style="border-style: solid; border-color: #febe10; border-width: 12px;"> -->
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                            <div class="col">
                                <div class="col" style="color: #ffffff;">
                                    <div class="form-group" >
                                        <label for="inicioO" class="col-form-label">Inicio:</label>
                                        <input disabled required type="date" class="form-control" id="inicioO" name="inicioO" style="background-color:transparent; color:white;">
                                        <label for="salidaO" class="col-form-label">Salida:</label>
                                        <input disabled required type="date" class="form-control" id="salidaO" name="salidaO" style="background-color:transparent; color:white;">
                                        <label for="horasO" class="col-form-label">Horas:</label>
                                        <input required type="text" class="form-control" id="horasO" name="horasO" style="background-color:transparent; color:white;">

                                        <input type="text" class="form-control" id="id_piezaO" name="id_piezaO" style="background-color:transparent; " hidden>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col" style="color: #ffffff;">
                                    <div class="form-group" >
                                        <label for="recursosO" class="col-form-label">Recursos:</label>
                                        <input required type="text" class="form-control" id="recursosO" name="recursosO" style="background-color:transparent; color:white;">
                                        <label for="cambiosO" class="col-form-label">Cambios:</label>
                                        <input required type="text" class="form-control" id="cambiosO" name="cambiosO" style="background-color:transparent; color:white;">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarVistaPreviaO">Guardar</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- Tabla Previa Piezas -->
                <div class="row justify-content-center">
                    <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarO" onclick="">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de visualizacion Previa Pieza BRIEF-->
<div class="modal fade" id="previa_pieza_b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background-color:black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vista Previa BRIEF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- Tabla Previa Piezas -->
                <div class="container">
                  <div class="row">
                        <div class="col-md-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label id="LabelProyectoB" name="proyectoB"></label></td>
                                    </tr>
                                    <tr>
                                        <td><label id="LabelPiezaB" name="piezaB"></label></td>
                                    </tr>
                                </tbody>
                            </table>

                            <label id="LabelArchivoB" name="piezaB"></label><br>    
                            <input type="file" class="btn-secondary" id="archivoB" name="archivoB" style="width: 95%;" >
                                
                            
                        </div>

                        <div class="col-md-8">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <div id="content">
                                            <form method="POST" action="index.php" enctype="multipart/form-data">
                                                <div style='text-align:center;'>
                                                    <div class="form-group ">
                                                        <div class="slideshow-container ">
                                                            <!-- Full-width images with number and caption text -->
                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgB1" src="" alt='previa-piezas' style="width:100%" >
                                                            </div>

                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgB2" src="" alt='previa-piezas' style="width:100%" >
                                                            </div>

                                                            <div class="mySlides imgBanner2" >
                                                                <img id="imgB3" src="" alt='previa-piezas' style="width:100%">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- The dots/circles -->
                                                        <div style="text-align:center">
                                                            <span class="dot" onclick="currentSlide(1)"></span>
                                                            <span class="dot" onclick="currentSlide(2)"></span>
                                                            <span class="dot" onclick="currentSlide(3)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-top: 5px; text-align:center;">
                                                    <b style="color:white;">Subir Imagen:</b>
                                                    <div class="row justify-content-center" >
                                                        <div class="form-group">
                                                            <input type="file" class="btn-secondary" id="imagenB1" name="imagenB1" accept= "image/*" >
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center" >
                                                        <div class="form-group">
                                                            <input type="file" class="btn-secondary" id="imagenB2" name="imagenB2" accept= "image/*" >
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center" >
                                                        <div class="form-group">
                                                            <input type="file" class="btn-secondary" id="imagenB3" name="imagenB3" accept= "image/*" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                  <!--<img src="../img/btnportada.png" alt="previa-piezas" width="300" height="300" style="border-style: solid; border-color: #febe10; border-width: 12px;"> -->
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                            <div class="col">
                                <div class="col" style="color: #ffffff;">
                                    <div class="form-group" >
                                        <label for="inicioB" class="col-form-label">Inicio:</label>
                                        <input disabled required type="date" class="form-control" id="inicioB" name="inicioB" style="background-color:transparent; color:white;">
                                        <label for="salidaB" class="col-form-label">Salida:</label>
                                        <input disabled required type="date" class="form-control" id="salidaB" name="salidaB" style="background-color:transparent; color:white;">
                                        <label for="horasB" class="col-form-label">Horas:</label>
                                        <input required type="text" class="form-control" id="horasB" name="horasB" style="background-color:transparent; color:white;">

                                        <input type="text" class="form-control" id="id_piezaB" name="id_piezaB" style="background-color:transparent; " hidden>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col" style="color: #ffffff;">
                                    <div class="form-group" >
                                        <label for="recursosB" class="col-form-label">Recursos:</label>
                                        <input required type="text" class="form-control" id="recursosB" name="recursosB" style="background-color:transparent; color:white;">
                                        <label for="cambiosB" class="col-form-label">Cambios:</label>
                                        <input required type="text" class="form-control" id="cambiosB" name="cambiosB" style="background-color:transparent; color:white;">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarVistaPreviaB">Guardar</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- Tabla Previa Piezas -->
                <div class="row justify-content-center">
                    <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarB" onclick="">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- obtener id de la pieza -->
<script>
    var botones = document.getElementsByClassName('previa_pieza_odt');
    
    for(var i = 0; i < botones.length; i++){
        botones[i].addEventListener('click', capturar_vpo);
    }
    function capturar_vpo(){
        
        console.log(this.id);
        var nombre_proyecto_vpo = this.id;
        var no_vista = <?php echo json_encode($no_existe_vista);?>;
        if(no_vista != 0){
            $("#id_piezaO").val(nombre_proyecto_vpo);
            $("#tabla tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();
                //alert(f_fin);
                $("#inicioO").val(odt_ini);
                $("#salidaO").val(f_fin);

            });
            no_vista = 1;
            CargarModal_vpo();

        } else{
            $("#id_piezaO").val(nombre_proyecto_vpo);
            $("#tabla tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();
                //alert(f_fin);
                $("#inicioO").val(odt_ini);
                $("#salidaO").val(f_fin);

            });

            CargarModal_vpo();
        }
    }
    function CargarModal_vpo(){
        $( document ).ready(function() {
            $('#previa_pieza_o').modal('toggle')
        });
    }

</script>

<!-- obtener id de la pieza -->
<script>
    var botones = document.getElementsByClassName('previa_pieza_brief');
    for(var i = 0; i < botones.length; i++){
        botones[i].addEventListener('click', capturar_vp);
    }
    function capturar_vp(){
        console.log(this.id);
        var nombre_proyecto_vp = this.id;

        var no_vista = <?php echo json_encode($no_existe_vista);?>;
        if(no_vista != 0){
            $("#id_piezaB").val(nombre_proyecto_vp);
            $("#tablab tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();
                //alert(f_fin);
                $("#inicioB").val(odt_ini);
                $("#salidaB").val(f_fin);

            });
            no_vista = 1;
            CargarModal_vp();

        } else{
            $("#id_piezaB").val(nombre_proyecto_vp);
            $("#tablab tbody tr").on("click", function(event){
                var f_ini = $(this).find("td:eq(2)").html();
                var odt_ini = f_ini.slice(0, -9);
                var f_fin = $(this).find("td:eq(3)").html();
                //alert(f_fin);
                $("#inicioB").val(odt_ini);
                $("#salidaB").val(f_fin);

            });

            CargarModal_vp();
        }
    }
    function CargarModal_vp(){
        $( document ).ready(function() {
            $('#previa_pieza_b').modal('toggle')
        });
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#cerrarB').click(function (e) {
            location.reload();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cerrarO').click(function (e) {
            location.reload();
        });
    });
</script>

<script>
    function form_actualizar_previaB(datos,datos1){
        //alert(datos);
        d1=datos1.split('||');
        $('#LabelProyectoB').html(d1[0]);
        $('#LabelPiezaB').html(d1[1]); 
        

        if(datos == "../img/btnportada.png"){
            $("#imgB1").attr("src",datos);
            $("#imgB2").attr("src",datos);
            $("#imgB3").attr("src",datos);
        } else{
            d=datos.split('||');
            tx= "<a title='Descargar Archivo' href='../img/vistaPrevia/"+d[9]+"' style='color: #FFC500;' download='"+d[9]+"'> <span class='glyphicon glyphicon-download-alt' aria-hidden='true'>"+d[9]+"</span> </a>";

            $('#LabelArchivoB').html(tx); 
            //var fF = d[3].slice(0, 10);
            $('#cambiosB').val(d[5]);
            $('#recursosB').val(d[4]);
            $('#horasB').val(d[3]);

            if(d[6]!=""){
                $("#imgB1").attr("src","../img/vistaPrevia/"+d[6]);
            } else{
                $("#imgB1").attr("src","../img/btnportada.png");
            }
            if(d[7]!=""){
                $("#imgB2").attr("src","../img/vistaPrevia/"+d[7]);
            } else{
                $("#imgB2").attr("src","../img/btnportada.png");
            }
            if(d[8]!=""){
                $("#imgB3").attr("src","../img/vistaPrevia/"+d[8]);
            } else{
                $("#imgB3").attr("src","../img/btnportada.png");
            }
        }
            
    }
</script>

<script>
    function form_actualizar_previa(datos,datos1){
        //alert(datos);
        d1=datos1.split('||');
        $('#LabelProyectoO').html(d1[0]);
        $('#LabelPiezaO').html(d1[1]); 
        

        if(datos == "../img/btnportada.png"){
            $("#imgO1").attr("src",datos);
            $("#imgO2").attr("src",datos);
            $("#imgO3").attr("src",datos);
        } else{
            d=datos.split('||');
            tx= "<a title='Descargar Archivo' href='../img/vistaPrevia/"+d[9]+"' style='color: #FFC500;' download='"+d[9]+"'> <span class='glyphicon glyphicon-download-alt' aria-hidden='true'>"+d[9]+"</span> </a>";

            $('#LabelArchivoO').html(tx); 
            //var fF = d[3].slice(0, 10);
            $('#cambiosO').val(d[5]);
            $('#recursosO').val(d[4]);
            $('#horasO').val(d[3]);

            if(d[6]!=""){
                $("#imgO1").attr("src","../img/vistaPrevia/"+d[6]);
            } else{
                $("#imgO1").attr("src","../img/btnportada.png");
            }
            if(d[7]!=""){
                $("#imgO2").attr("src","../img/vistaPrevia/"+d[7]);
            } else{
                $("#imgO2").attr("src","../img/btnportada.png");
            }
            if(d[8]!=""){
                $("#imgO3").attr("src","../img/vistaPrevia/"+d[8]);
            } else{
                $("#imgO3").attr("src","../img/btnportada.png");
            }
        }
            
    }
</script>
<script type="text/javascript">
 
    $(document).ready(function () {
        
        $('#guardarVistaPreviaB').click(function (e) {
            //alert("entre al ajax"); 
            id_pieza = $('#id_piezaB').val();
            horas = $('#horasB').val();
            cambios = $('#cambiosB').val();
            recursos = $('#recursosB').val(); 
            salida = $('#salidaB').val();

            e.preventDefault(); 
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('imagen1', $('#imagenB1')[0].files[0]);
            paqueteDeDatos.append('imagen2', $('#imagenB2')[0].files[0]);
            paqueteDeDatos.append('imagen3', $('#imagenB3')[0].files[0]);
            paqueteDeDatos.append('archivo', $('#archivoB')[0].files[0]);
            paqueteDeDatos.append('id_pieza', id_pieza);
            paqueteDeDatos.append('horas', horas);
            paqueteDeDatos.append('cambios', cambios);
            paqueteDeDatos.append('recursos', recursos);
            paqueteDeDatos.append('salida', salida);
           

            //alert("idP-"+id_pieza+" horas-"+horas+" cambios-"+cambios+" recursos-"+recursos+" salida-"+salida);
            $.ajax({
                type:"POST",
                url:"php/save_vistaPreviaB.php",
                data:paqueteDeDatos,
                contentType: false,
                processData: false,
                cache: false, 
                success:function(r){
                    //alert(r);
                    if(r==1){
                        alertify.success("Agregado con exito");
                        location.reload();
                    }else{
                        alertify.error("Fallo el servidor");
                        location.reload();
                    }
                }
            });
        });
    });
</script>

</script>
<script type="text/javascript">
 
    $(document).ready(function () {
        
        $('#guardarVistaPreviaO').click(function (e) {
            //alert("entre al ajax"); 
            id_pieza = $('#id_piezaO').val();
            horas = $('#horasO').val();
            cambios = $('#cambiosO').val();
            recursos = $('#recursosO').val(); 
            salida = $('#salidaO').val();

            e.preventDefault(); 
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('imagen1', $('#imagenO1')[0].files[0]);
            paqueteDeDatos.append('imagen2', $('#imagenO2')[0].files[0]);
            paqueteDeDatos.append('imagen3', $('#imagenO3')[0].files[0]);
            paqueteDeDatos.append('archivo', $('#archivoO')[0].files[0]);
            paqueteDeDatos.append('id_pieza', id_pieza);
            paqueteDeDatos.append('horas', horas);
            paqueteDeDatos.append('cambios', cambios);
            paqueteDeDatos.append('recursos', recursos);
            paqueteDeDatos.append('salida', salida);
           

            //alert("idP-"+id_pieza+" horas-"+horas+" cambios-"+cambios+" recursos-"+recursos+" salida-"+salida);
            $.ajax({
                type:"POST",
                url:"php/save_vistaPrevia.php",
                data:paqueteDeDatos,
                contentType: false,
                processData: false,
                cache: false, 
                success:function(r){
                    //alert(r);
                    if(r==1){
                        alertify.success("Agregado con exito");
                        location.reload();
                    }else{
                        alertify.error("Fallo el servidor");
                        location.reload();
                    }
                }
            });
        });
    });
</script>

<script>
            var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
</script>


<!-- Modal de visualizacion Previa Pieza BRIEF-->

<!-- Modal Formulario Proyectos -->
<!-- JQuery -->
<script src="../jquery/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="../popper/popper.min.js"></script>

<!-- Sweet Alert 2 JS -->
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- DataTables JS Custom -->
<script src="../datatables/custom.js"></script>

<!-- Bootstrap Table JS -->
<script type="text/javascript" src="../bootstrap/jquery-treegrid-master/js/jquery.treegrid.js"></script>
<script type="text/javascript">
    $('.tree').treegrid();
</script>

<!-- Custom JS -->
<script src="../js/codigo.js"></script>

</body>
</html>


