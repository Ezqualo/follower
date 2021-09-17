<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/estilo.css">
    
    <link rel="stylesheet" href="../css/semaforo.css">

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
    
    <!-- Ionic Iconos -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="../js/funciones_piezas.js"></script>

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

<!-- Tabla ODTS -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
    <h1 class="text-center"><span class="">ODTS</span></h1>
        <table class="table table-striped table-dark tree">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <!-- <th scope="col">Añadir Pieza</th> -->
                <th scope="col"></th>
                <th scope="col">Inicio</th>
                <th scope="col">Salida</th>
                <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                <th scope="col"><ion-icon name="chatboxes" size="large"></ion-icon></th>
                <th scope="col">Semáforo</th>
                <th scope="col">Archivo</th>
            </tr>
            </thead>
            <tbody>
            <!-- Fila 1 -->
            <?php
            $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
            //$mysqli = new mysqli('localhost','root','password','ezqualof_follower');
            
            $sql=$mysqli -> query("SELECT id,idOdt, proyecto, fechaSolicitud, fechaEntrega, archivo FROM odts WHERE mail_cliente = '$userlogin'");
            //$sql_comments=$mysqli -> query("SELECT * FROM messages WHERE ");

            //$resultado=mysqli_query($con,$sql);
            $num_projects = mysqli_num_rows($sql);
            $cont1 = 1;
            $add_pieza = 1;
            while($columnas=mysqli_fetch_array($sql)) {
                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                echo utf8_encode('<td><u style="color:white; font-size:20px"><b>'.$columnas[proyecto].'</b></u></td>');
                echo "<td></td>";
                //echo '<td><a href="" data-toggle="modal" id="' . $columnas[proyecto] . '" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></td>';
                echo "<td>$columnas[fechaSolicitud]</td>";
                echo "<td>$columnas[fechaEntrega]</td>";
                echo '<td><a href="../tablas/tt_clientes.php?nom_proy=' . $columnas[proyecto] . '&tabla=odt&id='.$columnas[id].'" class="class_coment" style="color: orange; font-size: 25px;" >;</a></td>';
                echo '<td><a href="../vistas/comentarios_clientes.php?nom_proy=' . $columnas[proyecto] . '"style="color: orange; font-size: 20px;">Chat</a></td>';
                
                $sql_semaforo = $mysqli -> query("SELECT semaforo FROM odts WHERE idOdt = '$columnas[idOdt]'");
                while($colores_semaforo = mysqli_fetch_array($sql_semaforo)) {
                    $color_semaforo = $colores_semaforo[semaforo];
                }
                
               echo '<td> 
                        <div class="radio-item">';
                            if( $color_semaforo=="#FFC500" ){

                                echo '<input  type="radio" id="InicioO'.$columnas[id].'" name="droneO'.$columnas[id].'" checked value="#FFC500" disabled>';
                            }else{
                                echo '<input  type="radio" id="InicioO'.$columnas[id].'" name="droneO'.$columnas[id].'" value="#FFC500" disabled>';
                            }
                            echo '<label id="iniciolabel" for="InicioO'.$columnas[id].'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo=="#1CB707"){
                                echo '<input  type="radio" id="EnviadoO'.$columnas[id].'" name="droneO'.$columnas[id].'" checked value="#1CB707" disabled>';
                            }else{
                                echo '<input  type="radio" id="EnviadoO'.$columnas[id].'" name="droneO'.$columnas[id].'" value="#1CB707" disabled>';
                            }

                            echo '<label id="enviadolabel" for="EnviadoO'.$columnas[id].'"></label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                        if($color_semaforo=="#FF0C00"){
                            echo '<input  type="radio" id="PausadoO'.$columnas[id].'" name="droneO'.$columnas[id].'" checked value="#FF0C00" disabled>';
                        }else{
                            echo '<input type="radio" id="PausadoO'.$columnas[id].'" name="droneO'.$columnas[id].'" value="#FF0C00" disabled>';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoO'.$columnas[id].'"></label>
                        </div>';
                        
                        echo '<div class="radio-item">';
                            if($color_semaforo=="#6900D1"){
                                echo '<input  type="radio" id="CerradoO'.$columnas[id].'" name="droneO'.$columnas[id].'" checked value="#6900D1" disabled>';
                            }else{
                                echo '<input  type="radio" id="CerradoO'.$columnas[id].'" name="droneO'.$columnas[id].'" value="#6900D1" disabled>';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoO'.$columnas[id].'"></label>
                        </div>
                        

                    </td>';
                    
                echo '<td>';
                $archivos=$columnas[archivo];
                $jsonNew=json_decode($archivos, true);
                    foreach($jsonNew as $i => $value){
                        echo '<a title="Descargar Archivo" href="../uploads/'.$jsonNew[$i].'" download="'.$jsonNew[$i].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$jsonNew[$i].'</span> </a><br>';
                    } echo "</td>";
                echo "</tr>";

                $var2 = $cont1 + 1;
                $nom_proy = $columnas[id];
                $sql_piezas=$mysqli -> query("SELECT piezas.id, piezas.nombre, piezas.fechaInicio, piezas.fechaSalida FROM piezas inner join odts on piezas.idPieza = odts.id AND odts.id = '$nom_proy'");
                while($piezas=mysqli_fetch_array($sql_piezas)) {
                    // if($contador2 == 2){
                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                    echo utf8_encode('<td style="color:#D8D8D8; font-size:18px;">'.$piezas[nombre].'</td>');
                    echo "<td></td>";
                    echo '<td style="color:#D8D8D8; font-size:18px;">'.$piezas[fechaInicio].'</td>';
                    echo '<td style="color:#D8D8D8; font-size:18px;">'.$piezas[fechaSalida].'</td>';
                    echo "<td></td>";
                    echo "<td></td>";

                    $sql_semaforo_piezas = $mysqli -> query("SELECT id,semaforo FROM piezas WHERE id = '$piezas[id]' AND nombre = '$piezas[nombre]'");
                    while($colores_semaforo_piezas = mysqli_fetch_array($sql_semaforo_piezas)) {
                        $color_semaforo_piezas = $colores_semaforo_piezas[semaforo];
                    
                    }
                    
            
                    
                //codigo para semaforo por medio de radio buttons
                echo '<td> 
                        <div class="radio-item">';
                            if( $color_semaforo_piezas=="#FFC500" ){

                                echo '<input  type="radio" id="InicioPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" checked value="#FFC500" disabled>';
                            }else{
                                echo '<input  type="radio" id="InicioPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" value="#FFC500" disabled>';
                            }
                            echo '<label id="iniciolabel" for="InicioPO'.$piezas[id].'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_piezas=="#1CB707"){
                                echo '<input  type="radio" id="EnviadoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" checked value="#1CB707" disabled>';
                            }else{
                                echo '<input  type="radio" id="EnviadoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" value="#1CB707" disabled>';
                            }

                            echo '<label id="enviadolabel" for="EnviadoPO'.$piezas[id].'"></label>
                        </div>';
                        echo '<div class="radio-item">';
                        if($color_semaforo_piezas=="#FF0C00"){
                            echo '<input  type="radio" id="PausadoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" checked value="#FF0C00" disabled>';
                        }else{
                            echo '<input type="radio" id="PausadoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" value="#FF0C00" disabled>';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoPO'.$piezas[id].'"></label>
                        </div>';
                        echo '<div class="radio-item">';
                            if($color_semaforo_piezas=="#6900D1"){
                                echo '<input  type="radio" id="CerradoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" checked value="#6900D1" disabled>';
                            }else{
                                echo '<input  type="radio" id="CerradoPO'.$piezas[id].'" name="dronePO'.$piezas[id].'" value="#6900D1" disabled>';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoPO'.$piezas[id].'"></label>
                        </div>

                    </td>';
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
                        echo "</tr>";

                    }
                    $var2 = $var3 + 1;
                }
                $cont1 = $var2 + 1;
            }

            ?>
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

            </tbody>
        </table>
    </div>
</div>
<!-- Fin Tabla -->


<!-- Tabla BRIEF -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
    <h1 class="text-center"><span class="">BRIEFS</span></h1>
        <table class="table table-striped table-dark tree">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <!-- <th scope="col">Añadir Pieza</th> -->
                <th scope="col"></th>
                <th scope="col">Inicio</th>
                <th scope="col">Salida</th>
                <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                <th scope="col"><ion-icon name="chatboxes" size="large"></ion-icon></th>
                <th scope="col">Semáforo</th>
                <th scope="col">Archivo</th>
            </tr>
            </thead>
            <tbody>
            <!-- Fila 1 -->
            <?php
            $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
            //$mysqli = new mysqli('localhost','root','password','ezqualof_follower');
            
            $sql=$mysqli -> query("SELECT id, nombre, fechaEntrega, fechaSalida, archivo FROM briefs WHERE mail_cliente = '$userlogin' OR ejecutiva = '$userlogin'");
            //$sql_comments=$mysqli -> query("SELECT * FROM messages WHERE ");

            //$resultado=mysqli_query($con,$sql);
            $num_projects = mysqli_num_rows($sql);
            $cont1 = 1;
            $add_pieza = 1;
            while($columnas=mysqli_fetch_array($sql)) {
                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                echo utf8_encode('<td><u style="color:white; font-size:20px"><b>'.$columnas[nombre].'</b></u></td>');
                echo "<td></td>";
                //echo '<td><a href="" data-toggle="modal" id="' . $columnas[proyecto] . '" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></td>';
                echo "<td>$columnas[fechaEntrega]</td>";
                echo "<td>$columnas[fechaSalida]</td>";
                echo '<td><a href="../tablas/tt_clientes_briefs.php?nom_proy=' . $columnas[nombre] . '&tabla=brief&id='.$columnas[id].'" class="class_coment" style="color: orange; font-size: 25px;" >;</a></td>';                
                echo '<td><a href="../vistas/comentarios_b_clientes.php?nom_proy=' . $columnas[nombre] . '"style="color: orange; font-size: 20px;">Chat</a></td>';
                
                $sql_semaforo_b = $mysqli -> query("SELECT semaforo FROM briefs WHERE id = '$columnas[id]' AND nombre = '$columnas[nombre]'");
                while($colores_semaforo_b = mysqli_fetch_array($sql_semaforo_b)) {
                    $color_semaforo_b = $colores_semaforo_b[semaforo];
                }
                echo '<td> 
                        <div class="radio-item">';
                            if( $color_semaforo_b=="#FFC500" ){

                                echo '<input  type="radio" id="InicioB'.$columnas[id].'" name="droneB'.$columnas[id].'" checked value="#FFC500" disabled>';
                            }else{
                                echo '<input  type="radio" id="InicioB'.$columnas[id].'" name="droneB'.$columnas[id].'" value="#FFC500" disabled>';
                            }
                            echo '<label id="iniciolabel" for="InicioB'.$columnas[id].'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_b=="#1CB707"){
                                echo '<input  type="radio" id="EnviadoB'.$columnas[id].'" name="droneB'.$columnas[id].'" checked value="#1CB707" disabled>';
                            }else{
                                echo '<input  type="radio" id="EnviadoB'.$columnas[id].'" name="droneB'.$columnas[id].'" value="#1CB707" disabled>';
                            }

                            echo '<label id="enviadolabel" for="EnviadoB'.$columnas[id].'"></label>
                        </div>';
                         echo '<div class="radio-item">';
                        if($color_semaforo_b=="#FF0C00"){
                            echo '<input  type="radio" id="PausadoB'.$columnas[id].'" name="droneB'.$columnas[id].'" checked value="#FF0C00" disabled>';
                        }else{
                            echo '<input type="radio" id="PausadoB'.$columnas[id].'" name="droneB'.$columnas[id].'" value="#FF0C00" disabled>';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoB'.$columnas[id].'"></label>
                        </div>';
                        echo '<div class="radio-item">';
                            if($color_semaforo_b=="#6900D1"){
                                echo '<input  type="radio" id="CerradoB'.$columnas[id].'" name="droneB'.$columnas[id].'" checked value="#6900D1" disabled>';
                            }else{
                                echo '<input  type="radio" id="CerradoB'.$columnas[id].'" name="droneB'.$columnas[id].'" value="#6900D1" disabled>';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoB'.$columnas[id].'"></label>
                        </div>
                        

                    </td>';
                echo '<td>';
                $archivos=$columnas[archivo];
                $jsonNew=json_decode($archivos, true);
                    foreach($jsonNew as $i => $value){
                        echo '<a title="Descargar Archivo" href="../uploads/'.$jsonNew[$i].'" download="'.$jsonNew[$i].'" style="color: #FFC500; font-size:14px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true">'.$jsonNew[$i].'</span> </a><br>';
                    } echo "</td>";
                echo "</tr>";

                $var2 = $cont1 + 1;
                $nom_proy = $columnas[nombre];
                $sql_piezas=$mysqli -> query("SELECT piezasBrief.id,piezasBrief.semaforo ,piezasBrief.nombre, piezasBrief.fechaInicio, piezasBrief.fechaSalida FROM piezasBrief inner join briefs on piezasBrief.idPieza = briefs.id AND briefs.nombre = '$nom_proy'");
                while($piezas=mysqli_fetch_array($sql_piezas)) {
                    // if($contador2 == 2){
                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                    $color_semaforo_pb=$piezas[semaforo];
                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                    
                    echo '<td style="color:#D8D8D8; font-size:18px;">'.$piezas[nombre].'</td>';
                    echo "<td></td>";
                    echo '<td style="color:#D8D8D8; font-size:18px;">'.$piezas[fechaInicio].'</td>';
                    echo '<td style="color:#D8D8D8; font-size:18px;">'.$piezas[fechaSalida].'</td>';
                    echo "<td></td>";
                    echo "<td></td>";
                    echo '<td> 
                        <div class="radio-item">';
                            if( $color_semaforo_pb=="#FFC500" ){

                                echo '<input  type="radio" id="InicioPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" checked value="#FFC500" disabled>';
                            }else{
                                echo '<input  type="radio" id="InicioPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" value="#FFC500" disabled>';
                            }
                            echo '<label id="iniciolabel" for="InicioPB'.$piezas[id].'"></label>
                        </div>
                        <div class="radio-item">';
                            if($color_semaforo_pb=="#1CB707"){
                                echo '<input  type="radio" id="EnviadoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" checked value="#1CB707" disabled>';
                            }else{
                                echo '<input  type="radio" id="EnviadoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" value="#1CB707" disabled>';
                            }

                            echo '<label id="enviadolabel" for="EnviadoPB'.$piezas[id].'"></label>
                        </div>';
                        echo '<div class="radio-item">';
                        if($color_semaforo_pb=="#FF0C00"){
                            echo '<input  type="radio" id="PausadoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" checked value="#FF0C00" disabled>';
                        }else{
                            echo '<input type="radio" id="PausadoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" value="#FF0C00" disabled>';
                        }
                        
                        echo '<label id="pausadolabel" for="PausadoPB'.$piezas[id].'"></label>
                        </div>';
                        echo '<div class="radio-item">';
                            if($color_semaforo_pb=="#6900D1"){
                                echo '<input  type="radio" id="CerradoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" checked value="#6900D1" disabled>';
                            }else{
                                echo '<input  type="radio" id="CerradoPB'.$piezas[id].'" name="dronePB'.$piezas[id].'" value="#6900D1" disabled>';
                            }
                            
                            echo '<label id="cerradolabel" for="CerradoPB'.$piezas[id].'"></label>
                        </div>
                        

                    </td>';
                    echo "<td></td>";
                    echo "</tr>";

                    $nom_piezas = $piezas[id];
                    $var3 = $var2 + 1;
                    $sql_caracteristicas = $mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezasBrief WHERE id = '$nom_piezas'");
                    while($piezas2=mysqli_fetch_array($sql_caracteristicas)) {
                        // if($contador2 == 2){
                        //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo '<td style="color:#A0A0A0;">Características:</td><td style="color:#A0A0A0;">'.$piezas2[caracteristicas].'</td>';
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
                        echo "</tr>";

                    }
                    $var2 = $var3 + 1;
                }
                $cont1 = $var2 + 1;
            }

            ?>
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

            </tbody>
        </table>
    </div>
</div>
<!-- Fin Tabla -->

<!-- Footer -->
<footer class="position-sticky">
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Fin Footer -->

<!-- obtener id del proyecto -->
<script>
    var botones = document.getElementsByClassName('add_pieza');
    for(var i = 0; i < botones.length; i++){
        botones[i].addEventListener('click', capturar);
    }
    function capturar(){
        console.log(this.id);
        var nombre_proyecto = this.id;
        //alert(nombre_proyecto);
        //document.cookie = "cookie_odt="+ encodeURIComponent( "" );
        history.pushState(null, "", "?project="+nombre_proyecto+"");
        //document.cookie = "cookie_odt="+ encodeURIComponent( nombre_proyecto );
        $("#nom_proyecto").val(nombre_proyecto);
        //location.href = document.getElementById("exampleModal");
        //location.reload();
        CargarModal();
    }
    function CargarModal(){
        $( document ).ready(function() {
            $('#exampleModal').modal('toggle')
        });
    }
</script>



<!-- obtener nombre del proyecto con class_coment
<script type="text/javascript">
    function Cargar(){
        $("table tbody tr").click(function() {
            var total = $(this).find("td:eq(0)").text();
            alert(total);
            $.ajax({
                type: "POST",
                url:"../vistas/tabla_tiempos.php",
                data:{total:total},
                success: function(datos){
                    $('#contenido').html(datos);
                }
            });
        });
    }
</script>-->


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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas" class="col-form-label">Caracteristicas:</label>
                                <input type="text" class="form-control" id="caracteristicas" name="caracteristicas">
                            </div>
                            <div class="form-group">
                                <label for="medidas" class="col-form-label">Medidas:</label>
                                <input type="text" class="form-control" id="medidas" name="medidas">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio" class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control"  id="fechaInicio" name="fechaInicio" value="dd-mm-yyyy" min="{{ startDate | date:'yyyy-MM-dd' }}" max="{{ maxDate() | date:'yyyy-MM-dd' }}">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                                <input type="date" class="form-control"  id="fechaSalida" name="fechaSalida" value="dd-mm-yyyy">
                            </div>
                            <div class="form-group" hidden>
                                <label for="nom_proyecto" class="col-form-label"></label>
                                <input type="text" class="form-control"  id="nom_proyecto" name="nom_proyecto" class="nom_proyecto">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Añadir Pieza">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_pieza" onclick="location.reload()">Cerrar</button>
                            <?php
                                if (isset($_POST['submit'])){
                                    include ('../bd/save_pieza.php');
                                }
                            ?>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Pieza</button>-->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Asignar rango a las fechas de piezas -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $('.add_pieza').on('click', function (e){
            e.preventDefault();
            //alert("hola");
            $('#name').focusout(function() {
                //var proyecto_modal = $('#nom_proyecto').val();
                fechas();

                function fechas() {
                    <?php
                    //$url = $_COOKIE["cookie_odt"];
                    //$url = $_SERVER['QUERY_STRING'];
                    $url_act = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                    $url = $_GET['project'];
                    $variable_url = $url;
                    $sql_odts = $mysqli -> query("SELECT proyecto, fechaSolicitud, fechaEntrega FROM odts WHERE proyecto = '$variable_url'");
                    while($datos = mysqli_fetch_array($sql_odts)) {
                        $lista_odts[] = $datos[proyecto];
                        $fec_ini_odt = $datos[fechaSolicitud];
                        $fec_fin_odt = $datos[fechaEntrega];
                    }
                    ?>

                    var all_odts = <?php echo json_encode($lista_odts);?>;
                    var fech_inicio = <?php echo json_encode($fec_ini_odt);?>;
                    var fech_final = <?php echo json_encode($fec_fin_odt);?>;
                    var url = <?php echo json_encode($url_act);?>;
                    //var odt_ini = fech_inicio.slice(0, -9);
                    //var odt_fin = fech_final.slice(0, -9);
                    //alert(url);
                    /*document.getElementById("fechaSalida").min = "2021-05-10";
                    document.getElementById("fechaSalida").min = "2021-05-10";
                    document.getElementById("fechaSalida").max = "2021-05-15";
                    document.getElementById("fechaInicio").min = "2021-05-10";
                    document.getElementById("fechaInicio").max = "2021-05-15";*/
                }
            });

        })
    })

</script>


<script type="text/javascript">
    Cookies.remove('nombre');
</script>

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

