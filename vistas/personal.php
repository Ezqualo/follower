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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center"><span class="badge">ÁREAS EZQUALO</span></h2>
        </div>
        <div class="row justify-content-center">
            <h2 class="text-center"><i class="fas fa-chevron-down" style="color: #febe10; font-size: 24px;"></i></h2>
        </div>
        <!-- Area 1 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">DIRECCIÓN</span></h5>
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
                  <th scope="col"><a href="#direccionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');

                $query1 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus, ejecutivaCuenta FROM equipoDireccion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query1)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                    echo ("<td width=\"\"><font face=\"verdana\">" .
                            $row . "<button class='btn btn-block' value='Editar'></input>" . "</font></td>");
                    echo ("<td width=\"\"><font face=\"verdana\">" .
                            $row . "<button class='btn btn-block' value='Eliminar'></input>" . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 2 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">ÁRTE</span></h5>
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
                  <th scope="col"><a href="#arteModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                echo "<meta charset='UTF-8'>";
                include('../bd/conect_db.php');

                $query = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus, ejecutivaCuenta FROM equipoArte ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                    echo ("<td width=\"\"><font face=\"verdana\">" .
                            $row . "<button class='btn btn-block' value='Editar'></input>" . "</font></td>");
                    echo ("<td width=\"\"><font face=\"verdana\">" .
                            $row . "<button class='btn btn-block' value='Eliminar'></input>" . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 3 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">ILUSTRACIÓN</span></h5>
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
                  <th scope="col"><a href="#ilustracionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query2 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoIlustracion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query2)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row . "<button class='btn btn_block' value='Editar'></input>" . "<button class='btn' value='Eliminar'></input>" . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 4 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">COPY Y CORRECCIÓN DE ESTILO</span></h5>
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
                  <th scope="col"><a href="#copyModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query3 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoCopyCorreccion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query3)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "<button class='btn btn_block' value='Editar'></input>" . "<button class='btn' value='Eliminar'></input>" . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 5 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">ESTRATEGÍA</span></h5>
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
                  <th scope="col"><a href="#estrategiaModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query4 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoEstrategia ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query4)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 6 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">ADMINISTRACIÓN</span></h5>
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
                  <th scope="col"><a href="#administracionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query5 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoAdministracion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query5)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 7 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">POST-PRODUCCIÓN</span></h5>
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
                  <th scope="col"><a href="#postproduccionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query6 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoPostProduccion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query6)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
                }
                ?>
              </tbody>
            </table>
        </div>
        <!-- Area 8 -->
        <div class="row justify-content-center">
            <h5 class="text-center"><span class="badge">PROGRAMACIÓN</span></h5>
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
                  <th scope="col"><a href="#programacionModal" data-toggle="modal" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('../bd/conect_db.php');

                $query7 = $mysqli -> query ("SELECT DISTINCT id, nombre, puesto, correo, estatus FROM equipoProgramacion ORDER BY id ASC");
                //$query2 = $mysqli -> query ("SELECT roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol");
                while ($row = mysqli_fetch_array($query7)) {
                echo "<tr><td width=\"\"><font< face=\"verdana\">" .
                            $row["id"] . "</font></td>";
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["nombre"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["puesto"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["correo"] . "</font></td>");
                    echo utf8_encode("<td width=\"\"><font face=\"verdana\">" .
                            $row["estatus"] . "</font></td>");
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

<!-- Modal Formulario Direccion -->
<div class="modal fade" id="direccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Direccion -->

<!-- Modal Formulario Arte -->
<div class="modal fade" id="arteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Arte -->

<!-- Modal Formulario Ilustracion -->
<div class="modal fade" id="ilustracionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Ilustracion -->

<!-- Modal Formulario Copy y Correción de Estilo -->
<div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Copy y Correción de Estilo</h5>
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
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Copy y Correción de Estilo -->

<!-- Modal Formulario Estrategia -->
<div class="modal fade" id="estrategiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Estrategía</h5>
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
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Estrategia -->

<!-- Modal Formulario Administración -->
<div class="modal fade" id="administracionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                                <label for="name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Administración -->

<!-- Modal Formulario Post-Producción -->
<div class="modal fade" id="postproduccionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Post-Producción</h5>
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
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Post-Producción -->

<!-- Modal Formulario Programación -->
<div class="modal fade" id="programacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Programación</h5>
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
                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="user" name="usuario" placeholder="Puesto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="email" placeholder="correo@ezqualo.com">
                            </div>
                            <div class="form-group">
                                <label for="estatus" class="col-form-label">Estatus:</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus">
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
<!-- Modal Formulario Programación -->


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
