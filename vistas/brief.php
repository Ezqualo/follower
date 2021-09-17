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

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet" href="../css/estilo.css">

</head>
<body id="fondo">
	<!-- Logo Vista y Boton Cerrar Sesión -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center">
				<img id="img-principal" src="../img/pantalla_brief.png" width="75%">
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
                                <?php
                                if($useridRol == 1){
                                ?>
									<input id="idodt" class="nav-item" type="image" onClick="parent.location='../vistas/odts.php'" src="../img/btnodt_blanco.png" onMouseOver="this.src='../img/btnodt_amarillo.png'" onMouseOut="this.src='../img/btnodt_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_amarillo.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_amarillo.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_blanco.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_blanco.png'" style="height: 35px;">
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
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_amarillo.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_amarillo.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/busqueda.php'" src="../img/btnproyectos_blanco.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_blanco.png'" style="height: 35px;">
                                <?php							
                                } else if($useridRol == 3){
                                ?>
                                    <input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_amarillo.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_amarillo.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/proyectos_clientes.php'" src="../img/btnproyectos_blanco.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_blanco.png'" style="height: 35px;">                                    
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

    <!-- Formulario BRIEF -->
    <div class="container-fluid" align="center">
        <!--<div class="spacer">-->
        <div class="container container_main" style="max-width: 80%;">
            <h1></h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" name="form_odt" enctype="multipart/form-data"><!-- para regresar solo borrar el enctype -->
                <div class="row" id="form-center">
                    <div class="forms-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Fecha </b>de solicitud</label>
                        <input required class="form-control" type="date" id="start1" name="fecha_entrega">
                    </div>
                    <div class="forms-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Fecha </b>de entrega</label>
                        <input required class="form-control" type="date" id="start2" name="fecha_solicitud">
                    </div>
                    <script>
                            let today = (new Date()).toISOString().substring(0, 19);
                            //alert(today);
                            document.getElementById("start1").min = today;
                            document.getElementById("start2").min = today;
                    </script>
                </div>
                <div class="row" id="form-center">
                    <div class="forms-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Nombre </b>del Proyecto</label>
                        <input required style="height:50px; width: 400px;" type="text" class="form-control" name="nombre_proyecto">
                    </div>
                </div>
                
                <?php
                //$mysqli = new mysqli('localhost', 'root', 'password', 'ezqualof_follower');
                $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
                if($useridRol == "3"){
                    $query_clientes = $mysqli->query("SELECT nombreCliente, empresaCliente, ejecutivasCliente FROM clientes WHERE mailCliente = '$userlogin'");
                    while ($valores_clientes = mysqli_fetch_array($query_clientes)) {
                        $nombreE = $valores_clientes[0];
                        $empresaE[] = $valores_clientes[1];
                        $ejecutivaE[] = $valores_clientes[2];
                    }
                    
                    $cadena = $ejecutiva;
                    $array = explode(" ", $cadena);
                    echo $array[0]; 

                    echo '<div class="row" id="form-center">
                        <div class="forms-odt">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Marca </b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="marca_c" id="marca_c" onchange="evaluarContenidoCliente(this.value)">';

                            $query_clientes = $mysqli->query("SELECT nombreCliente, marcaCliente, ejecutivasCliente FROM clientes WHERE mailCliente = '$userlogin'");
                            while ($valores_clientes = mysqli_fetch_array($query_clientes)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo utf8_encode('<option value="'.$valores_clientes[1].'">'.$valores_clientes[1].'</option>');
                            }
                            echo '<option value="" disabled selected>--Seleccionar--</option>
                            </select>
                        </div>
                        <div class="forms-odt">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Cliente </b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="cliente_c" id="cliente_c">
                                <option value="'.$nombreE.'">'.$nombreE.'</option>
                            </select>
                        </div>
                        <div class="forms-odt">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Ejecutiva </b></label>
                            <select class="form-control" style="height:60px; height: 40px;" name="ejecutiva" id="ejecutiva">
                                <option value="0" disabled selected>--Seleccionar--</option>
                            </select>
                        </div>
                    </div>';
                }else{
                    echo '<div class="row" id="form-center">
                        <div class="forms-odt">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Marca </b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="marca" id="marca" value="" onchange="evaluarContenido(this.value)">';
                
                            if($useridRol == 1){
                                $query_marcas = $mysqli->query("SELECT DISTINCT marcaCliente FROM clientes");
                                while ($valores_marcas = mysqli_fetch_array($query_marcas)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo utf8_encode('<option value="'.$valores_marcas[0].'">'.$valores_marcas[0].'</option>');
                                }
                                //include("../modulos/select_marca_odt.php");
                                echo '<option value="" disabled selected>--Seleccionar--</option>';

                            }else {
                                $query_marcas = $mysqli->query("SELECT DISTINCT marcaCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%'");
                                while ($valores_marcas = mysqli_fetch_array($query_marcas)) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo utf8_encode('<option value="'.$valores_marcas[0].'">'.$valores_marcas[0].'</option>');
                                }
                                //include("../modulos/select_marca_odt.php");
                                echo '<option value="" disabled selected>--Seleccionar--</option>';
                            }
                                
                            echo '</select>
                        </div>
                        <div class="forms-odt">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Cliente </b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="cliente" id="cliente">
                                <!--obtener el valor del select de marcas y hacer consulta en bd con ella-->
                                <option value="" disabled selected>--Seleccionar--</option>
                            </select>
                        </div>
                    </div>';
                    echo '<div class="row" id="form-center" name="personal">
                        <div class="forms-odt field_wrapper">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Áreas</b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="areas[]" id="allareas">
                                <option value="cargar();" hidden>--Seleccionar--</option>
                            </select>
                        </div>
                        <div class="forms-odt field_wrapper2">
                            <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Persona Asignada</b></label>
                            <select required class="form-control" style="height:60px; height: 40px;" name="personas[]" id="personas">
                                <option value="" hidden>--Seleccionar--</option>
                            </select>
                        </div>
                        <div class="field_wrapper3">
                            <!--<a class="add_button" title="Add field" id="addselect"><img style="color: #febe10;"/></a>-->
                            <a class="add_button" title="Add field" id="addselect" ><img style="color: #febe10;"/></a>
                        </div>
                        <div class="forms-odt field_wrapper2">
                            <a class="eliminar_select" title="" id="eliminarSelect" ><img style="color: #febe10;"/></a>
                        </div>
                    </div>';
                }                    
                ?>

                <div class="row" id="form-center">
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Contexto </b></label>
                        <textarea name="contexto" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Objetivo </b>del proyecto</label>
                        <textarea name="objetivo" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Público objetivo </b>(Target)</label>
                        <textarea name="public_objetivo" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Necesidad </b></label>
                        <textarea name="necesidad" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief-textarea">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Promesa u oferta </b>primaria a comunicar</label>
                        <textarea name="promesa" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief-textarea">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Propuesta de valor </b>(Reason to believe)</label>
                        <textarea name="propuesta" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo">
                            <b style="font-size: 20px">Justificación del beneficio </b>del producto/marca (Reason to care)</label>
                        <textarea name="justificacion" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Competencia </b></label>
                        <textarea name="competencia" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Entregables </b></label>
                        <textarea name="entregables" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                    <div class="textarea-brief">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Medios </b>a utilizar</label>
                        <textarea name="medios" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief-textarea">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Presupuesto </b></label>
                        <textarea name="presupuesto" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row" id="form-center">
                    <div class="textarea-brief-textarea">
                        <span style="color: #febe10;">◥ </span><label id="nom-campo"><b style="font-size: 20px">Observaciones </b></label>
                        <textarea name="observaciones" rows="4" type="text" class="form-control"> </textarea>
                    </div>
                </div>

                <!-- Subir archivos-->
                <div class="row text-center" style="padding-top: 10px;">
                    <div class="col-lg-12">
                        <div>
                            <h1>Subir Archivo</h1>
                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                            <div id="archivos">
                                <div">
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                    <br>
                    <button class="file_button" type="button" id="custom-button" onclick="anadirArchivo()">Agregar Archivos</button>
                </div>
                <div class="row text-center">

                    <input class="btnbrief_guardar" type="submit" value="GUARDAR" name="submit"><!-- para regresar solo borrar el onclick -->
                    <?php
                    if (isset($_POST['submit'])){
                        include ('../bd/save_brief.php');
                    }
                    ?>
                </div>
            </form>
        </div>
        <!--</div>-->
    </div>

	<!--codigo para multiples archivos -->
	 <script>
	    //Inicializamos variables a 0.
	    var contArchivos = 0;
	 
	    function anadirArchivo() { 
		    //Sumamos a la variable el número de archivos.
		    contArchivos=contArchivos+1;
		    //Agregamos el componente de tipo input
		    var div = document.createElement("div");
		    var input = document.createElement("input");
		    var a = document.createElement("a");
		    
		    //Añadimos los atributos de div
		    div.id ='archivo'+contArchivos;
		    
		    //Añadimos los atributos de input
		    input.type = 'file';
		    input.name = 'file[]';
		    input.accept= 'image/*, .docx, .xlsx, .doc, .pdf, .pptx, .odt';
		    
		    
		    //Añadimos los atributos del enlace a eliminar
		    a.href = "#";
		    a.id = 'archivo'+contArchivos;
		    a.onclick = function() {
			borrarArchivo(a.id);
		    }
		    a.text ="X";
		    
		    //Agreamos el input y enlace en el div
		    document.getElementById("archivos").appendChild(div);    
		    document.getElementById(a.id).appendChild(input);          
		    document.getElementById(a.id).appendChild(a);    
	    }
	  
	    function borrarArchivo(id){
		//Restamos el número de archivos
		contArchivos=contArchivos-1;
		
		var archivo = document.getElementById(id);    
		// Si existe el campo a eliminar...
		if (archivo){
		    divPadre = archivo.parentNode;
		    divPadre.removeChild(archivo);
		}
	    }

	</script>

	<!-- fin de codigo para multiples archivos -->
    <!-- Footer -->
    <footer>
        <image src="../img/pantalla2_.png" class="img-footer">
    </footer>
    <!-- Footer -->

    <!-- Boton Subir Archivo JS-->
    <script type = "text/javascript">
        const realFileBtn = document.getElementById("file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener('click', function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener('change', function() {
            if (realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            } else {
                customTxt.innerHTML = "No ha seleccionado el archivo";
            }
        });
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
	
	<script>
	    var dtToday = new Date();
	    
	    var month = dtToday.getMonth() + 1;
	    var day = dtToday.getDate();
	    var year = dtToday.getFullYear();
	    if(month < 10)
		month = '0' + month.toString();
	    if(day < 10)
		day = '0' + day.toString();
	    
	    var maxDate = year + '-' + month + '-' + day;
	    //alert(maxDate);
	    $('#start1').attr('min', maxDate);
	    $('#start2').attr('min', maxDate);
	</script>

</body>
</html>

<script>function evaluarContenido(cadenaIngresada){
            var evaluarCadena = cadenaIngresada.split("");
            var cadena=parseInt(evaluarCadena);
            //consulta para saber obtener el ultimo id de la tabla de odts
            <?php
            $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
            //$mysqli = new mysqli('localhost', 'root', 'password', 'ezqualof_follower');
            $query = $mysqli -> query ("SELECT id FROM odts");
            while ($row = mysqli_fetch_row($query)) {
                $ultimo = $row[0];
            }

            $ultimo_id = $ultimo;
            echo $ultimo_id;
            ?>

            var ultimo_id_odt = parseInt("<?php echo $ultimo_id ?>");
            var valor_extra = parseInt(1);
            var ultimo_idodt = ultimo_id_odt + valor_extra;

            if(ultimo_idodt == "NaN"){
                $("#id_odt").val("1-"+cadenaIngresada);
            } else{
                $("#id_odt").val(ultimo_idodt+"-"+cadenaIngresada);
            }

            $('#cliente option').remove();
            Contenido(cadenaIngresada);
        }
</script>

<script>function Contenido(cadenaIngresada){
    //alert(cadenaIngresada)
        if (cadenaIngresada == 'MICHELIN') {
            <?php
            if($useridRol == 1){
                $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'MICHELIN'");
                while ($valores = mysqli_fetch_array($query)) {
                    $clientes3[] = $valores[nombreCliente];
                }
            } else {
                $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'MICHELIN'");
                while ($valores = mysqli_fetch_array($query)) {
                    $clientes3[] = $valores[nombreCliente];
                }
            }
            
            ?>

            var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes3)); ?>"];
            var ddlItems = document.getElementById("cliente"),itemArray = list_clientes;

            for (var i = 0; i < itemArray.length; i++) {
                var opt = itemArray[i];
                var el = document.createElement("option");
                el.textContent = opt;
                el.value = opt;
                ddlItems.appendChild(el);
            }

        } else if(cadenaIngresada == 'MICHELIN CAC' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'MICHELIN CAC'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes10[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'MICHELIN CAC'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes10[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes10)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'BFGOODRICH' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'BFGOODRICH'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes1[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'BFGOODRICH'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes1[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes1)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'ACUVUE' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'ACUVUE'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes2[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'ACUVUE'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes2[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes2)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if (cadenaIngresada == "BRASKEM") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'BRASKEM'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes4[] = $valores[nombreCliente];
                    }
                } else {
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'BRASKEM'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes4[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes4)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if (cadenaIngresada == "UNIROYAL") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'UNIROYAL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes5[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'UNIROYAL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes5[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes5)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if (cadenaIngresada == "DOGUI" || cadenaIngresada == "GATI" || cadenaIngresada == "PETMASTER" || cadenaIngresada == "KEYCAN" || cadenaIngresada == "CARGILL") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE empresaCliente = 'CARGILL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes6[] = $valores[nombreCliente];
                    }

                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND empresaCliente = 'CARGILL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes6[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes6)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if (cadenaIngresada == "BALMORAL ESCOCES") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'BALMORAL ESCOCES'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes7[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'BALMORAL ESCOCES'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes7[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes7)); ?>"];
                //alert(list_clientes);
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if (cadenaIngresada == "BANCOMER") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'BANCOMER'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes8[] = $valores[nombreCliente];
                    }

                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'BANCOMER'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes8[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes8)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }
            } else if (cadenaIngresada == "EZQUALO") {
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'EZQUALO'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes9[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'EZQUALO'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes9[] = $valores[nombreCliente];
                    }
                }
                ?>

                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes9)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'LOYALL' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'LOYALL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes11[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'LOYALL'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes11[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes11)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'VMGE ABOGADOS' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'VMGE ABOGADOS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes12[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'VMGE ABOGADOS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes12[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes12)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'MICHELIN 2 RUEDAS' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'MICHELIN 2 RUEDAS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes13[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'MICHELIN 2 RUEDAS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes13[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes13)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } else if(cadenaIngresada == 'FLOTAS CONECTADAS' ){
                <?php
                if($useridRol == 1){
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE marcaCliente = 'FLOTAS CONECTADAS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes14[] = $valores[nombreCliente];
                    }
                } else{
                    $query = $mysqli->query("SELECT DISTINCT nombreCliente FROM clientes WHERE ejecutivasCliente like '%$userlogin%' AND marcaCliente = 'FLOTAS CONECTADAS'");
                    while ($valores = mysqli_fetch_array($query)) {
                        $clientes14[] = $valores[nombreCliente];
                    }
                }
                ?>
                var list_clientes = ["<?php echo utf8_encode(implode('","', $clientes14)); ?>"];
                var ddlItems = document.getElementById("cliente"),
                    itemArray = list_clientes;

                for (var i = 0; i < itemArray.length; i++) {
                    var opt = itemArray[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    ddlItems.appendChild(el);
                }

            } 
    }
    </script>

<script>function evaluarContenidoCliente(cadenaIngresada){
    
    $('#ejecutiva option').remove();

    if(cadenaIngresada == "BFGOODRICH"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'BFGOODRICH'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB1H[] = $valores[ejecutivasCliente];
            echo $valores;
        }

        ?>

        var list_clientes = ["<?php echo implode('","', $clientesB1H); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ') // (1) [ 'bearer', 'token' ]
        //const token = split[1]
        //alert(token);
        $('#ejecutiva option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;

        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "UNIROYAL"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'UNIROYAL'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB2U[] = $valores[ejecutivasCliente];
        }

        ?>

        var list_clientes = ["<?php echo implode('","', $clientesB2U); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ') // (1) [ 'bearer', 'token' ]
        //const token = split[1]
        //alert(token);
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;

        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "MICHELIN"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'MICHELIN'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3I[] = $valores[ejecutivasCliente];
        }

        ?>

        var list_clientes = ["<?php echo implode('","', $clientesB3I); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ') // (1) [ 'bearer', 'token' ]
        //const token = split[1]
        //alert(token);
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;

        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "BRASKEM"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'BRASKEM'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3S[] = $valores[ejecutivasCliente];
        }

        ?>

        var list_clientes = ["<?php echo implode('","', $clientesB3S); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ') // (1) [ 'bearer', 'token' ]
        //const token = split[1]
        //alert(token);
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;

        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "LOYALL"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'LOYALL'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3L[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3L); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "ACUVUE"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'ACUVUE'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3A[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3A); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "VMGE ABOGADOS"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'VMGE ABOGADOS'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3V[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3V); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "MICHELIN CAC"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'MICHELIN CAC'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3C[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3C); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "MICHELIN 2 RUEDAS"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'MICHELIN 2 RUEDAS'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3R[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3R); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "BALMORAL ESCOCES"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'BALMORAL ESCOCES'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3B[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3B); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "DOGUI"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'DOGUI'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3D[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3D); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "GATI"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'GATI'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3G[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3G); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "PETMASTER"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'PETMASTER'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3P[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3P); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } else if(cadenaIngresada == "KEYCAN"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE marcaCliente = 'KEYCAN' AND empresaCliente = 'CARGILL'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesBK[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesBK); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    } 	else if(cadenaIngresada == "FLOTAS CONECTADAS"){
        <?php
        $query = $mysqli->query("SELECT DISTINCT ejecutivasCliente FROM clientes WHERE nombreCliente = '$nombreE' AND marcaCliente = 'FLOTAS CONECTADAS'");
        while ($valores = mysqli_fetch_array($query)) {
            $clientesB3F[] = $valores[ejecutivasCliente];
        }
        ?>
        var list_clientes = ["<?php echo implode('","', $clientesB3F); ?>"];
        cadena_l = String(list_clientes);
        const split = cadena_l.split(' ')
        $('#cliente option').remove();
        var ddlItems = document.getElementById("ejecutiva"),itemArray = split;
        for (var i = 0; i < itemArray.length; i++) {
            var opt = itemArray[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            ddlItems.appendChild(el);
        }

    }
    
}
</script>


<script type="text/javascript">
        $(document).ready(function() {
            //codigo de consulta y agregacion de valores a los select
            var areas_a_select = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            var option = '';

            for (var i = 0; i < areas_a_select.length; i++){
                option += '<option value="'+ areas_a_select[i] + '">' + areas_a_select[i] + '</option>';
            }
            $('#allareas').append(option);

            <?php
            //$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
//            $mysqli = new mysqli('localhost', 'root', 'password', 'ezqualof_follower');
            $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
            $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoArte");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $artephp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre,apellido FROM equipoProgramacion");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $programacionphp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM 	equipoAdministracion");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $administracionphp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM 	equipoCopyCorreccion");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $copycorreccionphp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoEstrategia");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $estrategiaphp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre,apellido FROM equipoIlustracion");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $ilustracionphp[] = $valores[nombre]." ".$valores[apellido];
            }

            $query = $mysqli->query("SELECT DISTINCT nombre,apellido FROM equipoPostProduccion");
            while ($valores = mysqli_fetch_array($query)) {
                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                $postproduccionphp[] = $valores[nombre]." ".$valores[apellido];
            }
            ?>

            var arte_php = ["<?php echo utf8_encode(implode('","', $artephp)); ?>"];
            var programacion_php = ["<?php echo utf8_encode(implode('","', $programacionphp)); ?>"];
            var administracion_php = ["<?php echo utf8_encode(implode('","', $administracionphp)); ?>"];
            var copy_correcion_php = ["<?php echo utf8_encode(implode('","', $copycorreccionphp)); ?>"];
            var estrategia_php = ["<?php echo utf8_encode(implode('","', $estrategiaphp)); ?>"];
            var ilustracion_php = ["<?php echo utf8_encode(implode('","', $ilustracionphp)); ?>"];
            var post_produccion_php = ["<?php echo utf8_encode(implode('","', $postproduccionphp)); ?>"];
            var list_personas = {
                'Arte': arte_php,
                'Programación': programacion_php,
                'Administración': administracion_php,
                'Copy y Corrección de estilo': copy_correcion_php,
                'Estrategia': estrategia_php,
                'Ilustración': ilustracion_php,
                'Post Producción': post_produccion_php,
                'Compras': ['Omar Coria']
            }

            var $list_personas = $('#personas');
            $('#allareas').change(function () {
                var allareas = $(this).val(), persona = list_personas[allareas] || [];
                var html = $.map(persona, function (t) {
                    return '<option value="' + t + '">' + t + '</option>'
                }).join('');
                $list_personas.html(html)
            });
        });

    </script>
    
    <script type="text/javascript">
        $(function(){
            $('#addselect').click(function (){
                var names_existentes = document.getElementsByName("areas[]").length;
                var suma_name = names_existentes + 1;
                var numero_id = suma_name;
                var resta_id = numero_id - 1;
                //alert(names_existentes);
                if ($('#allareas_2').length){
                    $('#allareas').clone().attr('id', 'allareas_' + numero_id).insertAfter('#allareas_'+ resta_id);
                    $('#personas').clone().attr('id', 'personas_' + numero_id).insertAfter('#personas_' + resta_id);
                    llenado();
                } else{
                    $('#allareas').clone().attr('id', 'allareas_' + numero_id).insertAfter('#allareas')
                    $('#personas').clone().attr('id', 'personas_' + numero_id).insertAfter('#personas');
                    llenado();
                }

                function llenado(){
                    var areas_a_select = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
                    var option = '';

                    <?php
                    //$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoArte");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        $artephp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoProgramacion");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        $programacionphp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM 	equipoAdministracion");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        $administracionphp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM 	equipoCopyCorreccion");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        //sudo chown -R www-data:www-data /var/www/html/follower
                        //sudo chmod -R 777 /var/www/html/follower
                        $copycorreccionphp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoEstrategia");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        $estrategiaphp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoIlustracion");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando'areas_' + numero_id el select con datos extraidos de una base de datos.
                        $ilustracionphp2[] = $valores[nombre]." ".$valores[apellido];
                    }

                    $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoPostProduccion");
                    while ($valores = mysqli_fetch_array($query)) {
                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                        $postproduccionphp2[] = $valores[nombre]." ".$valores[apellido];
                    }
                    ?>

                    var arte_php = ["<?php echo utf8_encode(implode('","', $artephp2)); ?>"];
                    var programacion_php = ["<?php echo utf8_encode(implode('","', $programacionphp2)); ?>"];
                    var administracion_php = ["<?php echo utf8_encode(implode('","', $administracionphp2)); ?>"];
                    var copy_correcion_php = ["<?php echo utf8_encode(implode('","', $copycorreccionphp2)); ?>"];
                    var estrategia_php = ["<?php echo utf8_encode(implode('","', $estrategiaphp2)); ?>"];
                    var ilustracion_php = ["<?php echo utf8_encode(implode('","', $ilustracionphp2)); ?>"];
                    var post_produccion_php = ["<?php echo utf8_encode(implode('","', $postproduccionphp2)); ?>"];
                    var list_personas = {
                        'Arte': arte_php,
                        'Programación': programacion_php,
                        'Administración': administracion_php,
                        'Copy y Corrección de estilo': copy_correcion_php,
                        'Estrategia': estrategia_php,
                        'Ilustración': ilustracion_php,
                        'Post Producción': post_produccion_php,
                        'Compras': ['Omar Coria']
                    }

                    areass = 'allareasareas_' + numero_id;
                    pers = 'personas_' + numero_id;
                    $('#personas_'+ numero_id).find('option').remove();
                    var $list_personas = $('#personas_' + numero_id);
                    $('#allareas_'+ numero_id).change(function () {
                        var allareas_0 = $(this).val(), persona = list_personas[allareas_0] || [];
                        var html = $.map(persona, function (t) {
                            return '<option value="' + t + '">' + t + '</option>'
                        }).join('');
                        $list_personas.html(html)
                    });
                }

            })
            
            $('#eliminarSelect').click(function (){
                var z = document.getElementsByName("areas[]");
                var i;
                //alert(z.length);
                if(z.length == 1){
                    alert("No se puede eliminar");
                } else{
                    var strvalores = new Array()
                    strvalores = [z.length];
                    var ultimo = strvalores[strvalores.length-1]
                    //alert(ultimo);
                    $("#allareas_"+ultimo).remove();
                    $("#personas_"+ultimo).remove();
                }
                
            })
        })
    </script>


<script>
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, "../vistas/brief.php");
}
</script>


<script type="text/javascript">
    $('#start1').focusout(function() {
        //var proyecto_modal = $('#nom_proyecto').val();
        fechas();

        function fechas() {
            var fecha = new Date($('#start1').val());
            var dias = 1; // Número de días a agregar
            fecha.setDate(fecha.getDate() + dias);
            //alert(fecha);
            var n = fecha.getDay();

            if( n == 6 || n == 0){//sabado y domingo
                alert("No puedes elegir Sábados o Domingos!!");

            } else{
                if( n == 1 || n == 2 ){
                    //alert("Its not weekend");
                    var dias = 3;
                    fecha.setDate(fecha.getDate() + dias);
                    var month = fecha.getMonth() + 1;
                    var day = fecha.getDate();
                    var year = fecha.getFullYear();
                    if(month < 10)
                    month = '0' + month.toString();
                    if(day < 10)
                    day = '0' + day.toString();
                    
                    var maxDate = year + '-' + month + '-' + day;
                    //alert(maxDate);
                    $('#start2').attr('min', maxDate);

                } else if( n == 3 || n == 4 || n == 5 ){
                    //alert("Its not weekend");
                    var dias = 5;
                    fecha.setDate(fecha.getDate() + dias);
                    var month = fecha.getMonth() + 1;
                    var day = fecha.getDate();
                    var year = fecha.getFullYear();
                    if(month < 10)
                    month = '0' + month.toString();
                    if(day < 10)
                    day = '0' + day.toString();
                    
                    var maxDate = year + '-' + month + '-' + day;
                    //$('#start1').attr('min', maxDate);
                    $('#start2').attr('min', maxDate);

                } 
            } 
        }
    });
</script>



