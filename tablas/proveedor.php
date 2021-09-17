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
    <script src="js/funciones_proveedores.js"></script>
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
        
        .ubi:hover{background-color:none;}
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

	<!-- Tabla Usuarios -->
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center"><span>PROVEEDORES</span></h2>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">RFC</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col"><a href="#exampleModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query = $mysqli -> query ("SELECT DISTINCT * FROM proveedores ORDER BY id ASC");
                $contador=1;
                while ($row = mysqli_fetch_array($query)) {
                    $datos= $row[0]."||".
                            $row[1]."||".
                            $row[2]."||".
                            $row[3]."||".
                            $row[4]."||".
                            $row[5]."||".
                            $row[6]."||".
                            $row[7]."||".
                            $row[9]."||".
                            $row[10]."||".
                            $row[11]."||".
                            $row[12]."||".
                            $row[13]."||".
                            $row[14]."||".
                            $row[15]."||".
                            $row[16]."||".
                            $row[8];
                                
                    echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $contador . "</font></td>";
                    // -----------------------------------------------------------------------------------------------------------
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">");
                ?>
                <a data-toggle="modal" data-target="#visual_proveedor" onclick="mostrarProveedor('<?php echo utf8_encode($datos); ?>')">
                <?php
                //------------------------------------------------------------------------------------------------------------
                    echo utf8_encode(''.$row["proveedor"] . '</a></font></td>');
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["direccion"] . "</font></td>");
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["rfc"]. "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombrePersona"]. "</font></td>");
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["correoPersona"]. "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["telefono"]. "</font></td>";
                            //$row["password"]. "<span> <i class='far fa-eye'id='eye' onclick='toggle()'></i> </span>" . "</font></td>";
                ?>

                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNoProveedor('<?php echo $row["id"] ?>')">
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
    <!-- Tabla Usuarios -->

<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Footer -->

<!-- Modal de visualizacion-->
<div class="modal fade" id="visual_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background-color:black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" align="center">
                        <image src="../img/proveedor_header.png" style="width:40% ;"><br>
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
                    <label class="col-form-label txt" id="LabelProveedor" ></label><br>
                    <label class="col-form-label txt" id="LabelDireccion" ></label><br>
                    <label class="col-form-label txt" id="LabelRfc" ></label><br>
                    <label class="col-form-label txt" id="LabelBanco" ></label><br>
                    <label class="col-form-label txt" id="LabelWeb" ></label><br>
                    <label class="col-form-label txt" id="LabelRedesSociales" ></label><br>
                    <label class="col-form-label txt" id="LabelNombre" ></label><br>
                    <label class="col-form-label txt" id="LabelCorreo" ></label><br>
                    <label class="col-form-label txt" id="LabelTelefono" ></label><br>
                    <label class="col-form-label txt" id="LabelCel" ></label><br>
                    <label class="col-form-label txt" id="LabelDescripcion" ></label><br>
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


<!-- Modal Formulario Proveedor -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="proveedor" class="col-form-label">Proveedor:</label>
                                <input type="text" class="form-control" id="proveedor" name="proveedor" autofocus placeholder="Proveedor" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="rfc" class="col-form-label">RFC:</label>
                                <input type="text" class="form-control" id="rfc" name="rfc" autofocus placeholder="RFC">
                            </div>
                            <div class="form-group">
                                <label for="banco" class="col-form-label">Banco:</label>
                                <input type="text" class="form-control" id="banco" name="banco" autofocus placeholder="Banco">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="clabe" class="col-form-label">Clabe:</label>
                                <input type="text" class="form-control" id="clabe" name="clabe" placeholder="Clabe">
                            </div>
                            <div class="form-group">
                                <label for="cuenta" class="col-form-label">Cuenta:</label>
                                <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Cuenta">
                            </div>
                            <div class="form-group">
                                <label for="pagina" class="col-form-label">Página Web:</label>
                                <input type="text" class="form-control" id="pagina" name="pagina" placeholder="proveedor.com">
                            </div>
                            <div class="form-group">
                                <label for="redes" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redes" name="redes" placeholder="Facebook,Twitter, Youtube.... " required>
                            </div>
                            <div class="form-group">
                                <label for="persona" class="col-form-label">Persona de Contacto:</label>
                                <input type="text" class="form-control" id="persona" name="persona" placeholder="Persona de Contacto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="correo" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="correo" name="correo" placeholder="usuario@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-form-label">Celular:</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                            </div>
                        </div>
                    </div>
                    <div class="col justify-content-center" style="text-align:center;">
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
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar_proveedor">Agregar Proveedor</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario Proveedor -->

<!-- Modal Formulario Edit Proveedor -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="id_proveedor" name="" hidden>
                                <label for="proveedoru" class="col-form-label">Proveedor:</label>
                                <input type="text" class="form-control" id="proveedoru" name="proveedoru" autofocus placeholder="Proveedor" required>
                            </div>
                            <div class="form-group">
                                <label for="direccionu" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccionu" name="direccionu" placeholder="Dirección" required>
                            </div>
                            <div class="form-group">
                                <label for="rfcu" class="col-form-label">RFC:</label>
                                <input type="text" class="form-control" id="rfcu" name="rfcu" autofocus placeholder="RFC" required>
                            </div>
                            <div class="form-group">
                                <label for="bancou" class="col-form-label">Banco:</label>
                                <input type="text" class="form-control" id="bancou" name="bancou" autofocus placeholder="Banco" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="clabeu" class="col-form-label">Clabe:</label>
                                <input type="text" class="form-control" id="clabeu" name="clabeu" placeholder="Clabe" required>
                            </div>
                            <div class="form-group">
                                <label for="cuentau" class="col-form-label">Cuenta:</label>
                                <input type="text" class="form-control" id="cuentau" name="cuentau" placeholder="Cuenta" required>
                            </div>
                            <div class="form-group">
                                <label for="paginau" class="col-form-label">Página Web:</label>
                                <input type="text" class="form-control" id="paginau" name="paginau" placeholder="proveedor.com" required>
                            </div>
                            <div class="form-group">
                                <label for="redesu" class="col-form-label">Redes Sociales:</label>
                                <input type="text" class="form-control" id="redesu" name="redesu" placeholder="Facebook,Twitter, Youtube.... " required>
                            </div>
                            <div class="form-group">
                                <label for="personau" class="col-form-label">Persona de Contacto:</label>
                                <input type="text" class="form-control" id="personau" name="personau" placeholder="Persona de Contacto" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="correou" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="correou" name="correou" placeholder="usuario@ezqualo.com" required>
                            </div>
                            <div class="form-group">
                                <label for="telefonou" class="col-form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefonou" name="telefonou" placeholder="Teléfono" required>
                            </div>
                            <div class="form-group">
                                <label for="celularu" class="col-form-label">Celular:</label>
                                <input type="text" class="form-control" id="celularu" name="celularu" placeholder="Celular" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcionu" class="col-form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcionu" name="descripcionu" placeholder="Descripción" required>
                            </div>
                        </div>
                    </div>
                    <div class="col justify-content-center" style="text-align:center;">
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
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatosProveedor">Editar Proveedor</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario Edit Proveedor -->

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
        
        const removeAccents = (str) => {
  		return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
	} 
            function mostrarProveedor(datos){

                d=datos.split('||');
                cadena = removeAccents(d[2]);
                cadena= cadena.replace(/ /g, "+");
                linkdireccion="https://www.google.com.mx/maps/place/"+cadena;
                link="<a id='ubi' href='"+linkdireccion+"' target='_blank'> <ion-icon name='pin' style='pointer-events:none; width: 20px; height: 20px; color: #fdbe0f;'></ion-icon> </a>";
                
                if(d[13]!=""){
                    $("#img1").attr("src","../img/proveedores/"+d[13]);
                }else{
                    $("#img1").attr("src","../img/proveedores/profile.png");
                }
                if(d[14]!=""){
                    $("#img2").attr("src","../img/proveedores/"+d[14]);
                }else{
                    $("#img2").attr("src","../img/proveedores/profile.png");
                }
                if(d[15]!=""){
                    $("#img3").attr("src","../img/proveedores/"+d[15]);
                }else{
                    $("#img3").attr("src","../img/proveedores/profile.png");
                }
                tx= "<a href='http://"+d[7]+"' style='color: #FFC500;'> <span class='glyphicon glyphicon-download-alt' aria-hidden='true'>"+d[7]+"</span> </a>";
                $('#LabelProveedor').html("<b>"+d[1]+"</b>");
                $('#LabelDireccion').html("Direccion: "+d[2]+" "+link);  
                $('#LabelRfc').html("RFC: "+d[3]); 
                $('#LabelBanco').html("Banco: "+d[4]+" clabe "+d[5]+" cuenta: "+d[6]);
                 
                $('#LabelWeb').html(tx);
                $('#LabelRedesSociales').html("Redes Sociales: <br>"+d[16]);
                $('#LabelNombre').html("&nbsp;&nbsp;&nbsp;&nbsp;Persona de Contacto: "+d[8]); 
                $('#LabelCorreo').html("&nbsp;&nbsp;&nbsp;&nbsp;Correo: "+d[9]);
                $('#LabelTelefono').html("&nbsp;&nbsp;&nbsp;&nbsp;Telefono: "+d[10]);
                $('#LabelCel').html("&nbsp;&nbsp;&nbsp;&nbsp;Celular: "+d[11]);
                $('#LabelDescripcion').html("Descripcion: <br>"+d[12]);
                
            }
        </script>
<script>
    function form_actualizar(datos){
        //alert(datos);
    d=datos.split('||');
	//alert(datos);
        $('#id_proveedor').val(d[0]);
        $('#proveedoru').val(d[1]);
        $('#direccionu').val(d[2]);
        $('#rfcu').val(d[3]);
        $('#bancou').val(d[4]);
        $('#clabeu').val(d[5]);
        $('#cuentau').val(d[6]);
        $('#paginau').val(d[7]);
        $('#personau').val(d[8]);
        $('#correou').val(d[9]);
        $('#telefonou').val(d[10]);
        $('#celularu').val(d[11]);
        $('#descripcionu').val(d[12]);
        $('#redesu').val(d[16]);

    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardar_proveedor').click(function (e) {
            
            proveedor = $('#proveedor').val();
            direccion = $('#direccion').val();
            rfc = $('#rfc').val();
            banco = $('#banco').val();
            clabe = $('#clabe').val();
            cuenta = $('#cuenta').val();
            pagina = $('#pagina').val();
            persona = $('#persona').val();
            correo = $('#correo').val();
            telefono = $('#telefono').val();
            celular = $('#celular').val();
            descripcion = $('#descripcion').val();
            redes = $('#redes').val();
            
	    if(proveedor.trim() == '' ){
                $('#proveedor').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccion').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccion').focus();
                return false;
            }else if(rfc.trim() == '' ){
                $('#rfc').focus();
                return false;
            }else if(banco.trim() == '' ){
                $('#banco').focus();
                return false;
            }else if(clabe.trim() == '' ){
                $('#clabe').focus();
                return false;
            }else if(cuenta.trim() == '' ){
                $('#cuenta').focus();
                return false;
            }else if(pagina.trim() == '' ){
                $('#pagina').focus();
                return false;
            }else if(persona.trim() == '' ){
                $('#persona').focus();
                return false;  
            }else if(correo.trim() == '' ){
                $('#correo').focus();
                return false; 
            }else if(telefono.trim() == '' ){
                $('#telefono').focus();
                return false;  
            }else if(celular.trim() == '' ){
                $('#celular').focus();
                return false; 
            }else if(descripcion.trim() == '' ){
                $('#descripcion').focus();
                return false;    
            }else{
		    e.preventDefault(); 
		    var paqueteDeDatos = new FormData();
		    paqueteDeDatos.append('foto1', $('#foto1')[0].files[0]);
		    paqueteDeDatos.append('foto2', $('#foto2')[0].files[0]);
		    paqueteDeDatos.append('foto3', $('#foto3')[0].files[0]);
		    paqueteDeDatos.append('proveedor', proveedor);
		    paqueteDeDatos.append('direccion', direccion);
		    paqueteDeDatos.append('rfc', rfc);
		    paqueteDeDatos.append('banco', banco);
		    paqueteDeDatos.append('clabe', clabe);
		    paqueteDeDatos.append('cuenta', cuenta);
		    paqueteDeDatos.append('pagina', pagina);
		    paqueteDeDatos.append('persona', persona);
		    paqueteDeDatos.append('correo', correo);
		    paqueteDeDatos.append('telefono', telefono);
		    paqueteDeDatos.append('celular', celular);
		    paqueteDeDatos.append('descripcion', descripcion);
		    paqueteDeDatos.append('redes', redes);

		    //alert(paqueteDeDatos);
		    $.ajax({
		        type:"POST",
		        url:"php/save_proveedor.php",
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

        $('#actualizadatosProveedor').click(function (e) {
            
            id = $('#id_proveedor').val();
            proveedor = $('#proveedoru').val();
            direccion = $('#direccionu').val();
            rfc = $('#rfcu').val();
            banco = $('#bancou').val();
            clabe = $('#clabeu').val();
            cuenta = $('#cuentau').val();
            pagina = $('#paginau').val();
            persona = $('#personau').val();
            correo = $('#correou').val();
            telefono = $('#telefonou').val();
            celular = $('#celularu').val();
            descripcion = $('#descripcionu').val();
            redes = $('#redesu').val();
            
            if(proveedor.trim() == '' ){
                $('#proveedoru').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccionu').focus();
                return false;
            }else if(direccion.trim() == '' ){
                $('#direccionu').focus();
                return false;
            }else if(rfc.trim() == '' ){
                $('#rfcu').focus();
                return false;
            }else if(banco.trim() == '' ){
                $('#bancou').focus();
                return false;
            }else if(clabe.trim() == '' ){
                $('#clabeu').focus();
                return false;
            }else if(cuenta.trim() == '' ){
                $('#cuentau').focus();
                return false;
            }else if(pagina.trim() == '' ){
                $('#paginau').focus();
                return false;
            }else if(persona.trim() == '' ){
                $('#personau').focus();
                return false;  
            }else if(correo.trim() == '' ){
                $('#correou').focus();
                return false; 
            }else if(telefono.trim() == '' ){
                $('#telefonou').focus();
                return false;  
            }else if(celular.trim() == '' ){
                $('#celularu').focus();
                return false; 
            }else if(descripcion.trim() == '' ){
                $('#descripcionu').focus();
                return false;    
            }else{
		    e.preventDefault(); 
		    var paqueteDeDatos1 = new FormData();
		    paqueteDeDatos1.append('id', id);
		    paqueteDeDatos1.append('foto1', $('#foto1u')[0].files[0]);
		    paqueteDeDatos1.append('foto2', $('#foto2u')[0].files[0]);
		    paqueteDeDatos1.append('foto3', $('#foto3u')[0].files[0]);
		    paqueteDeDatos1.append('proveedor', proveedor);
		    paqueteDeDatos1.append('direccion', direccion);
		    paqueteDeDatos1.append('rfc', rfc);
		    paqueteDeDatos1.append('banco', banco);
		    paqueteDeDatos1.append('clabe', clabe);
		    paqueteDeDatos1.append('cuenta', cuenta);
		    paqueteDeDatos1.append('pagina', pagina);
		    paqueteDeDatos1.append('persona', persona);
		    paqueteDeDatos1.append('correo', correo);
		    paqueteDeDatos1.append('telefono', telefono);
		    paqueteDeDatos1.append('celular', celular);
		    paqueteDeDatos1.append('descripcion', descripcion);
		    paqueteDeDatos1.append('redes', redes);
		
			//alert(direccion);
		    $.ajax({
		        type:"POST",
		        url:"php/actualizar_proveedor.php",
		        data:paqueteDeDatos1,
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
