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

    <script src="../jquery/jquery-3.6.0.min.js"></script>

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
                <img id="img-principal" src="../img/pantalla4.png" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="../bd/logout.php"><input type="image" src="../img/boton_cerrar sesion.png" alt="Submit" style="float: right;"></a>
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
                                <?php
                                if($useridRol == 1){
                                ?>
									<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
                                    <div class="dropdown" style="border-radius: 8px;">
										<input type="image" onClick="parent.location='#'" src="../img/btncatalogos_blanco.png" onMouseOver="this.src='../img/btncatalogos_amarillo.png'" onMouseOut="this.src='../img/btncatalogos_blanco.png'" style="height: 35px;">
										<div class="dropdown-content" style="border-radius: 8px; border:2px solid #febe10;">
                                            					<a href="../tablas/usuarios.php">Usuarios</a>
										<a href="../tablas/personal.php">Ezqualo</a>
										<a href="../tablas/vista_clientes.php">Clientes</a>
										<a href="../tablas/proveedor.php">Proveedores</a>
										<a href="../tablas/archivero.php">Archivero</a>
										</div>
									</div>
                                <?php
                                } else if($useridRol == 2){
                                ?>
                                	<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
                                <?php							
                                } 
                                ?>
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

    <!-- Busqueda -->
    <div class="container-fluid" align="center">
        <!--<div class="spacer">-->
        <div class="container container_main" style="max-width: 80%;">
            <br>
            <!-- <div class="row justify-content-center">
                <h5 class="text-center"><span class="badge">COPY Y CORRECCIÓN DE ESTILO</span></h5>
            </div> -->
            <br>
            <form action="proyectos.php" method="POST" name="form_odt" enctype="multipart/form-data">
                <!-- para regresar solo borrar el enctype -->
                <div class="row" id="form-center" name="personal">
                    <div class="forms-odt field_wrapper2">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo">Ejecutivas</label>
                        <select class="form-control" style="width: 350px; height: 45px;" name="ejecutivas" id="ejecutivas" onchange="selectCuentas(this.value)">
                            <?php
                            include ('../bd/conect_db.php');
                            if($useridRol == 1){
                                $query = $mysqli -> query ("SELECT DISTINCT nombre, apellido, correo FROM equipoCuentas");
                                while ($valores = mysqli_fetch_array($query)) {
                                    $nombreCompleto = $valores[nombre] . ' ' . $valores[apellido];
                                    echo utf8_encode('<option value="'.$valores[correo].'">'.$nombreCompleto.'</option>');
                                }
                            } else{
                                //include ('../bd/conect_db.php');
                                $query2 = $mysqli -> query ("SELECT DISTINCT nombre, apellido FROM equipoCuentas WHERE correo = '$userlogin'");
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                    $nombreCompleto = $valores2[nombre] . ' ' . $valores2[apellido];
                                }
                                echo utf8_encode('<option value="'.$userlogin.'">'.$nombreCompleto.'</option>');
                            }
                            ?>
                            <option value="1" selected="true" disabled="disabled">Seleccione Ejecutiva</option>
                        </select>
                    </div>
                    <div class="forms-odt field_wrapper">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo">Marca</label>
                        <select class="form-control" style="width: 350px; height: 45px;" name="marcas" id="marcas" onchange="evaluarContenido(this.value)">
                            <?php
                            //include('../modulos/select_marca_busqueda.php');
                            ?>
                            <!-- <option value="Todos">Todos</option> -->
                            <option value="" disabled selected>--Seleccionar--</option>
                        </select>
                    </div>
                    <div class="forms-odt field_wrapper2">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo">Cliente</label>
                        <select class="form-control" style="width: 350px; height: 45px;" name="clientes" id="clientes">
                            <option value="" disabled selected>--Seleccionar--</option>
                        </select>
                    </div>
                    <div class="field_wrapper3">
                        <button class="boton_personalizado" id="buscar" href="#">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Busqueda -->

    <!-- Footer -->
    <footer class="fixed-bottom">
        <image src="../img/pantalla2_.png" class="img-footer">
    </footer>
    <!-- Footer -->

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



<style type="text/css">
    .boton_personalizado {
        text-decoration: none;
        padding: 10px;
        font-weight: 600;
        font-size: 20px;
        color: #ffffff;
        width: 120px;
        background-color: #febe10;
        border-radius: 6px;
        border: 2px solid #febe10;
    }

    .boton_personalizado:hover {
        color: #000000;
        background-color: #febe10;
    }
</style>



<script>function selectCuentas(cuentas){
        $('#marcas option').remove();
        $('#clientes option').remove();
        //Contenido(cadenaIngresada); p.posadas@ezqualo.com elizabeth.reyes@ezqualo.com ana.corona@ezqualo.com ricardo.barajas@ezqualo.com carolina.manzur@ezqualo.com
        // caterina@ezqualo.com f.rodriguez@ezqualo.com
        //alert(cuentas);
        if (cuentas == "p.posadas@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%p.posadas@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_pamela[] = $valores[empresaCliente];
            }
            array_push($marcas_pamela, "Todos");
            $correoCuentas = "p.posadas@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_pamela)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');

        } else if (cuentas == "elizabeth.reyes@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%elizabeth.reyes@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_leslie[] = $valores[empresaCliente];
            }
            array_push($marcas_leslie, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "elizabeth.reyes@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_leslie)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            // Creating a cookie after the document is ready

        } else if (cuentas == "ana.corona@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%ana.corona@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_ana[] = $valores[empresaCliente];
            }
            array_push($marcas_ana, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "ana.corona@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_ana)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            
        } else if (cuentas == "ricardo.barajas@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%ricardo.barajas@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_ricardo[] = $valores[empresaCliente];
            }
            array_push($marcas_ricardo, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "ricardo.barajas@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_ricardo)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            
        } else if (cuentas == "carolina.manzur@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%carolina.manzur@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_carolina[] = $valores[empresaCliente];
            }
            array_push($marcas_carolina, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "carolina.manzur@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_carolina)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            
        } else if (cuentas == "caterina@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%caterina@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_caterina[] = $valores[empresaCliente];
            }
            array_push($marcas_caterina, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "caterina@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_caterina)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            
        } else if (cuentas == "f.rodriguez@ezqualo.com") {
            <?php
            include ('../bd/conect_db.php');
            $consult = $mysqli -> query("SELECT DISTINCT empresaCliente FROM clientes WHERE ejecutivasCliente like '%f.rodriguez@ezqualo.com%'");
            while ($valores = mysqli_fetch_array($consult)) {
                $marcas_fer[] = $valores[empresaCliente];
            }
            array_push($marcas_fer, "Todos");
            $rolCuentas = 2;
            $correoCuentas = "f.rodriguez@ezqualo.com";
            ?>

            var list_marcas = ["<?php echo utf8_encode(implode('","', $marcas_fer)); ?>"];
            var ddlItems = document.getElementById("marcas"),itemArray = list_marcas;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }
            $('#marcas').append('<option value="1" selected="true" disabled="disabled">Seleccione Marca</option>');
            
        }
     
    }
</script>



<script>function evaluarContenido(cadenaIngresada){
        $('#clientes option').remove();
        correoCuentas = $('#ejecutivas').val();
        //alert(correoCuentas);
        ejecutarAjax();

        function ejecutarAjax(){

                //url:'../modulos/select_marca_busqueda.php',
                
                $.ajax({
                        data: {correo: correoCuentas, marca: cadenaIngresada},
                        url:'../modulos/select_marca_busqueda.php',
                        type:  'post',
                        success:  function (response) {
                                let arr = response.split(','); 
                                //alert(array);
                                var ddlItems = document.getElementById("clientes"),itemArray = arr;

                                for (var i = 0; i < itemArray.length; i++) {
                                    var opt = itemArray[i];
                                    var el = document.createElement("option");
                                    el.textContent = opt;
                                    el.value = opt;
                                    ddlItems.appendChild(el);
                                }
                        }
                });

        }
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#buscar').click(function() {
            marcas = $('#marcas').val();
            clientes = $('#clientes').val();
            ejecutivas = $('#ejecutivas').val();

            //alert(ejecutivas);
            cadena= "marcas=" + marcas +
                    "&clientes=" + clientes +
                    "&ejecutivas=" + ejecutivas;

            $.ajax({
                type:"POST",
                url:"../vistas/proyectos.php",
                data:cadena,
                success:function(r){
                    if(r==1){
                        //location.reload();
                        alertify.success("Actualizado con exito");
                    }else{
                        alertify.error("Fallo el servidor :(");
                    }
                }
            });
        });
    });
</script>
