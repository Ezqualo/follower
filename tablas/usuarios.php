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
    <script src="js/funciones_usuarios.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    
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

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">

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
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center"><span>USUARIOS</span></h2>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Contraseña</th>
                  <th scope="col">Perfil</th>
                  <th scope="col"><a href="#exampleModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query = $mysqli -> query ("SELECT DISTINCT id, usuario, genero, nombre, password, idRol FROM usuarios ORDER BY id ASC");
                
                while ($row = mysqli_fetch_array($query)) {
                    $datos=$row[0]."||".
                                $row[1]."||".
                                $row[2]."||".
                                $row[3]."||".
                                $row[4]."||".
                                $row[5];
                                
                    echo utf8_encode("<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["usuario"] . "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["password"]. "</font></td>";
                            //$row["password"]. "<span> <i class='far fa-eye'id='eye' onclick='toggle()'></i> </span>" . "</font></td>";
                    $nombre_usuario = $row["nombre"];
                            $query2 = $mysqli -> query ("SELECT idRol FROM usuarios WHERE nombre = '$nombre_usuario'");
                            while ($row2 = mysqli_fetch_array($query2)) {
                                if($row2["idRol"] == 1){
                                    $rol = "Administrador";
                                } elseif($row2["idRol"] == 2) {
                                    $rol = "Cuentas";
                                } elseif($row2["idRol"] == 3) {
                                    $rol = "Clientes";
                                }
                                echo utf8_encode( "<td width=\"\"><font face=\"verdana\">" .
                                $rol . "</font></td>");
                                
                            }
                ?>

                <td>
                    <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo $datos ?>')">
                        <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                
                    <button class="btn" onclick="preguntarSiNo('<?php echo $row["id"] ?>')">
                        <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
                    </button>
                </td>

                <?php
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

<!-- Modal Formulario Usuarios -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuarios</h5>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2" for="genero">Género:</label>
                                <select class="custom-select mr-sm-2" id="genero" name="genero">
                                  <option disabled selected>-- Seleccionar --</option>
                                  <option value="Hombre">Hombre</option>
                                  <option value="Mujer">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mr-sm-2" for="perfil">Perfil:</label>
                                <select class="custom-select mr-sm-2" id="idRol" name="idRol">
                                  <option disabled selected>-- Seleccionar --</option>
                                  <option value="Administrador">Administrador</option>
                                  <option value="Cuentas">Cuentas</option>
                                  <option value="Cliente">Cliente</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar_usuario">Agregar Usuario</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                            
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario Usuarios -->

<!-- Modal Formulario Edit Usuarios -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" id="idusuario" name="" hidden>
                                <label for="nombreu" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreu" name="nombreu" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="usuariou" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="usuariou" name="usuariou">
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2" for="generou">Género:</label>
                                <select class="custom-select mr-sm-2" id="generou" name="generou">
                                  <option disabled selected>-- Seleccionar --</option>
                                  <option value="Hombre">Hombre</option>
                                  <option value="Mujer">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mr-sm-2" for="idRolu">Perfil:</label>
                                <select class="custom-select mr-sm-2" id="idRolu" name="idRolu">
                                  <option disabled selected>-- Seleccionar --</option>
                                  <option value="Administrador">Administrador</option>
                                  <option value="Cuentas">Cuentas</option>
                                  <option value="Cliente">Cliente</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="passwordu" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="passwordu" name="passwordu">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Editar Usuario</button>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardar_usuario').click(function () {
            usuario = $('#usuario').val();
            genero = $('#genero').val();
            nombre = $('#nombre').val();
            password = $('#password').val();
            Rol = $('#idRol').val();
            estatus = "En Linea";
            
            if(Rol == "Administrador"){
                idRol = 1;
            }else if(Rol == "Cuentas"){
                idRol = 2;
            }else if(Rol == "Cliente"){
                idRol = 3;
            }
            //alert(Rol);
            agregardatos(usuario,genero,nombre,password,idRol,estatus);
        });

        $('#actualizadatos').click(function () {
            actualizaDatos();
        });
    });
</script>

<script>
    function form_actualizar(datos){

    d=datos.split('||');

        $('#idusuario').val(d[0]);
        $('#usuariou').val(d[1]);
        $('#generou').val(d[2]);
        $('#nombreu').val(d[3]);
        $('#passwordu').val(d[4]);
        
        if(d[5] == 1){
            idRol = "Administrador";
        }else if(d[5] == 2){
            idRol = "Cuentas";
        }else if(d[5] == 3){
            idRol = "Cliente";
        }
        $('#idRolu').val(idRol);

    }
</script>
