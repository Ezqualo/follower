<?php
session_start();
unset($_SESSION['consulta']);

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
$mysqli = new mysqli('localhost', 'root', 'password', 'db_follower');
//$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
$subject = $_GET['nom_proy'];
$subject2 = $_GET['nom_pieza'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../tablas/librerias/select2/css/select2.css">

    <script src="../tablas/librerias/jquery-3.2.1.min.js"></script>
    <script src="../tablas/js/funciones.js"></script>
    <script src="../tablas/librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../tablas/librerias/alertifyjs/alertify.js"></script>
    <script src="../tablas/librerias/select2/js/select2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema Follower Ezqualo">
    <meta name="author" content="Xavier Escamilla, Ivan Salazar">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- Bootstrap Table Treegrid -->
    <link rel="stylesheet" href="../bootstrap/jquery-treegrid-master/css/jquery.treegrid.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body id="fondo">

<!-- Logo Vista y Boton Cerrar Sesión -->
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">
            <img id="img-principal" src="../img/pantalla4.png" width="75%">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="../bd/logout.php"><input type="image" src="../img/boton_cerrar sesion.png" alt="Submit"
                                              style="float: right;"></a>
        </div>
    </div>
</div>
<!-- Logo Vista y Boton Cerrar Sesión -->

<!-- Menu principal -->
<?php
include('../vistas/modulos/navbar.php');
?>
<!-- Menu principal -->

<div class="container">
    <div id="tabla"></div>
</div>

<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
            </div>
            <div class="modal-body">
                <label>Nombre</label>
                <input type="text" name="" id="nombre" class="form-control input-sm">
                <label>Apellido</label>
                <input type="text" name="" id="apellido" class="form-control input-sm">
                <label>Email</label>
                <input type="text" name="" id="email" class="form-control input-sm">
                <label>telefono</label>
                <input type="text" name="" id="telefono" class="form-control input-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            </div>
            <div class="modal-body">
                <input type="text" hidden="" id="idpersona" name="">
                <label>Nombre</label>
                <input type="text" name="" id="nombreu" class="form-control input-sm">
                <label>Apellido</label>
                <input type="text" name="" id="apellidou" class="form-control input-sm">
                <label>Email</label>
                <input type="text" name="" id="emailu" class="form-control input-sm">
                <label>telefono</label>
                <input type="text" name="" id="telefonou" class="form-control input-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar
                </button>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="position-sticky">
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Fin Footer -->

<!-- JQuery -->
<script src="../jquery/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="../popper/popper.min.js"></script>

<!-- Sweet Alert 2 JS -->
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Bootstrap Table JS -->
<script type="text/javascript" src="../bootstrap/jquery-treegrid-master/js/jquery.treegrid.js"></script>
<script type="text/javascript">
    $('.tree').treegrid();
</script>

<!-- Custom JS -->
<script src="../js/codigo.js"></script>

<!-- Ionic Iconos -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla').load('../tablas/componentes/tabla.php');
        $('#buscador').load('../tablas/componentes/buscador.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo').click(function () {
            nombre = $('#nombre').val();
            apellido = $('#apellido').val();
            email = $('#email').val();
            telefono = $('#telefono').val();
            agregardatos(nombre, apellido, email, telefono);
        });


        $('#actualizadatos').click(function () {
            actualizaDatos();
        });

    });
</script>