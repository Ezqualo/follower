<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
$mysqli = new mysqli('localhost', 'root', 'password', 'db_follower');
//$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <?php
        include('modulos/navbar.php');
    ?>
    <!-- Menu principal -->

	<!-- Tabla Usuarios -->
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center"><span class="badge">PUESTOS</span></h2>
        </div>
        <!--<div class="row">
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

                $query = $mysqli -> query ("SELECT DISTINCT id, usuario, nombre, password FROM usuarios ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["usuario"] . "</font></td>";
                    echo "<td id='password' width=\"\"><font face=\"verdana\">" .
                            $row["password"]. "<span> <i class='far fa-eye'id='eye' onclick='toggle()'></i> </span>" . "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row[""] . "</font></td>";
                    echo "<td width=\"\"><font face=\"verdana\">" .
                            $row["<button class='btn'>Eliminar</button>"] . "</font></td>";
                }
                ?>
              </tbody>
            </table>
            </div>
        </div>
    </div>-->
    <!-- Tabla Usuarios -->

<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer" width: 100%;">
</footer>
<!-- Footer -->

<!-- Modal Formulario Puestos -->
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
                                <input type="text" class="form-control" id="name" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="user" name="usuario">
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2" for="perfil">Perfil:</label>
                                <select class="custom-select mr-sm-2" id="perfil" name="perfil">
                                  <option disabled selected>-- Seleccionar --</option>
                                  <option value="1">Administrador</option>
                                  <option value="2">Cuentas</option>
                                  <option value="3">Cliente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="col-form-label">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Agregar Usuario">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="guardar_usuario">Cerrar</button>
                            <?php
                                if (isset($_POST['submit'])){
                                    include ('../bd/save_usuario.php');
                                }
                            ?>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Usuario</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Formulario Puestos -->



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
