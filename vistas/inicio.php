<?php
session_start();

if($_SESSION["s_usuario"] === null) {
	header("Location: ../index.php");
}else{
    if($_SESSION["s_idRol"]==2) {
        header("Location: cuentas.php");
    }else{
        if($_SESSION["s_idRol"]==3) {
            header("Location: clientes.php");
        }
    }
}

if($_SESSION["s_genero"] == "Mujer") {
	$_SESSION["genero"] = "¡Bienvenida!"; 
}else{
	$_SESSION["genero"] = "¡Bienvenido!";
}
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

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Bootstrap Dropdown Hover CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-dropdownhover.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/estilo.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

</head>
<body id="fondo">
	
	<!-- Inicio pagina - Mensaje de Bienvenida y Boton Cerrar Sesión -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" align="center">
				<img src="../img/follower.png" alt="logo-principal" style="height: 150px;">
			</div>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="text-center"><?php echo $_SESSION["genero"];?></h1>
                    <h2 class="text-center"><span class=""><?php echo $_SESSION["s_nombre"];?></span></h2>
                    <hr class="my-4">
                    <!--<a href="../bd/logout.php" class="btn btn-danger btn-lg" role="button" style="float: right;">Cerrar Sesión</a>-->
					<a href="../bd/logout.php"><input  type="image" src="../img/boton_cerrar sesion.png" alt="Submit" style="float: right;"></a>
                </div>
            </div>
        </div>
	</div>

    <!-- Menu principal -->
    <?php
    include('modulos/navbar.php');
    ?>
    <!-- Menu principal -->

	<!-- JAVASCRIPT -->

	<!-- jQuery AJAX -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Dropdown Hover JS -->
    <script src="../bootstrap/js/bootstrap-dropdownhover.min.js"></script>

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
