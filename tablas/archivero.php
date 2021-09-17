<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones_archivero.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>

    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sistema Follower Ezqualo">
	<meta name="author" content="Xavier Escamilla, Ivan Salazar">
	<meta http-equiv="cache-control" content="no-cache">
	
	<!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../img/favicon/favicon-128x128.png" sizes="128x128">
	
	<title>Follower</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/slide.css">
    <style type="text/css">
        a:hover{ background-color:#51575e; cursor: pointer;}
    </style>

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- Estilo CSS -->
	<link rel="stylesheet" href="../css/estilo.css">

	<!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

  <!-- DataTables Bootstrap -->
  <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.24/css/dataTables.bootstrap.min.css">
    
  <!-- DataTables Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../css/custom-tabla.css">

  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body id="fondo">
    <!-- Logo Vista y Boton Cerrar Sesión -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center">
				<img id="img-principal" src="../img/pantalla_catalogo.png" width="100%">
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
							<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;" onclick="cambioImgOdt()">
							<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
							<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_blanco.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_blanco.png'" style="height: 35px;">
							<div class="dropdown" style="border-radius: 8px;">
								<input type="image" onClick="parent.location='#'" src="../img/btncatalogos_amarillo.png" onMouseOver="this.src='../img/btncatalogos_amarillo.png'" onMouseOut="this.src='../img/btncatalogos_amarillo.png'" style="height: 35px;">
								<div class="dropdown-content" style="border-radius: 8px; border:2px solid #febe10;">
									<a href="../tablas/usuarios.php">Usuarios</a>
									<a href="../tablas/personal.php">Ezqualo</a>
									<a href="../tablas/vista_clientes.php">Clientes</a>
									<a href="../tablas/proveedor.php">Proveedores</a>
                                    					<a href="../tablas/archivero.php">Archivero</a>
								</div>
							</div>
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

	<!-- Tabla Usuarios -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center"><span>ARCHIVO MUERTO</span></h2>
        </div>
        <div class="row justify-content-center">
            <h2 class="text-center"><i class="fas fa-chevron-down" style="color: #febe10; font-size: 24px;"></i></h2>
        </div>

        
         <!-- Area Direccion -->
        <div class="row justify-content-center">
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Departamento</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                //Direccion
                $departamento="direccion";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoDireccion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    $json=json_encode($row);
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Dirección</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Cuentas -->
                <?php
                $departamento="cuentas";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoCuentas where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Cuentas</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Arte -->
                <?php
                $departamento="arte";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoArte where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Arte</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Ilustracion -->
                <?php
                $departamento="ilustracion";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoIlustracion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Ilustración</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Copy -->
                <?php
                $departamento="copy";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoCopyCorrecion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Copy y Corrección</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Estrategia -->
                <?php
                $departament="estrategia";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoEstrategia where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Estrategia</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Administracion -->
                <?php
                $departamento="administracion";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoAdministracion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Administración</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- PostProduccion -->
                <?php
                $departamento="postProduccion";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoPostProduccion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">Post-Producción</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
                <!-- Programacion -->
                <?php
                $departamento="programacion";
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoProgramacion where estatus LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||". $row[11]."||".$row[12]."||".$row[13]."||". $row[14]."||".$row[15]."||".$row[16]."||".$row[17]."||".$row[18]."||".$row[19]."||".$row[20]."||".$row[21]."||".$row[22]."||".$row[23]."||".$row[24];
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                ?>
                <td width=\"\"><font face=\"verdana\">Programación</font></td>
                <?php
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["correo"]."</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">".$row["estatus"]."</font></td>");
                ?>
                <td>
                    <button class="btn" onclick="darAlta('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>')">
                        <img src="../img/recovery.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo utf8_encode($row['id']); ?>','<?php echo utf8_encode($departamento);?>','<?php echo utf8_encode($datos);?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>
                <?php
                $contador++;
                }
                ?>
              </tbody>
            </table>
        </div>


<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Footer -->

  <!-- Mostrar Password JS -->
  <script>
      var state = false;
      function toggle(){
          if(state){
                document.getElementById("password").setAttribute("type","password");
                document.getElementById("eye");
                state = false;
          }else{
                document.getElementById("password").setAttribute("type","text");
                document.getElementById("eye");
                state = true;
          }
      }
  </script>

	<!-- JQuery -->
	<script src="../jquery/jquery-3.6.0.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<!-- Popper JS -->
	<script src="../popper/popper.min.js"></script>

	<!-- Sweet Alert 2 JS -->
	<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

	<!-- Custom JS -->
	<script src="../js/codigo.js"></script>

	<!-- Ionic Iconos -->
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>

<!-- Seccion para visualizar cada usuario //////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="visual_Personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"  role="document" >
        <div class="modal-content" style="background-color:black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ezqualo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" align="center">
                        <image src="../img/recursos_header.png" style="width:40% ;"><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <image src="../img/barra_amarilla.png" class="barra_amarilla" style="height: 35px;"><br>
                </div>
                <br>
                <div class="col">
                    <div class="form-group ">
                        <div class="slideshow-container ">
                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides imgBanner" >
                                <img id="img1" src="" style="width:100%" >
                            </div>

                            <div class="mySlides imgBanner" >
                                <img id="img2" src="" style="width:100%" >
                            </div>

                            <div class="mySlides imgBanner" >
                                <img id="img3" src="" style="width:100%">
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
            <div class="row">
                <div class="col" >
                    <div class="form-group" ng-app="myApp" ng-controller="MyController">
                        <label class="col-form-label txt" id="LabelNombre" ></label><br>
                        <label class="col-form-label txt" id="LabelPuesto" ></label><br>
                        <label class="col-form-label txt" id="LabelStatus" ></label><br>
                        <label class="col-form-label txt" id="LabelCorreo" ></label><br>
                        <label class="col-form-label txt" id="LabelCorreo1" ></label><br>
                        <label class="col-form-label txt" id="LabelRedes" ></label><br>
                        <label class="col-form-label txt" id="LabelTel" ></label><br>
                        <label class="col-form-label txt" id="LabelTel1" ></label><br>
                        <label class="col-form-label txt" id="LabelDireccion" ></label><br>
                        <label class="col-form-label txt" id="LabelDireccionAlt" ></label><br>
                    </div>
                </div>
                <div class="col" >
                    <div class="form-group" ng-app="myApp" ng-controller="MyController">
                        <br><br><br>
                        <label class="col-form-label txt" id="LabelVigencia" ></label><br>
                        <label class="col-form-label txt" id="LabelVacaciones" ></label><br>
                        <label class="col-form-label txt" id="LabelVacacionesUsadas" ></label><br>
                        <label class="col-form-label txt" id="LabelSangre" ></label><br>
                        <label class="col-form-label txt" id="LabelAlergias" ></label><br>
                        <label class="col-form-label txt" id="LabelMedicamentos" ></label><br>
                        <label class="col-form-label txt" id="LabelPadecimientos" ></label><br>
                        
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group" ng-app="myApp" ng-controller="MyController">
                    <label class="col-form-label txt" id="LabelArchivos" ></label><br>
                </div>
            </div>
                <div class="row justify-content-center">
                    
                    <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn" onclick="">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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


    </script>
<script>

    //funcion para quitar acentos
    const removeAccents = (str) => {
  		return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
	} 

    function mostrarPersonal(datos){
        d=datos.split('||');
        //console.error(datos);
        //obtener link de direccion
        //cadena = removeAccents(d[7]);
        cadena = d[8];
        cadena= cadena.replace(/ /g, "+");
        linkdireccion="https://www.google.com.mx/maps/place/"+cadena;
        if(d[23]==""){
            linkdireccionA="#";
            linkA="<a id='ubi' ><img src='../img/polaroid_icono.png' alt='icono_polaroid'></a>";
        }else{
            linkdireccionA="../img/ezqualo/"+d[23];
            linkA= "<a id='ubi' href='"+linkdireccionA+"' target='_blank'><img src='../img/polaroid_icono.png' alt='icono_polaroid'></a>";
        }
        
        link1="<a id='ubi' href='"+linkdireccion+"' target='_blank'> <ion-icon name='pin' style='pointer-events:none; width: 20px; height: 20px; color: #fdbe0f;'></ion-icon> </a> ";
        cadena = removeAccents(d[9]);
        cadena= cadena.replace(/ /g, "+");
        linkdireccion="https://www.google.com.mx/maps/place/"+cadena;
        if(d[24]==""){
            linkdireccionB="#";
            linkB="<a id='ubi' ><img src='../img/polaroid_icono.png' alt='icono_polaroid'></a>";

        }else{
            linkdireccionB="../img/ezqualo/"+d[24];        
            linkB="<a id='ubi' href='"+linkdireccionB+"' target='_blank'><img src='../img/polaroid_icono.png' alt='icono_polaroid'></a>";

        }
        
        link2="<a id='ubi' href='"+linkdireccion+"' target='_blank'> <ion-icon name='pin' style='pointer-events:none; width: 20px; height: 20px; color: #fdbe0f;'></ion-icon> </a>";


        if(d[18]!=""){
            $("#img1").attr("src","../img/ezqualo/"+d[18]);
        }else{
            $("#img1").attr("src","../img/ezqualo/profile.png");
        }
        if(d[19]!=""){
            $("#img2").attr("src","../img/ezqualo/"+d[19]);
        }else{
            $("#img2").attr("src","../img/ezqualo/profile.png");
        }
        if(d[20]!=""){
            $("#img3").attr("src","../img/ezqualo/"+d[20]);
        }else{
            $("#img3").attr("src","../img/ezqualo/profile.png");
        }
        tx= "<a title='Descargar Archivo' href='../img/ezqualo/"+d[17]+"' style='color: #FFC500;' download='"+d[17]+"'> <span class='glyphicon glyphicon-download-alt' aria-hidden='true'>"+d[17]+"</span> </a>";
        //alert(tx);
        $('#LabelNombre').html("<b>"+d[1]+" "+d[2]+"</b>");
        $('#LabelStatus').html("Status: "+d[21]);
        $('#LabelPuesto').html("&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;"+d[3]);  
        $('#LabelCorreo').html("Correo: "+d[4]); 
        $('#LabelCorreo1').html("Correo Alterno: "+d[5]);
        $('#LabelTel').html("Teléfono: "+d[6]);
        $('#LabelTel1').html("Contacto de Emergencia: "+d[7]);
        $('#LabelDireccion').html("Dirección 1: "+d[8]+" "+link1+" "+linkA);
        $('#LabelDireccionAlt').html("Dirección 2: "+d[9]+" "+link2+" "+linkB);
        $('#LabelRedes').html("Redes Sociales: <br>"+d[22]);
        $('#LabelVigencia').html("Vigencia en la Empresa: "+d[10]); 
        $('#LabelVacaciones').html("Dias de Vacaciones: "+d[11]);
        $('#LabelVacacionesUsadas').html("Dias de Vac. Usados: "+d[12]);
        $('#LabelSangre').html("Tipo de Sangre: "+d[13]); 
        $('#LabelAlergias').html("Alergias: "+d[14]);
        $('#LabelMedicamentos').html("Medicamentos: "+d[15]);
        $('#LabelPadecimientos').html("Padecimientos: "+d[16]);
        $('#LabelArchivos').html("Expediente: "+tx);    
        
    }
</script> 
<script>
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>


