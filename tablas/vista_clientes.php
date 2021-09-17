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
    <script src="js/funciones_clientes.js"></script>
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

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- Estilo CSS -->
	<link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/slide.css">
    <style type="text/css">
        a:hover{ background-color:#51575e;cursor: pointer;}
    </style>

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

	<!-- Tabla Clientes -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center"><span>CLIENTES</span></h2>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Puesto</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Ejecutivas</th>
                  <th scope="col"><a href="#exampleModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

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

                $query = $mysqli -> query ("SELECT DISTINCT idCliente, nombreCliente, puestoCliente, empresaCliente, mailCliente, mailalternoCliente, telCliente, waCliente, ejecutivasCliente, marcaCliente, direccion, foto1,foto2,foto3 FROM clientes ORDER BY idCliente ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                $contador=1;
                while ($row = mysqli_fetch_array($query)) {
                    $dato1="<p>";
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
                                $row[13];
                    $correo = explode(" ", $row[8]);
                    foreach($correo as $i => $value){
                        $sqlAux="SELECT nombre, apellido FROM equipoCuentas where correo='$correo[$i]'";
                        $queryAUX = $mysqli -> query ($sqlAux);
                        while ($cor = mysqli_fetch_array($queryAUX)) {
                            $dato1=$dato1.'<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$cor[nombre].' '.$cor[apellido].', '.$correo[$i].'<br>';
                        }
                        $dato1=$dato1.'</p>';

                    }
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                    // -----------------------------------------------------------------------------------------------------------
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_cliente" onclick="mostrarClientes('<?php echo utf8_encode($datos); ?>','<?php echo utf8_encode($dato1); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode(''.$row["nombreCliente"] . '</a></font></td>');

                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["empresaCliente"] . "</font></td>");

                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["marcaCliente"] . "</font></td>");

                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puestoCliente"]. "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["mailCliente"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["telCliente"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["ejecutivasCliente"] . "</font></td>");
                ?>
                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo $row["idCliente"] ?>')">
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
    </div>
    <!-- Tabla Clientes -->

<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Footer -->

<!-- Modal Formulario Clientes -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label class="empresa" for="empresa">Empresa:</label>
                  		        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa">
                            </div>
                            <div class="form-group">
                                <label class="marca" for="marca">Marca:</label>
                  		        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="puesto" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto">
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="mail" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mail" name="mail" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailalt" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailalt" name="mailalt" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="whatsapp" class="col-form-label">Teléfono Alterno:</label>
                                <input type="tel" class="form-control" id="whatsapp" name="whatsapp" placeholder="Teléfono Alterno">
                            </div>
                            <div class="form-group">
                                <label for="ejecutivas" class="col-form-label">Ejecutivas:</label>
                                <input type="text" class="form-control" id="ejecutivas" name="ejecutivas" placeholder="Ejecutivas">
                            </div>
                        </div>
                    <br>
                    <div class="row justify-content-center" >
                        <div class="form-group">
                                    <label for="foto1" class="col-form-label">Foto 1:</label>
                                    <input type="file" class="btn-secondary" id="foto1" name="foto1" accept= "image/*" >
                                </div>
                                <div class="form-group">
                                    <label for="foto2" class="col-form-label">Foto 2:</label>
                                    <input type="file" class="btn-secondary" id="foto2" name="foto2" accept= "image/*">
                                </div>
                                <div class="form-group">
                                    <label for="foto3" class="col-form-label">Foto 3:</label>
                                    <input type="file" class="btn-secondary" id="foto3" name="foto3" accept= "image/*">
                                </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="guardar_cliente">Agregar Cliente</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <br>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario clientes -->


<!-- Modal Formulario Edit Usuarios -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_cliente" name="" hidden>
                                <label for="nombreu" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreu" name="nombreu" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label class="empresau" for="empresa">Empresa:</label>
                  		        <input type="text" class="form-control" id="empresau" name="empresau" placeholder="Empresa">
                            </div>
                            <div class="form-group">
                                <label class="marcau" for="marcau">Marca:</label>
                  		        <input type="text" class="form-control" id="marcau" name="marcau" placeholder="Marca">
                            </div>
                            <div class="form-group">
                                <label for="direccionu" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccionu" name="direccionu" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="puestou" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="puestou" name="puestou" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="mailu" class="col-form-label">Mail:</label>
                                <input type="mail" class="form-control" id="mailu" name="mailu" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="mailaltu" class="col-form-label">Mail Alterno:</label>
                                <input type="mail" class="form-control" id="mailaltu" name="mailaltu" placeholder="Mail Alterno">
                            </div>
                            <div class="form-group">
                                <label for="telefonou" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefonou" name="telefonou" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="whatsappu" class="col-form-label">Teléfono Alterno:</label>
                                <input type="tel" class="form-control" id="whatsappu" name="whatsappu" placeholder="Teléfono Alterno">
                            </div>
                            <div class="form-group">
                                <label for="ejecutivasu" class="col-form-label">Ejecutivas:</label>
                                <input type="text" class="form-control" id="ejecutivasu" name="ejecutivasu" placeholder="Ejecutivas">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row justify-content-center" >
                        
                        Reemplazar Imagen:
                        <div class="form-group">
                                    <label for="foto1u" class="col-form-label">Foto 1:</label>
                                    <input type="file" class="btn-secondary" id="foto1u" name="foto1u" accept= "image/*" >
                                </div>
                                <div class="form-group">
                                    <label for="foto2u" class="col-form-label">Foto 2:</label>
                                    <input type="file" class="btn-secondary" id="foto2u" name="foto2u" accept= "image/*">
                                </div>
                                <div class="form-group">
                                    <label for="foto3u" class="col-form-label">Foto 3:</label>
                                    <input type="file" class="btn-secondary" id="foto3u" name="foto3u" accept= "image/*">
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary"  id="actualizadatos">Editar Cliente</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario Edit Usuarios -->

<!-- Modal de visualizacion-->
<div class="modal fade" id="visual_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background-color:black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" align="center">
                        <image src="../img/cliente_header.png" style="width:40% ;"><br>
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
            <div class="col" >
                <div class="form-group" ng-app="myApp" ng-controller="MyController">
                    <label class="col-form-label txt" id="LabelCliente" ></label><br>
                    <label class="col-form-label txt" id="LabelPuesto" ></label><br>
                    <label class="col-form-label txt" id="LabelResponsable" ></label><br>
                    <label class="col-form-label txt" id="LabelEmpresa" ></label><br>
                    <label class="col-form-label txt" id="LabelMarca" ></label><br>
                    <label class="col-form-label txt" id="LabelCorreo" ></label><br>
                    <label class="col-form-label txt" id="LabelCorreo1" ></label><br>
                    <label class="col-form-label txt" id="LabelTel" ></label><br>
                    <label class="col-form-label txt" id="LabelTel1" ></label><br>
                    <label class="col-form-label txt" id="LabelDireccion" ></label><br>
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

        <script>
            function mostrarClientes(datos,dato1){
                d=datos.split('||');
                d1=dato1;
                if(d[11]!=""){
                    $("#img1").attr("src","../img/clientes/"+d[11]);
                }else{
                    $("#img1").attr("src","../img/clientes/profile.png");
                }
                if(d[12]!=""){
                    $("#img2").attr("src","../img/clientes/"+d[12]);
                }else{
                    $("#img2").attr("src","../img/clientes/profile.png");
                }
                if(d[13]!=""){
                    $("#img3").attr("src","../img/clientes/"+d[13]);
                }else{
                    $("#img3").attr("src","../img/clientes/profile.png");
                }
                $('#LabelCliente').html("<b>"+d[1]+"</b>");
                $('#LabelPuesto').html("&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;"+d[2]);  
                $('#LabelResponsable').html("Responsable(s): "+d1); 
                $('#LabelEmpresa').html("Empresa: "+d[9]); 
                $('#LabelMarca').html("Marca: "+d[3]); 
                $('#LabelCorreo').html("Correo: "+d[4]); 
                $('#LabelCorreo1').html("Correo Alterno: "+d[5]);
                $('#LabelTel').html("Teléfono: "+d[6]);
                $('#LabelTel1').html("Teléfono Alterno: "+d[7]);
            }
        </script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardar_cliente').click(function (e) {
            nombre = $('#nombre').val();
            empresa = $('#empresa').val();
            marca = $('#marca').val();
            direccion = $('#direccion').val();
            puesto = $('#puesto').val();
            mail = $('#mail').val();
            mailalt = $('#mailalt').val();
            telefono = $('#telefono').val();
            whatsapp = $('#whatsapp').val();
            ejecutivas = $('#ejecutivas').val();
	    if(nombre.trim() == '' ){
                $('#nombre').focus();
                return false;
            }else if(empresa.trim() == '' ){
                $('#empresa').focus();
                return false;
            }else if(marca.trim() == '' ){
                $('#marca').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccion').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puesto').focus();
                return false;
            }else if(mail.trim() == '' ){
                $('#mail').focus();
                return false;
            }else if(mailalt.trim() == '' ){
                $('#mailalt').focus();
                return false;
            }else if(telefono.trim() == '' ){
                $('#telefono').focus();
                return false;
            }else if(whatsapp.trim() == '' ){
                $('#whatsapp').focus();
                return false;
            }else if(ejecutivas.trim() == '' ){
                $('#ejecutivas').focus();
                return false;      
            }else{
		    e.preventDefault(); 
		    var paqueteDeDatos = new FormData();
		    paqueteDeDatos.append('foto1', $('#foto1')[0].files[0]);
		    paqueteDeDatos.append('foto2', $('#foto2')[0].files[0]);
		    paqueteDeDatos.append('foto3', $('#foto3')[0].files[0]);
		    paqueteDeDatos.append('nombre', nombre);
		    paqueteDeDatos.append('empresa', empresa);
		    paqueteDeDatos.append('marca', marca);
		    paqueteDeDatos.append('puesto', puesto);
		    paqueteDeDatos.append('direccion', direccion);
		    paqueteDeDatos.append('mail', mail);
		    paqueteDeDatos.append('mailalt', mailalt);
		    paqueteDeDatos.append('telefono', telefono);
		    paqueteDeDatos.append('whatsapp', whatsapp);
		    paqueteDeDatos.append('ejecutivas', ejecutivas);

		    $.ajax({
		        type:"POST",
		        url:"php/save_cliente.php",
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

        $('#actualizadatos').click(function (e) {
            id = $('#id_cliente').val();
            nombre = $('#nombreu').val();
            empresa = $('#empresau').val();
            marca = $('#marcau').val();
            direccion = $('#direccionu').val();
            puesto = $('#puestou').val();
            mail = $('#mailu').val();
            mailalt = $('#mailaltu').val();
            telefono = $('#telefonou').val();
            whatsapp = $('#whatsappu').val();
            ejecutivas = $('#ejecutivasu').val();
	    if(nombre.trim() == '' ){
                $('#nombreu').focus();
                return false;
            }else if(empresa.trim() == '' ){
                $('#empresau').focus();
                return false;
            }else if(marca.trim() == '' ){
                $('#marcau').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccionu').focus();
                return false;
            }else if(puesto.trim() == '' ){
                $('#puestou').focus();
                return false;
            }else if(mail.trim() == '' ){
                $('#mailu').focus();
                return false;
            }else if(mailalt.trim() == '' ){
                $('#mailaltu').focus();
                return false;
            }else if(telefono.trim() == '' ){
                $('#telefonou').focus();
                return false;
            }else if(whatsapp.trim() == '' ){
                $('#whatsappu').focus();
                return false;
            }else if(ejecutivas.trim() == '' ){
                $('#ejecutivasu').focus();
                return false;      
            }else{
		    e.preventDefault(); 
		    var paqueteDeDatos1 = new FormData();
		    paqueteDeDatos1.append('id', id);
		    paqueteDeDatos1.append('foto1', $('#foto1u')[0].files[0]);
		    paqueteDeDatos1.append('foto2', $('#foto2u')[0].files[0]);
		    paqueteDeDatos1.append('foto3', $('#foto3u')[0].files[0]);
		    paqueteDeDatos1.append('nombre', nombre);
		    paqueteDeDatos1.append('empresa', empresa);
		    paqueteDeDatos1.append('marca', marca);
		    paqueteDeDatos1.append('direccion', direccion);
		    paqueteDeDatos1.append('puesto', puesto);
		    paqueteDeDatos1.append('mail', mail);
		    paqueteDeDatos1.append('mailalt', mailalt);
		    paqueteDeDatos1.append('telefono', telefono);
		    paqueteDeDatos1.append('whatsapp', whatsapp);
		    paqueteDeDatos1.append('ejecutivas', ejecutivas);

		    $.ajax({
		        type:"POST",
		        url:"php/actualizar_cliente.php",
		        data:paqueteDeDatos1,
		        contentType: false,
		        processData: false,
		        cache: false, 
		        success:function(r){
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
    function form_actualizar(datos){

    d=datos.split('||');

        $('#id_cliente').val(d[0]);
        $('#nombreu').val(d[1]);
        $('#puestou').val(d[2]);
        $('#empresau').val(d[3]);
        $('#marcau').val(d[9]);
        $('#direccionu').val(d[10]);
        $('#mailu').val(d[4]);
        $('#mailaltu').val(d[5]);
        $('#telefonou').val(d[6]);
        $('#whatsappu').val(d[7]);
        $('#ejecutivasu').val(d[8]);

    }
</script>

