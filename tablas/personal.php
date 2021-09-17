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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones_personal.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
            <h2 class="text-center"><span>ÁREAS EZQUALO</span></h2>
        </div>
        <div class="row justify-content-center">
            <h2 class="text-center"><i class="fas fa-chevron-down" style="color: #febe10; font-size: 24px;"></i></h2>
        </div>

        
         <!-- Area Direccion -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span>DIRECCIÓN</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#DireccionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoDireccion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionDireccion" onclick="form_actualizar_Direccion('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoDireccion('<?php echo $row["id"] ?>')">
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

        <!-- Area Cuentas -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span>CUENTAS</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#cuentasModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoCuentas where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionCuentas" onclick="form_actualizar_Cuentas('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoCuentas('<?php echo $row["id"] ?>')">
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
         <!-- Area Arte -->

         <div class="row justify-content-center">
            <h5 class="text-center"><span>ARTE</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#ArteModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoArte where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionArte" onclick="form_actualizar_Arte('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoArte('<?php echo $row[0] ?>')">
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
         <!-- Area Ilustracion -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span>ILUSTRACIÓN</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#IlustracionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoIlustracion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionIlustracion" onclick="form_actualizar_Ilustracion('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoIlustracion('<?php echo $row["id"] ?>')">
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

         <!-- Area Copy -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span>COPY Y CORRECCIÓN DE ESTILO</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#CopyModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoCopyCorreccion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionCopy" onclick="form_actualizar_Copy('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoCopy('<?php echo $row["id"] ?>')">
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

         <!-- Area Estrategia-->
        <div class="row justify-content-center">
            <h5 class="text-center"><span>ESTRATEGÍA</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#EstrategiaModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoEstrategia where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionEstrategia" onclick="form_actualizar_Estrategia('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoEstrategia('<?php echo $row['id'] ?>')">
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

        <!-- Area Administracion -->
        <div class="row justify-content-center">
                    <h5 class="text-center"><span>ADMINISTRACIÓN</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#AdministracionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoAdministracion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionAdministracion" onclick="form_actualizar_Administracion('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoAdministracion('<?php echo $row["id"] ?>')">
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

        <!-- Area Post-->
 <div class="row justify-content-center">
            <h5 class="text-center"><span>POST-PRODUCCIÓN</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#PostModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoPostProduccion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionPost" onclick="form_actualizar_Post('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoPost('<?php echo $row["id"] ?>')">
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

        <!-- Area 7 -->
         <!-- Area Programacion-->
 <div class="row justify-content-center">
            <h5 class="text-center"><span>PROGRAMACIÓN</span></h5>
        </div>
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"><a href="#ProgramacionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');
                $contador=1;
                $query = $mysqli -> query ("SELECT DISTINCT * FROM equipoProgramacion where estatus NOT LIKE 'Baja' ORDER BY apellido ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {

                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5]."||".
                                $row[6]."||".
                                $row[7]."||".
                                $row[8]."||".
                                $row[9]."||".
                                $row[10]."||".
                                $row[11]."||".
                                $row[12]."||".
                                $row[13]."||".
                                $row[14]."||".
                                $row[15]."||".
                                $row[16]."||".
                                $row[17]."||".
                                $row[18]."||".
                                $row[19]."||".
                                $row[20]."||".
                                $row[21]."||".
                                $row[22]."||".
                                $row[23]."||".
                                $row[24];
                    
                    
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                // -----------------------------------------------------------------------------------------
                            echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_Personal" onclick="mostrarPersonal('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode("".$row["apellido"]." ".$row["nombre"]."</a></font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicionProgramacion" onclick="form_actualizar_Programacion('<?php echo utf8_encode($datos); ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoProgramacion('<?php echo $row["id"] ?>')">
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
    </div>
    <!-- Tabla Usuarios -->

<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Footer -->

<!-- Modal Formulario  Agregar Direccion -->
<div class="modal fade" id="DireccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Dirección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Direccion" name="" hidden>
                                <label for="nombreDireccion" class="col-form-label">Nombre:</label>
                                <input required type="text" class="form-control" id="nombreDireccion" name="nombreDireccion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoDireccion" class="col-form-label">Apellido:</label>
                                <input required type="text" class="form-control" id="apellidoDireccion" name="apellidoDireccion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoDireccion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoDireccion" name="puestoDireccion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusDireccion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusDireccion" name="estatusDireccion">
                                <option selected disabled>Status</option>
                                <option value="Dirección">Dirección</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailDireccion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailDireccion" name="mailDireccion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltDireccion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltDireccion" name="mailaltDireccion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesDireccion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesDireccion" name="redesDireccion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoDireccion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoDireccion" name="telefonoDireccion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltDireccion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltDireccion" name="telefonoAltDireccion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionDireccion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionDireccion" name="direccionDireccion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltDireccion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltDireccion" name="direccionAltDireccion" placeholder="Dirección 2">
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaDireccion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaDireccion" name="vigenciaDireccion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesDireccion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesDireccion" name="vacacionesDireccion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosDireccion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosDireccion" name="vacacionesUsadosDireccion" placeholder="Dias de Vacaciones Usados">
                            </div>
                            <div class="form-group">
                                <label for="tipoDireccion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoDireccion" name="tipoDireccion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasDireccion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasDireccion" name="alergiasDireccion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosDireccion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosDireccion" name="medicamentosDireccion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosDireccion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosDireccion" name="padecimientosDireccion" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Direccion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Direccion" name="foto1Direccion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Direccion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Direccion" name="foto2Direccion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Direccion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Direccion" name="foto3Direccion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirDireccion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirDireccion" name="fotoDirDireccion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltDireccion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltDireccion" name="fotoDirAltDireccion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoDireccion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoDireccion" name="archivoDireccion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Direccion">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Direccion -->

<!-- Modal Formulario Edit Direccion -->
<div class="modal fade" id="modalEdicionDireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Direccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_DireccionEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreDireccionEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreDireccionEdicion" name="nombreDireccionEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoDireccionEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoDireccionEdicion" name="apellidoDireccionEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoDireccionEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoDireccionEdicion" name="puestoDireccionEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusDireccionEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusDireccionEdicion" name="estatusDireccionEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Dirección">Dirección</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailDireccionEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailDireccionEdicion" name="mailDireccionEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltDireccionEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltDireccionEdicion" name="mailaltDireccionEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesDireccionEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesDireccionEdicion" name="redesDireccionEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoDireccionEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoDireccionEdicion" name="telefonoDireccionEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltDireccionEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltDireccionEdicion" name="telefonoAltDireccionEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionDireccionEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionDireccionEdicion" name="direccionDireccionEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltDireccionEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltDireccionEdicion" name="direccionAltDireccionEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaDireccionEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaDireccionEdicion" name="vigenciaDireccionEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesDireccionEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesDireccionEdicion" name="vacacionesDireccionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosDireccionEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosDireccionEdicion" name="vacacionesUsadosDireccionEdicion" placeholder="Dias de Vacaciones Usados">
                            </div>
                            <div class="form-group">
                                <label for="tipoDireccionEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoDireccionEdicion" name="tipoDireccionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasDireccionEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasDireccionEdicion" name="alergiasDireccionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosDireccionEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosDireccionEdicion" name="medicamentosDireccionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosDireccionEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosDireccionEdicion" name="padecimientosDireccionEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1DireccionEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1DireccionEdicion" name="foto1DireccionEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2DireccionEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2DireccionEdicion" name="foto2DireccionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3DireccionEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3DireccionEdicion" name="foto3DireccionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirDireccionEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirDireccionEdicion" name="fotoDirDireccionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltDireccionEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltDireccionEdicion" name="fotoDirAltDireccionEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoDireccionEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoDireccionEdicion" name="archivoDireccionEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="actualizaDatosDireccion">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Direccion -->

<!-- Modal Formulario  Agregar Arte -->
<div class="modal fade" id="ArteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Arte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Arte" name="" hidden>
                                <label for="nombreArte" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreArte" name="nombreArte" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoArte" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="apellidoArte" name="apellidoArte" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoArte" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoArte" name="puestoArte" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusArte" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusArte" name="estatusArte">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailArte" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailArte" name="mailArte" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltArte" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltArte" name="mailaltArte" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesArte" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesArte" name="redesArte" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoArte" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoArte" name="telefonoArte" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltArte" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltArte" name="telefonoAltArte" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionArte" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionArte" name="direccionArte" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltArte" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltArte" name="direccionAltArte" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaArte" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaArte" name="vigenciaArte" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesArte" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesArte" name="vacacionesArte" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosArte" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosArte" name="vacacionesUsadosArte" placeholder="Dias de Vacaciones Usados">
                            </div>
                            <div class="form-group">
                                <label for="tipoArte" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoArte" name="tipoArte" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasArte" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasArte" name="alergiasArte" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosArte" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosArte" name="medicamentosArte" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosArte" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosArte" name="padecimientosArte" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Arte" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Arte" name="foto1Arte" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Arte" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Arte" name="foto2Arte" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Arte" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Arte" name="foto3Arte" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirArte" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirArte" name="fotoDirArte" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltArte" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltArte" name="fotoDirAltArte" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoArte" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoArte" name="archivoArte" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="agregar_Arte">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Arte -->

<!-- Modal Formulario Edit Arte -->
<div class="modal fade" id="modalEdicionArte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Arte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_ArteEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreArteEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreArteEdicion" name="nombreArteEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoArteEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoArteEdicion" name="apellidoArteEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoArteEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoArteEdicion" name="puestoArteEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusArteEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusArteEdicion" name="estatusArteEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailArteEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailArteEdicion" name="mailArteEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltArteEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltArteEdicion" name="mailaltArteEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesArteEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesArteEdicion" name="redesArteEdicion" placeholder="Redes Sociales">
                            </div>
                            
                            <div class="form-group">
                                <label for="telefonoArteEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoArteEdicion" name="telefonoArteEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltArteEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltArteEdicion" name="telefonoAltArteEdicion" placeholder=" Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionArteEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionArteEdicion" name="direccionArteEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltArteEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltArteEdicion" name="direccionAltArteEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaArteEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaArteEdicion" name="vigenciaArteEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesArteEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesArteEdicion" name="vacacionesArteEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosArteEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosArteEdicion" name="vacacionesUsadosArteEdicion" placeholder="Dias de Vacaciones Usados">
                            </div>
                            <div class="form-group">
                                <label for="tipoArteEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoArteEdicion" name="tipoArteEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasArteEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasArteEdicion" name="alergiasArteEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosArteEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosArteEdicion" name="medicamentosArteEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosArteEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosArteEdicion" name="padecimientosArteEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1ArteEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1ArteEdicion" name="foto1ArteEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2ArteEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2ArteEdicion" name="foto2ArteEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3ArteEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3ArteEdicion" name="foto3ArteEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirArteEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirArteEdicion" name="fotoDirArteEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltArteEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltArteEdicion" name="fotoDirAltArteEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoArteEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoArteEdicion" name="archivoArteEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosArte">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Arte -->
<!-- Modal Formulario  Agregar Ilustracion -->
<div class="modal fade" id="IlustracionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Ilustración</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Ilustracion" name="" hidden>
                                <label for="nombreIlustracion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreIlustracion" name="nombreIlustracion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoIlustracion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoIlustracion" name="apellidoIlustracion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoIlustracion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoIlustracion" name="puestoIlustracion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusIlustracion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusIlustracion" name="estatusIlustracion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailIlustracion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailIlustracion" name="mailIlustracion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltIlustracion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltIlustracion" name="mailaltIlustracion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesIlustracion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesIlustracion" name="redesIlustracion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoIlustracion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoIlustracion" name="telefonoIlustracion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltIlustracion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltIlustracion" name="telefonoAltIlustracion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionIlustracion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionIlustracion" name="direccionIlustracion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltIlustracion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltIlustracion" name="direccionAltIlustracion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaIlustracion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaIlustracion" name="vigenciaIlustracion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesIlustracion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesIlustracion" name="vacacionesIlustracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosIlustracion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosIlustracion" name="vacacionesUsadosIlustracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoIlustracion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoIlustracion" name="tipoIlustracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasIlustracion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasIlustracion" name="alergiasIlustracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosIlustracion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosIlustracion" name="medicamentosIlustracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosIlustracion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosIlustracion" name="padecimientosIlustracion" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Ilustracion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Ilustracion" name="foto1Ilustracion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Ilustracion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Ilustracion" name="foto2Ilustracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Ilustracion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Ilustracion" name="foto3Ilustracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirIlustracion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirIlustracion" name="fotoDirIlustracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltIlustracion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltIlustracion" name="fotoDirAltIlustracion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoIlustracion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoIlustracion" name="archivoIlustracion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Ilustracion">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Ilustracion -->

<!-- Modal Formulario Edit Ilustracion -->
<div class="modal fade" id="modalEdicionIlustracion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Ilustración</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_IlustracionEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreIlustracionEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreIlustracionEdicion" name="nombreIlustracionEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoIlustracionEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoIlustracionEdicion" name="apellidoIlustracionEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoIlustracionEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoIlustracionEdicion" name="puestoIlustracionEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusIlustracionEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusIlustracionEdicion" name="estatusIlustracionEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailIlustracionEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailIlustracionEdicion" name="mailIlustracionEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltIlustracionEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltIlustracionEdicion" name="mailaltIlustracionEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesIlustracionEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesIlustracionEdicion" name="redesIlustracionEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoIlustracionEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoIlustracionEdicion" name="telefonoIlustracionEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltIlustracionEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltIlustracionEdicion" name="telefonoAltIlustracionEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionIlustracionEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionIlustracionEdicion" name="direccionIlustracionEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltIlustracionEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltIlustracionEdicion" name="direccionAltIlustracionEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaIlustracionEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaIlustracionEdicion" name="vigenciaIlustracionEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesIlustracionEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesIlustracionEdicion" name="vacacionesIlustracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosIlustracionEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosIlustracionEdicion" name="vacacionesUsadosIlustracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoIlustracionEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoIlustracionEdicion" name="tipoIlustracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasIlustracionEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasIlustracionEdicion" name="alergiasIlustracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosIlustracionEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosIlustracionEdicion" name="medicamentosIlustracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosIlustracionEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosIlustracionEdicion" name="padecimientosIlustracionEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1IlustracionEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1IlustracionEdicion" name="foto1IlustracionEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2IlustracionEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2IlustracionEdicion" name="foto2IlustracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3IlustracionEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3IlustracionEdicion" name="foto3IlustracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirIlustracionEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirIlustracionEdicion" name="fotoDirIlustracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltIlustracionEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltIlustracionEdicion" name="fotoDirAltIlustracionEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoIlustracionEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoIlustracionEdicion" name="archivoIlustracionEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="actualizaDatosIlustracion">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Ilustracion -->
<!-- Modal Formulario  Agregar Copy -->
<div class="modal fade" id="CopyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Copy y Correción De Estilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Copy" name="" hidden>
                                <label for="nombreCopy" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreCopy" name="nombreCopy" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoCopy" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoCopy" name="apellidoCopy" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoCopy" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoCopy" name="puestoCopy" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusCopy" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusCopy" name="estatusCopy">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailCopy" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailCopy" name="mailCopy" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltCopy" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltCopy" name="mailaltCopy" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesCopy" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesCopy" name="redesCopy" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoCopy" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoCopy" name="telefonoCopy" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltCopy" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltCopy" name="telefonoAltCopy" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionCopy" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionCopy" name="direccionCopy" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltCopy" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltCopy" name="direccionAltCopy" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaCopy" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaCopy" name="vigenciaCopy" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesCopy" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesCopy" name="vacacionesCopy" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosCopy" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosCopy" name="vacacionesUsadosCopy" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoCopy" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoCopy" name="tipoCopy" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasCopy" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasCopy" name="alergiasCopy" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosCopy" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosCopy" name="medicamentosCopy" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosCopy" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosCopy" name="padecimientosCopy" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Copy" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Copy" name="foto1Copy" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Copy" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Copy" name="foto2Copy" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Copy" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Copy" name="foto3Copy" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirCopy" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirCopy" name="fotoDirCopy" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltCopy" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltCopy" name="fotoDirAltCopy" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoCopy" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoCopy" name="archivoCopy" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Copy">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Copy -->

<!-- Modal Formulario Edit Copy -->
<div class="modal fade" id="modalEdicionCopy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Copy y Correción De Estilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_CopyEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreCopyEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreCopyEdicion" name="nombreCopyEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoCopyEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoCopyEdicion" name="apellidoCopyEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoCopyEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoCopyEdicion" name="puestoCopyEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusCopyEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusCopyEdicion" name="estatusCopyEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailCopyEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailCopyEdicion" name="mailCopyEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltCopyEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltCopyEdicion" name="mailaltCopyEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesCopyEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesCopyEdicion" name="redesCopyEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoCopyEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoCopyEdicion" name="telefonoCopyEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltCopyEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltCopyEdicion" name="telefonoAltCopyEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionCopyEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionCopyEdicion" name="direccionCopyEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltCopyEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltCopyEdicion" name="direccionAltCopyEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaCopyEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaCopyEdicion" name="vigenciaCopyEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesCopyEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesCopyEdicion" name="vacacionesCopyEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosCopyEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosCopyEdicion" name="vacacionesUsadosCopyEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoCopyEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoCopyEdicion" name="tipoCopyEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasCopyEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasCopyEdicion" name="alergiasCopyEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosCopyEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosCopyEdicion" name="medicamentosCopyEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosCopyEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosCopyEdicion" name="padecimientosCopyEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1CopyEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1CopyEdicion" name="foto1CopyEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2CopyEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2CopyEdicion" name="foto2CopyEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3CopyEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3CopyEdicion" name="foto3CopyEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirCopyEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirCopyEdicion" name="fotoDirCopyEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltCopyEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltCopyEdicion" name="fotoDirAltCopyEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoCopyEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoCopyEdicion" name="archivoCopyEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosCopy">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Copy -->
<!-- Modal Formulario  Agregar Estrategia -->
<div class="modal fade" id="EstrategiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Estrategia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Estrategia" name="" hidden>
                                <label for="nombreEstrategia" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreEstrategia" name="nombreEstrategia" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoEstrategia" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoEstrategia" name="apellidoEstrategia" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoEstrategia" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoEstrategia" name="puestoEstrategia" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusEstrategia" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusEstrategia" name="estatusEstrategia">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailEstrategia" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailEstrategia" name="mailEstrategia" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltEstrategia" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltEstrategia" name="mailaltEstrategia" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesEstrategia" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesEstrategia" name="redesEstrategia" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoEstrategia" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoEstrategia" name="telefonoEstrategia" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltEstrategia" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltEstrategia" name="telefonoAltEstrategia" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionEstrategia" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionEstrategia" name="direccionEstrategia" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltEstrategia" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltEstrategia" name="direccionAltEstrategia" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaEstrategia" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaEstrategia" name="vigenciaEstrategia" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesEstrategia" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesEstrategia" name="vacacionesEstrategia" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosEstrategia" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosEstrategia" name="vacacionesUsadosEstrategia" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoEstrategia" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoEstrategia" name="tipoEstrategia" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasEstrategia" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasEstrategia" name="alergiasEstrategia" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosEstrategia" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosEstrategia" name="medicamentosEstrategia" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosEstrategia" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosEstrategia" name="padecimientosEstrategia" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Estrategia" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Estrategia" name="foto1Estrategia" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Estrategia" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Estrategia" name="foto2Estrategia" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Estrategia" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Estrategia" name="foto3Estrategia" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirEstrategia" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirEstrategia" name="fotoDirEstrategia" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltEstrategia" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltEstrategia" name="fotoDirAltEstrategia" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoEstrategia" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoEstrategia" name="archivoEstrategia" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Estrategia">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Estrategia -->

<!-- Modal Formulario Edit Estrategia -->
<div class="modal fade" id="modalEdicionEstrategia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Estrategia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_EstrategiaEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreEstrategiaEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreEstrategiaEdicion" name="nombreEstrategiaEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoEstrategiaEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoEstrategiaEdicion" name="apellidoEstrategiaEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoEstrategiaEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoEstrategiaEdicion" name="puestoEstrategiaEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusEstrategiaEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusEstrategiaEdicion" name="estatusEstrategiaEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailEstrategiaEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailEstrategiaEdicion" name="mailEstrategiaEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltEstrategiaEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltEstrategiaEdicion" name="mailaltEstrategiaEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesEstrategiaEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesEstrategiaEdicion" name="redesEstrategiaEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoEstrategiaEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoEstrategiaEdicion" name="telefonoEstrategiaEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltEstrategiaEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltEstrategiaEdicion" name="telefonoAltEstrategiaEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionEstrategiaEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionEstrategiaEdicion" name="direccionEstrategiaEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltEstrategiaEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltEstrategiaEdicion" name="direccionAltEstrategiaEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaEstrategiaEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaEstrategiaEdicion" name="vigenciaEstrategiaEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesEstrategiaEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesEstrategiaEdicion" name="vacacionesEstrategiaEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosEstrategiaEdicion" class="col-form-label">Dias de VacacionesUsados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosEstrategiaEdicion" name="vacacionesUsadosEstrategiaEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoEstrategiaEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoEstrategiaEdicion" name="tipoEstrategiaEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasEstrategiaEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasEstrategiaEdicion" name="alergiasEstrategiaEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosEstrategiaEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosEstrategiaEdicion" name="medicamentosEstrategiaEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosEstrategiaEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosEstrategiaEdicion" name="padecimientosEstrategiaEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1EstrategiaEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1EstrategiaEdicion" name="foto1EstrategiaEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2EstrategiaEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2EstrategiaEdicion" name="foto2EstrategiaEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3EstrategiaEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3EstrategiaEdicion" name="foto3EstrategiaEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirEstrategiaEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirEstrategiaEdicion" name="fotoDirEstrategiaEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltEstrategiaEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltEstrategiaEdicion" name="fotoDirAltEstrategiaEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoEstrategiaEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoEstrategiaEdicion" name="archivoEstrategiaEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosEstrategia">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Estrategia -->
<!-- Modal Formulario  Agregar Administracion -->
<div class="modal fade" id="AdministracionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Administración</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Administracion" name="" hidden>
                                <label for="nombreAdministracion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreAdministracion" name="nombreAdministracion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoAdministracion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoAdministracion" name="apellidoAdministracion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoAdministracion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoAdministracion" name="puestoAdministracion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusAdministracion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusAdministracion" name="estatusAdministracion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailAdministracion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailAdministracion" name="mailAdministracion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltAdministracion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltAdministracion" name="mailaltAdministracion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesAdministracion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesAdministracion" name="redesAdministracion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAdministracion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoAdministracion" name="telefonoAdministracion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltAdministracion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltAdministracion" name="telefonoAltAdministracion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionAdministracion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionAdministracion" name="direccionAdministracion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltAdministracion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltAdministracion" name="direccionAltAdministracion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaAdministracion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaAdministracion" name="vigenciaAdministracion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesAdministracion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesAdministracion" name="vacacionesAdministracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosAdministracion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosAdministracion" name="vacacionesUsadosAdministracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoAdministracion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoAdministracion" name="tipoAdministracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasAdministracion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasAdministracion" name="alergiasAdministracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosAdministracion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosAdministracion" name="medicamentosAdministracion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosAdministracion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosAdministracion" name="padecimientosAdministracion" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Administracion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Administracion" name="foto1Administracion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Administracion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Administracion" name="foto2Administracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Administracion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Administracion" name="foto3Administracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAdministracion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAdministracion" name="fotoDirAdministracion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltAdministracion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltAdministracion" name="fotoDirAltAdministracion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoAdministracion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoAdministracion" name="archivoAdministracion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Administracion">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Administracion -->

<!-- Modal Formulario Edit Administracion -->
<div class="modal fade" id="modalEdicionAdministracion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Administración</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_AdministracionEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreAdministracionEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreAdministracionEdicion" name="nombreAdministracionEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoAdministracionEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoAdministracionEdicion" name="apellidoAdministracionEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoAdministracionEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoAdministracionEdicion" name="puestoAdministracionEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusAdministracionEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusAdministracionEdicion" name="estatusAdministracionEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailAdministracionEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailAdministracionEdicion" name="mailAdministracionEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltAdministracionEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltAdministracionEdicion" name="mailaltAdministracionEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesAdministracionEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesAdministracionEdicion" name="redesAdministracionEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAdministracionEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoAdministracionEdicion" name="telefonoAdministracionEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltAdministracionEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltAdministracionEdicion" name="telefonoAltAdministracionEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionAdministracionEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionAdministracionEdicion" name="direccionAdministracionEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltAdministracionEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltAdministracionEdicion" name="direccionAltAdministracionEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaAdministracionEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaAdministracionEdicion" name="vigenciaAdministracionEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesAdministracionEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesAdministracionEdicion" name="vacacionesAdministracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosAdministracionEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosAdministracionEdicion" name="vacacionesUsadosAdministracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoAdministracionEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoAdministracionEdicion" name="tipoAdministracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasAdministracionEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasAdministracionEdicion" name="alergiasAdministracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosAdministracionEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosAdministracionEdicion" name="medicamentosAdministracionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosAdministracionEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosAdministracionEdicion" name="padecimientosAdministracionEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1AdministracionEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1AdministracionEdicion" name="foto1AdministracionEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2AdministracionEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2AdministracionEdicion" name="foto2AdministracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3AdministracionEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3AdministracionEdicion" name="foto3AdministracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAdministracionEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAdministracionEdicion" name="fotoDirAdministracionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltAdministracionEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltAdministracionEdicion" name="fotoDirAltAdministracionEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoAdministracionEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoAdministracionEdicion" name="archivoAdministracionEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosAdministracion">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Administracion -->
<!-- Modal Formulario  Agregar Post -->
<div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Post Producción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Post" name="" hidden>
                                <label for="nombrePost" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombrePost" name="nombrePost" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoPost" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoPost" name="apellidoPost" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoPost" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoPost" name="puestoPost" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusPost" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusPost" name="estatusPost">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailPost" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailPost" name="mailPost" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltPost" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltPost" name="mailaltPost" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesPost" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesPost" name="redesPost" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoPost" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoPost" name="telefonoPost" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltPost" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltPost" name="telefonoAltPost" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionPost" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionPost" name="direccionPost" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltPost" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltPost" name="direccionAltPost" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaPost" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaPost" name="vigenciaPost" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesPost" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesPost" name="vacacionesPost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosPost" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosPost" name="vacacionesUsadosPost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoPost" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoPost" name="tipoPost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasPost" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasPost" name="alergiasPost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosPost" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosPost" name="medicamentosPost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosPost" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosPost" name="padecimientosPost" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Post" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Post" name="foto1Post" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Post" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Post" name="foto2Post" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Post" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Post" name="foto3Post" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirPost" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirPost" name="fotoDirPost" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltPost" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltPost" name="fotoDirAltPost" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoPost" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoPost" name="archivoPost" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Post">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Post -->

<!-- Modal Formulario Edit Post -->
<div class="modal fade" id="modalEdicionPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Post Producción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_PostEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombrePostEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombrePostEdicion" name="nombrePostEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoPostEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoPostEdicion" name="apellidoPostEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoPostEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoPostEdicion" name="puestoPostEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusPostEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusPostEdicion" name="estatusPostEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailPostEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailPostEdicion" name="mailPostEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltPostEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltPostEdicion" name="mailaltPostEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesPostEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesPostEdicion" name="redesPostEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoPostEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoPostEdicion" name="telefonoPostEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltPostEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltPostEdicion" name="telefonoAltPostEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionPostEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionPostEdicion" name="direccionPostEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltPostEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltPostEdicion" name="direccionAltPostEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaPostEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaPostEdicion" name="vigenciaPostEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesPostEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesPostEdicion" name="vacacionesPostEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosPostEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosPostEdicion" name="vacacionesUsadosPostEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoPostEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoPostEdicion" name="tipoPostEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasPostEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasPostEdicion" name="alergiasPostEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosPostEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosPostEdicion" name="medicamentosPostEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosPostEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosPostEdicion" name="padecimientosPostEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1PostEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1PostEdicion" name="foto1PostEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2PostEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2PostEdicion" name="foto2PostEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3PostEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3PostEdicion" name="foto3PostEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirPostEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirPostEdicion" name="fotoDirPostEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltPostEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltPostEdicion" name="fotoDirAltPostEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoPostEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoPostEdicion" name="archivoPostEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="actualizaDatosPost">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Post -->
<!-- Modal Formulario  Agregar Programacion -->
<div class="modal fade" id="ProgramacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Programación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="Programacion">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_Programacion" name="" hidden>
                                <label for="nombreProgramacion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreProgramacion" name="nombreProgramacion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoProgramacion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoProgramacion" name="apellidoProgramacion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoProgramacion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoProgramacion" name="puestoProgramacion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusProgramacion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusProgramacion" name="estatusProgramacion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailProgramacion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailProgramacion" name="mailProgramacion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltProgramacion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltProgramacion" name="mailaltProgramacion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesProgramacion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesProgramacion" name="redesProgramacion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoProgramacion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoProgramacion" name="telefonoProgramacion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltProgramacion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltProgramacion" name="telefonoAltProgramacion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionProgramacion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionProgramacion" name="direccionProgramacion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltProgramacion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltProgramacion" name="direccionAltProgramacion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaProgramacion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaProgramacion" name="vigenciaProgramacion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesProgramacion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesProgramacion" name="vacacionesProgramacion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosProgramacion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosProgramacion" name="vacacionesUsadosProgramacion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoProgramacion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoProgramacion" name="tipoProgramacion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasProgramacion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasProgramacion" name="alergiasProgramacion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosProgramacion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosProgramacion" name="medicamentosProgramacion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosProgramacion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosProgramacion" name="padecimientosProgramacion" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Programacion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Programacion" name="foto1Programacion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Programacion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Programacion" name="foto2Programacion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Programacion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Programacion" name="foto3Programacion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirProgramacion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirProgramacion" name="fotoDirProgramacion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltProgramacion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltProgramacion" name="fotoDirAltProgramacion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoProgramacion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoProgramacion" name="archivoProgramacion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Programacion">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Programacion -->

<!-- Modal Formulario Edit Programacion -->
<div class="modal fade" id="modalEdicionProgramacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Programación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="Programacion">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_ProgramacionEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreProgramacionEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreProgramacionEdicion" name="nombreProgramacionEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoProgramacionEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoProgramacionEdicion" name="apellidoProgramacionEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoProgramacionEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoProgramacionEdicion" name="puestoProgramacionEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusProgramacionEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusProgramacionEdicion" name="estatusProgramacionEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailProgramacionEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailProgramacionEdicion" name="mailProgramacionEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltProgramacionEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltProgramacionEdicion" name="mailaltProgramacionEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="telefonoProgramacionEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoProgramacionEdicion" name="telefonoProgramacionEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="redesProgramacionEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesProgramacionEdicion" name="redesProgramacionEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltProgramacionEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltProgramacionEdicion" name="telefonoAltProgramacionEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionProgramacionEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionProgramacionEdicion" name="direccionProgramacionEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltProgramacionEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltProgramacionEdicion" name="direccionAltProgramacionEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaProgramacionEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaProgramacionEdicion" name="vigenciaProgramacionEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesProgramacionEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesProgramacionEdicion" name="vacacionesProgramacionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosProgramacionEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosProgramacionEdicion" name="vacacionesUsadosProgramacionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoProgramacionEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoProgramacionEdicion" name="tipoProgramacionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasProgramacionEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasProgramacionEdicion" name="alergiasProgramacionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosProgramacionEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosProgramacionEdicion" name="medicamentosProgramacionEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosProgramacionEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosProgramacionEdicion" name="padecimientosProgramacionEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1ProgramacionEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1ProgramacionEdicion" name="foto1ProgramacionEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2ProgramacionEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2ProgramacionEdicion" name="foto2ProgramacionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3ProgramacionEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3ProgramacionEdicion" name="foto3ProgramacionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirProgramacionEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirProgramacionEdicion" name="fotoDirProgramacionEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltProgramacionEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltProgramacionEdicion" name="fotoDirAltProgramacionEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoProgramacionEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoProgramacionEdicion" name="archivoProgramacionEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosProgramacion">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Programacion -->

<!-- Modal Formulario  Agregar Cuentas -->
<div class="modal fade" id="cuentasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Cuentas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_cuentas" name="" hidden>
                                <label for="nombreCuentas" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreCuentas" name="nombreCuentas" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoCuentas" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoCuentas" name="apellidoCuentas" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoCuentas" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoCuentas" name="puestoCuentas" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusCuentas" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusCuentas" name="estatusCuentas">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailCuentas" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailCuentas" name="mailCuentas" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltCuentas" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltCuentas" name="mailaltCuentas" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesCuentas" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesCuentas" name="redesCuentas" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoCuentas" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoCuentas" name="telefonoCuentas" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltCuentas" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltCuentas" name="telefonoAltCuentas" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionCuentas" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionCuentas" name="direccionCuentas" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltCuentas" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltCuentas" name="direccionAltCuentas" placeholder="Dirección Alterna">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaCuentas" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaCuentas" name="vigenciaCuentas" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesCuentas" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesCuentas" name="vacacionesCuentas" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosCuentas" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosCuentas" name="vacacionesUsadosCuentas" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoCuentas" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoCuentas" name="tipoCuentas" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasCuentas" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasCuentas" name="alergiasCuentas" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosCuentas" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosCuentas" name="medicamentosCuentas" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosCuentas" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosCuentas" name="padecimientosCuentas" placeholder="">
                            </div>
                            Cargar Imagen Perfil:
                            <div class="form-group">
                                <label for="foto1Cuentas" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1Cuentas" name="foto1Cuentas" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2Cuentas" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2Cuentas" name="foto2Cuentas" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3Cuentas" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3Cuentas" name="foto3Cuentas" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirCuentas" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirCuentas" name="fotoDirCuentas" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltCuentas" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltCuentas" name="fotoDirAltCuentas" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoCuentas" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoCuentas" name="archivoCuentas" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="agregar_Cuentas">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Agregar Cuentas -->

<!-- Modal Formulario Edit Cuentas -->
<div class="modal fade" id="modalEdicionCuentas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="height:100%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Área Cuentas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_CuentasEdicion" name="" hidden>
                                <input type="text" id="equipoEdicion" name="" hidden>
                                <label for="nombreCuentasEdicion" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreCuentasEdicion" name="nombreCuentasEdicion" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidoCuentasEdicion" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellidoCuentasEdicion" name="apellidoCuentasEdicion" placeholder="Apellido(s)">
                            </div>
                            <div class="form-group">
                                <label for="puestoCuentasEdicion" class="col-form-label">Puesto:</label>
                  		        <input type="text" class="form-control" id="puestoCuentasEdicion" name="puestoCuentasEdicion" placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="estatusCuentasEdicion" class="col-form-label">Status:</label>
                                <select class="form-control" aria-label="" id="estatusCuentasEdicion" name="estatusCuentasEdicion">
                                <option selected disabled>Status</option>
                                <option value="A Prueba">A Prueba</option>
                                <option value="Contrato Nomina">Contrato Nomina </option>
                                <option value="Contrato Prestación de Servicios">Contrato Prestación de Servicios</option>
                                <option value="Becario">Becario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mailCuentasEdicion" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailCuentasEdicion" name="mailCuentasEdicion" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltCuentasEdicion" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltCuentasEdicion" name="mailaltCuentasEdicion" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="redesCuentasEdicion" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesCuentasEdicion" name="redesCuentasEdicion" placeholder="Redes Sociales">
                            </div>
                            <div class="form-group">
                                <label for="telefonoCuentasEdicion" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonoCuentasEdicion" name="telefonoCuentasEdicion" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="telefonoAltCuentasEdicion" class="col-form-label">Contacto de Emergencia:</label>
                                <input type="tel" class="form-control" id="telefonoAltCuentasEdicion" name="telefonoAltCuentasEdicion" placeholder="Contacto de Emergencia">
                            </div>
                            <div class="form-group">
                                <label for="direccionCuentasEdicion" class="col-form-label">Dirección 1:</label>
                                <input type="text" class="form-control" id="direccionCuentasEdicion" name="direccionCuentasEdicion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="direccionAltCuentasEdicion" class="col-form-label">Dirección 2:</label>
                                <input type="text" class="form-control" id="direccionAltCuentasEdicion" name="direccionAltCuentasEdicion" placeholder="Dirección 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vigenciaCuentasEdicion" class="col-form-label">Vigencia:</label>
                                <input type="date" class="form-control" id="vigenciaCuentasEdicion" name="vigenciaCuentasEdicion" >
                            </div>
                            <div class="form-group">
                                <label for="vacacionesCuentasEdicion" class="col-form-label">Dias de Vacaciones:</label>
                                <input type="text" class="form-control" id="vacacionesCuentasEdicion" name="vacacionesCuentasEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacacionesUsadosCuentasEdicion" class="col-form-label">Dias de Vacaciones Usados:</label>
                                <input type="text" class="form-control" id="vacacionesUsadosCuentasEdicion" name="vacacionesUsadosCuentasEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="tipoCuentasEdicion" class="col-form-label">Tipo de Sangre:</label>
                                <input type="text" class="form-control" id="tipoCuentasEdicion" name="tipoCuentasEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alergiasCuentasEdicion" class="col-form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergiasCuentasEdicion" name="alergiasCuentasEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="medicamentosCuentasEdicion" class="col-form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentosCuentasEdicion" name="medicamentosCuentasEdicion" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="padecimientosCuentasEdicion" class="col-form-label">Padecimientos:</label>
                                <input type="text" class="form-control" id="padecimientosCuentasEdicion" name="padecimientosCuentasEdicion" placeholder="">
                            </div>
                            Reemplazar imagen:
                            <div class="form-group">
                                <label for="foto1CuentasEdicion" class="col-form-label">Foto 1:</label>
                                <input type="file" class="btn-secondary" id="foto1CuentasEdicion" name="foto1CuentasEdicion" accept= "image/*" >
                            </div>
                            <div class="form-group">
                                <label for="foto2CuentasEdicion" class="col-form-label">Foto 2:</label>
                                <input type="file" class="btn-secondary" id="foto2CuentasEdicion" name="foto2CuentasEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="foto3CuentasEdicion" class="col-form-label">Foto 3:</label>
                                <input type="file" class="btn-secondary" id="foto3CuentasEdicion" name="foto3CuentasEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirCuentasEdicion" class="col-form-label">Foto Dirección:</label>
                                <input type="file" class="btn-secondary" id="fotoDirCuentasEdicion" name="fotoDirCuentasEdicion" accept= "image/*">
                            </div>
                            <div class="form-group">
                                <label for="fotoDirAltCuentasEdicion" class="col-form-label">Foto Dirección 2:</label>
                                <input type="file" class="btn-secondary" id="fotoDirAltCuentasEdicion" name="fotoDirAltCuentasEdicion" accept= "image/*">
                            </div>
                        </div>
                    <br>
                    </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="archivoCuentasEdicion" class="col-form-label">Expediente:</label>
                                    <input type="file" class="btn-secondary" id="archivoCuentasEdicion" name="archivoCuentasEdicion" >
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizaDatosCuentas">Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Formulario Edit Cuentas -->

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
<!-- Funciones para Direccion /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Direccion').click(function (e) {
            nombre = $('#nombreDireccion').val();
            apellido = $('#apellidoDireccion').val();
            puesto = $('#puestoDireccion').val();
            estatus = $('#estatusDireccion').val();
            correo = $('#mailDireccion').val();
            correoalt = $('#mailaltDireccion').val();
            redes = $('#redesDireccion').val();
            tel = $('#telefonoDireccion').val();
            telalt = $('#telefonoAltDireccion').val();
            direccion = $('#direccionDireccion').val();
            direccionAlt = $('#direccionAltDireccion').val();
            vigencia = $('#vigenciaDireccion').val();
            vacaciones = $('#vacacionesDireccion').val();
            vacacionesUsadas = $('#vacacionesUsadosDireccion').val();
            tipo = $('#tipoDireccion').val();
            alergias = $('#alergiasDireccion').val();
            medicamentos = $('#medicamentosDireccion').val();
            padecimientos = $('#padecimientosDireccion').val();
            equipo="direccion";

            if(nombre.trim() == '' ){
                $('#nombreDireccion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoDireccion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoDireccion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusDireccion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailDireccion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoDireccion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Direccion')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Direccion')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Direccion')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoDireccion')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirDireccion')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltDireccion')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosDireccion').click(function (e) {
            id = $('#id_DireccionEdicion').val();
            nombre = $('#nombreDireccionEdicion').val();
            apellido = $('#apellidoDireccionEdicion').val();
            puesto = $('#puestoDireccionEdicion').val();
            estatus = $('#estatusDireccionEdicion').val();
            correo = $('#mailDireccionEdicion').val();
            correoalt = $('#mailaltDireccionEdicion').val();
            redes = $('#redesDireccionEdicion').val();
            tel = $('#telefonoDireccionEdicion').val();
            telalt = $('#telefonoAltDireccionEdicion').val();
            direccion = $('#direccionDireccionEdicion').val();
            direccionAlt = $('#direccionAltDireccionEdicion').val();
            vigencia = $('#vigenciaDireccionEdicion').val();
            vacaciones = $('#vacacionesDireccionEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosDireccionEdicion').val();
            tipo = $('#tipoDireccionEdicion').val();
            alergias = $('#alergiasDireccionEdicion').val();
            medicamentos = $('#medicamentosDireccionEdicion').val();
            padecimientos = $('#padecimientosDireccionEdicion').val();
            equipo="direccion";

            if(nombre.trim() == '' ){
                $('#nombreDireccionEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoDireccionEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoDireccionEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusDireccionEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailDireccionEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoDireccionEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1DireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2DireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3DireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoDireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirDireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltDireccionEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Direccion(datos){
        d=datos.split('||');
        $('#id_DireccionEdicion').val(d[0]);
        $('#nombreDireccionEdicion').val(d[1]);
        $('#apellidoDireccionEdicion').val(d[2]);
        $('#puestoDireccionEdicion').val(d[3]);
        $('#estatusDireccionEdicion').val(d[21]);
        $('#mailDireccionEdicion').val(d[4]);
        $('#mailaltDireccionEdicion').val(d[5]);
        $('#redesDireccionEdicion').val(d[22]);
        $('#telefonoDireccionEdicion').val(d[6]);
        $('#telefonoAltDireccionEdicion').val(d[7]);
        $('#direccionDireccionEdicion').val(d[8]);
        $('#direccionAltDireccionEdicion').val(d[9]);
        $('#vigenciaDireccionEdicion').val(d[10]);
        $('#vacacionesDireccionEdicion').val(d[11]);

        $('#vacacionesUsadosDireccionEdicion').val(d[12]);
        
        $('#tipoDireccionEdicion').val(d[13]);
        $('#alergiasDireccionEdicion').val(d[14]);
        $('#medicamentosDireccionEdicion').val(d[15]);
        $('#padecimientosDireccionEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Arte /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Arte').click(function (e) {
            nombre = $('#nombreArte').val();
            apellido = $('#apellidoArte').val();
            puesto = $('#puestoArte').val();
            estatus = $('#estatusArte').val();
            correo = $('#mailArte').val();
            correoalt = $('#mailaltArte').val();
            tel = $('#telefonoArte').val();
            telalt = $('#telefonoAltArte').val();
            direccion = $('#direccionArte').val();
            direccionAlt = $('#direccionAltArte').val();
            redes = $('#redesArte').val();
            vigencia = $('#vigenciaArte').val();
            vacaciones = $('#vacacionesArte').val();
            vacacionesUsadas = $('#vacacionesUsadosArte').val();
            tipo = $('#tipoArte').val();
            alergias = $('#alergiasArte').val();
            medicamentos = $('#medicamentosArte').val();
            padecimientos = $('#padecimientosArte').val();
            equipo="arte";
            if(nombre.trim() == '' ){
                $('#nombreArte').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoArte').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoArte').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusArte').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailArte').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoArte').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Arte')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Arte')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Arte')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoArte')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirArte')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltArte')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosArte').click(function (e) {
            id = $('#id_ArteEdicion').val();
            nombre = $('#nombreArteEdicion').val();
            apellido = $('#apellidoArteEdicion').val();
            puesto = $('#puestoArteEdicion').val();
            estatus = $('#estatusArteEdicion').val();
            correo = $('#mailArteEdicion').val();
            correoalt = $('#mailaltArteEdicion').val();
            tel = $('#telefonoArteEdicion').val();
            telalt = $('#telefonoAltArteEdicion').val();
            direccion = $('#direccionArteEdicion').val();
            direccionAlt = $('#direccionAltArteEdicion').val();
            redes = $('#redesArteEdicion').val();
            vigencia = $('#vigenciaArteEdicion').val();
            vacaciones = $('#vacacionesArteEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosArteEdicion').val();
            tipo = $('#tipoArteEdicion').val();
            alergias = $('#alergiasArteEdicion').val();
            medicamentos = $('#medicamentosArteEdicion').val();
            padecimientos = $('#padecimientosArteEdicion').val();
            equipo="arte";
            if(nombre.trim() == '' ){
                $('#nombreArteEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoArteEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoArteEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusArteEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailArteEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoArteEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1ArteEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2ArteEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3ArteEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoArteEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirArteEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltArteEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Arte(datos){
        d=datos.split('||');
        $('#id_ArteEdicion').val(d[0]);
        $('#nombreArteEdicion').val(d[1]);
        $('#apellidoArteEdicion').val(d[2]);
        $('#puestoArteEdicion').val(d[3]);
        $('#estatusArteEdicion').val(d[21]);
        $('#mailArteEdicion').val(d[4]);
        $('#mailaltArteEdicion').val(d[5]);
        $('#telefonoArteEdicion').val(d[6]);
        $('#telefonoAltArteEdicion').val(d[7]);
        $('#direccionArteEdicion').val(d[8]);
        $('#direccionAltArteEdicion').val(d[9]);
        $('#redesArteEdicion').val(d[22]);
        $('#vigenciaArteEdicion').val(d[10]);
        $('#vacacionesArteEdicion').val(d[11]);
        $('#vacacionesUsadosArteEdicion').val(d[12]);
        $('#tipoArteEdicion').val(d[13]);
        $('#alergiasArteEdicion').val(d[14]);
        $('#medicamentosArteEdicion').val(d[15]);
        $('#padecimientosArteEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Ilustracion /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Ilustracion').click(function (e) {
            nombre = $('#nombreIlustracion').val();
            apellido = $('#apellidoIlustracion').val();
            puesto = $('#puestoIlustracion').val();
            estatus = $('#estatusIlustracion').val();
            correo = $('#mailIlustracion').val();
            correoalt = $('#mailaltIlustracion').val();
            tel = $('#telefonoIlustracion').val();
            telalt = $('#telefonoAltIlustracion').val();
            direccion = $('#direccionIlustracion').val();
            direccionAlt = $('#direccionAltIlustracion').val();
            redes = $('#redesIlustracion').val();
            vigencia = $('#vigenciaIlustracion').val();
            vacaciones = $('#vacacionesIlustracion').val();
            vacacionesUsadas = $('#vacacionesUsadosIlustracion').val();
            tipo = $('#tipoIlustracion').val();
            alergias = $('#alergiasIlustracion').val();
            medicamentos = $('#medicamentosIlustracion').val();
            padecimientos = $('#padecimientosIlustracion').val();
            equipo="ilustracion";
            if(nombre.trim() == '' ){
                $('#nombreIlustracion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoIlustracion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoIlustracion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusArteEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailIlustracion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoIlustracion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Ilustracion')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Ilustracion')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Ilustracion')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoIlustracion')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirIlustracion')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltIlustracion')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //location.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosIlustracion').click(function (e) {
            id = $('#id_IlustracionEdicion').val();
            nombre = $('#nombreIlustracionEdicion').val();
            apellido = $('#apellidoIlustracionEdicion').val();
            puesto = $('#puestoIlustracionEdicion').val();
            estatus = $('#estatusIlustracionEdicion').val();
            correo = $('#mailIlustracionEdicion').val();
            correoalt = $('#mailaltIlustracionEdicion').val();
            tel = $('#telefonoIlustracionEdicion').val();
            telalt = $('#telefonoAltIlustracionEdicion').val();
            direccion = $('#direccionIlustracionEdicion').val();
            direccionAlt = $('#direccionAltIlustracionEdicion').val();
            redes = $('#redesIlustracionEdicion').val();
            vigencia = $('#vigenciaIlustracionEdicion').val();
            vacaciones = $('#vacacionesIlustracionEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosIlustracionEdicion').val();
            tipo = $('#tipoIlustracionEdicion').val();
            alergias = $('#alergiasIlustracionEdicion').val();
            medicamentos = $('#medicamentosIlustracionEdicion').val();
            padecimientos = $('#padecimientosIlustracionEdicion').val();
            equipo="ilustracion";
            if(nombre.trim() == '' ){
                $('#nombreIlustracionEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoIlustracionEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoIlustracionEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusIlustracionEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailIlustracionEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoIlustracionEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1IlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2IlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3IlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoIlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirIlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltIlustracionEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Ilustracion(datos){
        d=datos.split('||');
        $('#id_IlustracionEdicion').val(d[0]);
        $('#nombreIlustracionEdicion').val(d[1]);
        $('#apellidoIlustracionEdicion').val(d[2]);
        $('#puestoIlustracionEdicion').val(d[3]);
        $('#estatusIlustracionEdicion').val(d[21]);
        $('#mailIlustracionEdicion').val(d[4]);
        $('#mailaltIlustracionEdicion').val(d[5]);
        $('#telefonoIlustracionEdicion').val(d[6]);
        $('#telefonoAltIlustracionEdicion').val(d[7]);
        $('#direccionIlustracionEdicion').val(d[8]);
        $('#direccionAltIlustracionEdicion').val(d[9]);
        $('#redesIlustracionEdicion').val(d[22]);
        $('#vigenciaIlustracionEdicion').val(d[10]);
        $('#vacacionesIlustracionEdicion').val(d[11]);
        $('#vacacionesUsadosIlustracionEdicion').val(d[12]);
        $('#tipoIlustracionEdicion').val(d[13]);
        $('#alergiasIlustracionEdicion').val(d[14]);
        $('#medicamentosIlustracionEdicion').val(d[15]);
        $('#padecimientosIlustracionEdicion').val(d[16]);

    }
</script>


<!-- Funciones para Copy /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Copy').click(function (e) {
            nombre = $('#nombreCopy').val();
            apellido = $('#apellidoCopy').val();
            puesto = $('#puestoCopy').val();
            estatus = $('#estatusCopy').val();
            correo = $('#mailCopy').val();
            correoalt = $('#mailaltCopy').val();
            tel = $('#telefonoCopy').val();
            telalt = $('#telefonoAltCopy').val();
            direccion = $('#direccionCopy').val();
            direccionAlt = $('#direccionAltCopy').val();
            redes = $('#redesCopy').val();
            vigencia = $('#vigenciaCopy').val();
            vacaciones = $('#vacacionesCopy').val();
            vacacionesUsadas = $('#vacacionesUsadosCopy').val();
            tipo = $('#tipoCopy').val();
            alergias = $('#alergiasCopy').val();
            medicamentos = $('#medicamentosCopy').val();
            padecimientos = $('#padecimientosCopy').val();
            equipo="copy";
            if(nombre.trim() == '' ){
                $('#nombreCopy').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoCopy').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoCopy').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusCopy').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailCopy').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoCopy').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Copy')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Copy')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Copy')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoCopy')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirCopy')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltCopy')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosCopy').click(function (e) {
            id = $('#id_CopyEdicion').val();
            nombre = $('#nombreCopyEdicion').val();
            apellido = $('#apellidoCopyEdicion').val();
            puesto = $('#puestoCopyEdicion').val();
            estatus = $('#estatusCopyEdicion').val();
            correo = $('#mailCopyEdicion').val();
            correoalt = $('#mailaltCopyEdicion').val();
            tel = $('#telefonoCopyEdicion').val();
            telalt = $('#telefonoAltCopyEdicion').val();
            direccion = $('#direccionCopyEdicion').val();
            direccionAlt = $('#direccionAltCopyEdicion').val();
            redes = $('#redesCopyEdicion').val();
            vigencia = $('#vigenciaCopyEdicion').val();
            vacaciones = $('#vacacionesCopyEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosCopyEdicion').val();
            tipo = $('#tipoCopyEdicion').val();
            alergias = $('#alergiasCopyEdicion').val();
            medicamentos = $('#medicamentosCopyEdicion').val();
            padecimientos = $('#padecimientosCopyEdicion').val();
            equipo="copy";
            if(nombre.trim() == '' ){
                $('#nombreCopyEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoCopyEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoCopyEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusCopyEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailCopyEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoCopyEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1CopyEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2CopyEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3CopyEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoCopyEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirCopyEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltCopyEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Copy(datos){
        d=datos.split('||');
        $('#id_CopyEdicion').val(d[0]);
        $('#nombreCopyEdicion').val(d[1]);
        $('#apellidoCopyEdicion').val(d[2]);
        $('#puestoCopyEdicion').val(d[3]);
        $('#estatusCopyEdicion').val(d[21]);
        $('#mailCopyEdicion').val(d[4]);
        $('#mailaltCopyEdicion').val(d[5]);
        $('#telefonoCopyEdicion').val(d[6]);
        $('#telefonoAltCopyEdicion').val(d[7]);
        $('#direccionCopyEdicion').val(d[8]);
        $('#direccionAltCopyEdicion').val(d[9]);
        $('#redesCopyEdicion').val(d[22]);
        $('#vigenciaCopyEdicion').val(d[10]);
        $('#vacacionesCopyEdicion').val(d[11]);
        $('#vacacionesUsadosCopyEdicion').val(d[12]);
        $('#tipoCopyEdicion').val(d[13]);
        $('#alergiasCopyEdicion').val(d[14]);
        $('#medicamentosCopyEdicion').val(d[15]);
        $('#padecimientosCopyEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Estrategia /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Estrategia').click(function (e) {
            nombre = $('#nombreEstrategia').val();
            apellido = $('#apellidoEstrategia').val();
            puesto = $('#puestoEstrategia').val();
            estatus = $('#estatusEstrategia').val();
            correo = $('#mailEstrategia').val();
            correoalt = $('#mailaltEstrategia').val();
            tel = $('#telefonoEstrategia').val();
            telalt = $('#telefonoAltEstrategia').val();
            direccion = $('#direccionEstrategia').val();
            direccionAlt = $('#direccionAltEstrategia').val();
            redes = $('#redesEstrategia').val();
            vigencia = $('#vigenciaEstrategia').val();
            vacaciones = $('#vacacionesEstrategia').val();
            vacacionesUsadas = $('#vacacionesUsadosEstrategia').val();
            tipo = $('#tipoEstrategia').val();
            alergias = $('#alergiasEstrategia').val();
            medicamentos = $('#medicamentosEstrategia').val();
            padecimientos = $('#padecimientosEstrategia').val();
            equipo="estrategia";
            if(nombre.trim() == '' ){
                $('#nombreEstrategia').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoEstrategia').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoEstrategia').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusEstrategia').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailEstrategia').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoEstrategia').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Estrategia')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Estrategia')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Estrategia')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoEstrategia')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirEstrategia')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltEstrategia')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //location.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosEstrategia').click(function (e) {
            id = $('#id_EstrategiaEdicion').val();
            nombre = $('#nombreEstrategiaEdicion').val();
            apellido = $('#apellidoEstrategiaEdicion').val();
            puesto = $('#puestoEstrategiaEdicion').val();
            estatus = $('#estatusEstrategiaEdicion').val();
            correo = $('#mailEstrategiaEdicion').val();
            correoalt = $('#mailaltEstrategiaEdicion').val();
            tel = $('#telefonoEstrategiaEdicion').val();
            telalt = $('#telefonoAltEstrategiaEdicion').val();
            direccion = $('#direccionEstrategiaEdicion').val();
            direccionAlt = $('#direccionAltEstrategiaEdicion').val();
            redes = $('#redesEstrategiaEdicion').val();
            vigencia = $('#vigenciaEstrategiaEdicion').val();
            vacaciones = $('#vacacionesEstrategiaEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosEstrategiaEdicion').val();
            tipo = $('#tipoEstrategiaEdicion').val();
            alergias = $('#alergiasEstrategiaEdicion').val();
            medicamentos = $('#medicamentosEstrategiaEdicion').val();
            padecimientos = $('#padecimientosEstrategiaEdicion').val();
            equipo="estrategia";
            if(nombre.trim() == '' ){
                $('#nombreEstrategiaEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoEstrategiaEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoEstrategiaEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusEstrategiaEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailEstrategiaEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoEstrategiaEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1EstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2EstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3EstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoEstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirEstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltEstrategiaEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Estrategia(datos){
        d=datos.split('||');
        $('#id_EstrategiaEdicion').val(d[0]);
        $('#nombreEstrategiaEdicion').val(d[1]);
        $('#apellidoEstrategiaEdicion').val(d[2]);
        $('#puestoEstrategiaEdicion').val(d[3]);
        $('#estatusEstrategiaEdicion').val(d[21]);
        $('#mailEstrategiaEdicion').val(d[4]);
        $('#mailaltEstrategiaEdicion').val(d[5]);
        $('#telefonoEstrategiaEdicion').val(d[6]);
        $('#telefonoAltEstrategiaEdicion').val(d[7]);
        $('#direccionEstrategiaEdicion').val(d[8]);
        $('#direccionAltEstrategiaEdicion').val(d[9]);
        $('#redesEstrategiaEdicion').val(d[22]);
        $('#vigenciaEstrategiaEdicion').val(d[10]);
        $('#vacacionesEstrategiaEdicion').val(d[11]);
        $('#vacacionesUsadosEstrategiaEdicion').val(d[12]);
        $('#tipoEstrategiaEdicion').val(d[13]);
        $('#alergiasEstrategiaEdicion').val(d[14]);
        $('#medicamentosEstrategiaEdicion').val(d[15]);
        $('#padecimientosEstrategiaEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Administracion /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Administracion').click(function (e) {
            nombre = $('#nombreAdministracion').val();
            apellido = $('#apellidoAdministracion').val();
            puesto = $('#puestoAdministracion').val();
            estatus = $('#estatusAdministracion').val();
            correo = $('#mailAdministracion').val();
            correoalt = $('#mailaltAdministracion').val();
            tel = $('#telefonoAdministracion').val();
            telalt = $('#telefonoAltAdministracion').val();
            direccion = $('#direccionAdministracion').val();
            direccionAlt = $('#direccionAltAdministracion').val();
            redes = $('#redesAdministracion').val();
            vigencia = $('#vigenciaAdministracion').val();
            vacaciones = $('#vacacionesAdministracion').val();
            vacacionesUsadas = $('#vacacionesUsadosAdministracion').val();
            tipo = $('#tipoAdministracion').val();
            alergias = $('#alergiasAdministracion').val();
            medicamentos = $('#medicamentosAdministracion').val();
            padecimientos = $('#padecimientosAdministracion').val();
            equipo="administracion";
            if(nombre.trim() == '' ){
                $('#nombreAdministracion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoAdministracion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoAdministracion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusAdministracion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailAdministracion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoAdministracion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Administracion')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Administracion')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Administracion')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoAdministracion')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirAdministracion')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltAdministracion')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosAdministracion').click(function (e) {
            id = $('#id_AdministracionEdicion').val();
            nombre = $('#nombreAdministracionEdicion').val();
            apellido = $('#apellidoAdministracionEdicion').val();
            puesto = $('#puestoAdministracionEdicion').val();
            estatus = $('#estatusAdministracionEdicion').val();
            correo = $('#mailAdministracionEdicion').val();
            correoalt = $('#mailaltAdministracionEdicion').val();
            tel = $('#telefonoAdministracionEdicion').val();
            telalt = $('#telefonoAltAdministracionEdicion').val();
            direccion = $('#direccionAdministracionEdicion').val();
            direccionAlt = $('#direccionAltAdministracionEdicion').val();
            redes = $('#redesAdministracionEdicion').val();
            vigencia = $('#vigenciaAdministracionEdicion').val();
            vacaciones = $('#vacacionesAdministracionEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosAdministracionEdicion').val();
            tipo = $('#tipoAdministracionEdicion').val();
            alergias = $('#alergiasAdministracionEdicion').val();
            medicamentos = $('#medicamentosAdministracionEdicion').val();
            padecimientos = $('#padecimientosAdministracionEdicion').val();
            equipo="administracion";
            if(nombre.trim() == '' ){
                $('#nombreAdministracionEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoAdministracionEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoAdministracionEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusAdministracionEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailAdministracionEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoAdministracionEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1AdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2AdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3AdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoAdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirAdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltAdministracionEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"Post",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Administracion(datos){
        d=datos.split('||');
        $('#id_AdministracionEdicion').val(d[0]);
        $('#nombreAdministracionEdicion').val(d[1]);
        $('#apellidoAdministracionEdicion').val(d[2]);
        $('#puestoAdministracionEdicion').val(d[3]);
        $('#estatusAdministracionEdicion').val(d[21]);
        $('#mailAdministracionEdicion').val(d[4]);
        $('#mailaltAdministracionEdicion').val(d[5]);
        $('#telefonoAdministracionEdicion').val(d[6]);
        $('#telefonoAltAdministracionEdicion').val(d[7]);
        $('#direccionAdministracionEdicion').val(d[8]);
        $('#direccionAltAdministracionEdicion').val(d[9]);
        $('#redesAdministracionEdicion').val(d[22]);
        $('#vigenciaAdministracionEdicion').val(d[10]);
        $('#vacacionesAdministracionEdicion').val(d[11]);
        $('#vacacionesUsadosAdministracionEdicion').val(d[12]);
        $('#tipoAdministracionEdicion').val(d[13]);
        $('#alergiasAdministracionEdicion').val(d[14]);
        $('#medicamentosAdministracionEdicion').val(d[15]);
        $('#padecimientosAdministracionEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Post /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Post').click(function (e) {
            nombre = $('#nombrePost').val();
            apellido = $('#apellidoPost').val();
            puesto = $('#puestoPost').val();
            estatus = $('#estatusPost').val();
            correo = $('#mailPost').val();
            correoalt = $('#mailaltPost').val();
            redes = $('#redesPost').val();
            tel = $('#telefonoPost').val();
            telalt = $('#telefonoAltPost').val();
            direccion = $('#direccionPost').val();
            direccionAlt = $('#direccionAltPost').val();
            vigencia = $('#vigenciaPost').val();
            vacaciones = $('#vacacionesPost').val();
            vacacionesUsadas = $('#vacacionesUsadosPost').val();
            tipo = $('#tipoPost').val();
            alergias = $('#alergiasPost').val();
            medicamentos = $('#medicamentosPost').val();
            padecimientos = $('#padecimientosPost').val();
            equipo="postProduccion";
            if(nombre.trim() == '' ){
                $('#nombrePost').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoPost').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoPost').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusPost').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailPost').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoPost').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Post')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Post')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Post')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoPost')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirPost')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltPost')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //location.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosPost').click(function (e) {
            id = $('#id_PostEdicion').val();
            nombre = $('#nombrePostEdicion').val();
            apellido = $('#apellidoPostEdicion').val();
            puesto = $('#puestoPostEdicion').val();
            estatus = $('#estatusPostEdicion').val();
            correo = $('#mailPostEdicion').val();
            correoalt = $('#mailaltPostEdicion').val();
            tel = $('#telefonoPostEdicion').val();
            telalt = $('#telefonoAltPostEdicion').val();
            direccion = $('#direccionPostEdicion').val();
            direccionAlt = $('#direccionAltPostEdicion').val();
            redes = $('#redesPostEdicion').val();
            vigencia = $('#vigenciaPostEdicion').val();
            vacaciones = $('#vacacionesPostEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosPostEdicion').val();
            tipo = $('#tipoPostEdicion').val();
            alergias = $('#alergiasPostEdicion').val();
            medicamentos = $('#medicamentosPostEdicion').val();
            padecimientos = $('#padecimientosPostEdicion').val();
            equipo="postProduccion";
            if(nombre.trim() == '' ){
                $('#nombrePostEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoPostEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoPostEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusPostEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailPostEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoPostEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1PostEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2PostEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3PostEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoPostEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirPostEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltPostEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Post(datos){
        d=datos.split('||');
        $('#id_PostEdicion').val(d[0]);
        $('#nombrePostEdicion').val(d[1]);
        $('#apellidoPostEdicion').val(d[2]);
        $('#puestoPostEdicion').val(d[3]);
        $('#estatusPostEdicion').val(d[21]);
        $('#mailPostEdicion').val(d[4]);
        $('#mailaltPostEdicion').val(d[5]);
        $('#telefonoPostEdicion').val(d[6]);
        $('#telefonoAltPostEdicion').val(d[7]);
        $('#direccionPostEdicion').val(d[8]);
        $('#direccionAltPostEdicion').val(d[9]);
        $('#redesPostEdicion').val(d[22]);
        $('#vigenciaPostEdicion').val(d[10]);
        $('#vacacionesPostEdicion').val(d[11]);
        $('#vacacionesUsadosPostEdicion').val(d[12]);
        $('#tipoPostEdicion').val(d[13]);
        $('#alergiasPostEdicion').val(d[14]);
        $('#medicamentosPostEdicion').val(d[15]);
        $('#padecimientosPostEdicion').val(d[16]);

    }
</script>


<!-- Funciones para Programacion /////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Programacion').click(function (e) {
            nombre = $('#nombreProgramacion').val();
            apellido = $('#apellidoProgramacion').val();
            puesto = $('#puestoProgramacion').val();
            estatus = $('#estatusProgramacion').val();
            correo = $('#mailProgramacion').val();
            correoalt = $('#mailaltProgramacion').val();
            tel = $('#telefonoProgramacion').val();
            telalt = $('#telefonoAltProgramacion').val();
            direccion = $('#direccionProgramacion').val();
            direccionAlt = $('#direccionAltProgramacion').val();
            redes = $('#redesProgramacion').val();
            vigencia = $('#vigenciaProgramacion').val();
            vacaciones = $('#vacacionesProgramacion').val();
            vacacionesUsadas = $('#vacacionesUsadosProgramacion').val();
            tipo = $('#tipoProgramacion').val();
            alergias = $('#alergiasProgramacion').val();
            medicamentos = $('#medicamentosProgramacion').val();
            padecimientos = $('#padecimientosProgramacion').val();
            equipo="programacion";
            if(nombre.trim() == '' ){
                $('#nombreProgramacion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoProgramacion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoProgramacion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusProgramacion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailProgramacion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoProgramacion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Programacion')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Programacion')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Programacion')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoProgramacion')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirProgramacion')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltProgramacion')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosProgramacion').click(function (e) {
            id = $('#id_ProgramacionEdicion').val();
            nombre = $('#nombreProgramacionEdicion').val();
            apellido = $('#apellidoProgramacionEdicion').val();
            puesto = $('#puestoProgramacionEdicion').val();
            estatus = $('#estatusProgramacionEdicion').val();
            correo = $('#mailProgramacionEdicion').val();
            correoalt = $('#mailaltProgramacionEdicion').val();
            tel = $('#telefonoProgramacionEdicion').val();
            telalt = $('#telefonoAltProgramacionEdicion').val();
            direccion = $('#direccionProgramacionEdicion').val();
            direccionAlt = $('#direccionAltProgramacionEdicion').val();
            redes = $('#redesProgramacionEdicion').val();
            vigencia = $('#vigenciaProgramacionEdicion').val();
            vacaciones = $('#vacacionesProgramacionEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosProgramacionEdicion').val();
            tipo = $('#tipoProgramacionEdicion').val();
            alergias = $('#alergiasProgramacionEdicion').val();
            medicamentos = $('#medicamentosProgramacionEdicion').val();
            padecimientos = $('#padecimientosProgramacionEdicion').val();
            equipo="programacion";
            if(nombre.trim() == '' ){
                $('#nombreProgramacionEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoProgramacionEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoProgramacionEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusProgramacionEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailProgramacionEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoProgramacionEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1ProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2ProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3ProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltProgramacionEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Programacion(datos){
        d=datos.split('||');
        $('#id_ProgramacionEdicion').val(d[0]);
        $('#nombreProgramacionEdicion').val(d[1]);
        $('#apellidoProgramacionEdicion').val(d[2]);
        $('#puestoProgramacionEdicion').val(d[3]);
        $('#estatusProgramacionEdicion').val(d[21]);
        $('#mailProgramacionEdicion').val(d[4]);
        $('#mailaltProgramacionEdicion').val(d[5]);
        $('#telefonoProgramacionEdicion').val(d[6]);
        $('#telefonoAltProgramacionEdicion').val(d[7]);
        $('#direccionProgramacionEdicion').val(d[8]);
        $('#redesProgramacionEdicion').val(d[22]);
        $('#direccionAltProgramacionEdicion').val(d[9]);
        $('#vigenciaProgramacionEdicion').val(d[10]);
        $('#vacacionesProgramacionEdicion').val(d[11]);
        $('#vacacionesUsadosProgramacionEdicion').val(d[12]);
        $('#tipoProgramacionEdicion').val(d[13]);
        $('#alergiasProgramacionEdicion').val(d[14]);
        $('#medicamentosProgramacionEdicion').val(d[15]);
        $('#padecimientosProgramacionEdicion').val(d[16]);

    }
</script>

<!-- Funciones para Cuentas ////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar_Cuentas').click(function (e) {
            nombre = $('#nombreCuentas').val();
            apellido = $('#apellidoCuentas').val();
            puesto = $('#puestoCuentas').val();
            estatus = $('#estatusCuentas').val();
            correo = $('#mailCuentas').val();
            correoalt = $('#mailaltCuentas').val();
            tel = $('#telefonoCuentas').val();
            telalt = $('#telefonoAltCuentas').val();
            direccion = $('#direccionCuentas').val();
            direccionAlt = $('#direccionAltCuentas').val();
            redes = $('#redesCuentas').val();
            vigencia = $('#vigenciaCuentas').val();
            vacaciones = $('#vacacionesCuentas').val();
            vacacionesUsadas = $('#vacacionesUsadosCuentas').val();
            tipo = $('#tipoCuentas').val();
            alergias = $('#alergiasCuentas').val();
            medicamentos = $('#medicamentosCuentas').val();
            padecimientos = $('#padecimientosCuentas').val();
            equipo="cuentas";
            if(nombre.trim() == '' ){
                $('#nombreCuentas').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoCuentas').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoCuentas').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusCuentas').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailCuentas').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoCuentas').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('foto1', $('#foto1Cuentas')[0].files[0]);
                    paqueteDeDatos.append('foto2', $('#foto2Cuentas')[0].files[0]);
                    paqueteDeDatos.append('foto3', $('#foto3Cuentas')[0].files[0]);
                    paqueteDeDatos.append('archivo', $('#archivoCuentas')[0].files[0]);
                    paqueteDeDatos.append('fotoDir', $('#fotoDirCuentas')[0].files[0]);
                    paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltCuentas')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('apellido', apellido);
                    paqueteDeDatos.append('puesto', puesto);
                    paqueteDeDatos.append('estatus', estatus);
                    paqueteDeDatos.append('correo', correo);
                    paqueteDeDatos.append('correoalt', correoalt);
                    paqueteDeDatos.append('tel', tel);
                    paqueteDeDatos.append('telalt', telalt);
                    paqueteDeDatos.append('direccion', direccion);
                    paqueteDeDatos.append('direccionAlt', direccionAlt);
                    paqueteDeDatos.append('redes', redes);
                    paqueteDeDatos.append('vigencia', vigencia);
                    paqueteDeDatos.append('vacaciones', vacaciones);
                    paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                    paqueteDeDatos.append('tipo', tipo);
                    paqueteDeDatos.append('alergias', alergias);
                    paqueteDeDatos.append('medicamentos', medicamentos);
                    paqueteDeDatos.append('padecimientos', padecimientos);
                    paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/agregar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //location.log(r);
                        if(r==1){
                            alertify.success("Agregado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

        $('#actualizaDatosCuentas').click(function (e) {
            id = $('#id_CuentasEdicion').val();
            nombre = $('#nombreCuentasEdicion').val();
            apellido = $('#apellidoCuentasEdicion').val();
            puesto = $('#puestoCuentasEdicion').val();
            estatus = $('#estatusCuentasEdicion').val();
            correo = $('#mailCuentasEdicion').val();
            correoalt = $('#mailaltCuentasEdicion').val();
            tel = $('#telefonoCuentasEdicion').val();
            telalt = $('#telefonoAltCuentasEdicion').val();
            direccion = $('#direccionCuentasEdicion').val();
            direccionAlt = $('#direccionAltCuentasEdicion').val();
            redes = $('#redesCuentasEdicion').val();
            vigencia = $('#vigenciaCuentasEdicion').val();
            vacaciones = $('#vacacionesCuentasEdicion').val();
            vacacionesUsadas = $('#vacacionesUsadosCuentasEdicion').val();
            tipo = $('#tipoCuentasEdicion').val();
            alergias = $('#alergiasCuentasEdicion').val();
            medicamentos = $('#medicamentosCuentasEdicion').val();
            padecimientos = $('#padecimientosCuentasEdicion').val();
            equipo="cuentas";
            if(nombre.trim() == '' ){
                $('#nombreCuentasEdicion').focus();
                return false;
            }else if(apellido.trim() == '' ){
                $('#apellidoCuentasEdicion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestoCuentasEdicion').focus();
                return false;
            }else if(estatus.trim() == '' ){
                $('#estatusCuentasEdicion').focus();
                return false;
            }else if(correo.trim() == '' ){
                $('#mailCuentasEdicion').focus();
                return false;
            }else if(tel.trim() == '' ){
                $('#telefonoCuentasEdicion').focus();
                return false;
            }else{
                e.preventDefault(); 
                var paqueteDeDatos = new FormData();
                paqueteDeDatos.append('id', id);
                paqueteDeDatos.append('foto1', $('#foto1CuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('foto2', $('#foto2CuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('foto3', $('#foto3CuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('archivo', $('#archivoCuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDir', $('#fotoDirCuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('fotoDirAlt', $('#fotoDirAltCuentasEdicion')[0].files[0]);
                paqueteDeDatos.append('nombre', nombre);
                paqueteDeDatos.append('apellido', apellido);
                paqueteDeDatos.append('puesto', puesto);
                paqueteDeDatos.append('estatus', estatus);
                paqueteDeDatos.append('correo', correo);
                paqueteDeDatos.append('correoalt', correoalt);
                paqueteDeDatos.append('tel', tel);
                paqueteDeDatos.append('telalt', telalt);
                paqueteDeDatos.append('direccion', direccion);
                paqueteDeDatos.append('direccionAlt', direccionAlt);
                paqueteDeDatos.append('redes', redes);
                paqueteDeDatos.append('vigencia', vigencia);
                paqueteDeDatos.append('vacaciones', vacaciones);
                paqueteDeDatos.append('vacacionesUsadas', vacacionesUsadas);
                paqueteDeDatos.append('tipo', tipo);
                paqueteDeDatos.append('alergias', alergias);
                paqueteDeDatos.append('medicamentos', medicamentos);
                paqueteDeDatos.append('padecimientos', padecimientos);
                paqueteDeDatos.append('equipo', equipo);

                $.ajax({
                    type:"POST",
                    url:"php/editar_personal.php",
                    data:paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false, 
                    success:function(r){
                        //console.log(r);
                        if(r==1){
                            alertify.success("Actualizado con exito");
                            location.reload();
                        }else{
                            alertify.error("Fallo el servidor");
                        }
                    }
                });
            }
        });

    });
</script>
<script>
    function form_actualizar_Cuentas(datos){
        d=datos.split('||');
        $('#id_CuentasEdicion').val(d[0]);
        $('#nombreCuentasEdicion').val(d[1]);
        $('#apellidoCuentasEdicion').val(d[2]);
        $('#puestoCuentasEdicion').val(d[3]);
        $('#estatusCuentasEdicion').val(d[21]);
        $('#mailCuentasEdicion').val(d[4]);
        $('#mailaltCuentasEdicion').val(d[5]);
        $('#telefonoCuentasEdicion').val(d[6]);
        $('#telefonoAltCuentasEdicion').val(d[7]);
        $('#direccionCuentasEdicion').val(d[8]);
        $('#direccionAltCuentasEdicion').val(d[9]);
        $('#redesCuentasEdicion').val(d[22]);
        $('#vigenciaCuentasEdicion').val(d[10]);
        $('#vacacionesCuentasEdicion').val(d[11]);
        $('#vacacionesUsadosCuentasEdicion').val(d[12]);
        $('#tipoCuentasEdicion').val(d[13]);
        $('#alergiasCuentasEdicion').val(d[14]);
        $('#medicamentosCuentasEdicion').val(d[15]);
        $('#padecimientosCuentasEdicion').val(d[16]);

    }
</script>

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


