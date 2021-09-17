<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

$subject = $_GET['nom_proy'];
$pieza_recibida = $_GET['nom_pieza'];
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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/estilo.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.24/css/dataTables.bootstrap.min.css">

    <!-- DataTables Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/custom-tabla.css">

    <!-- Bootstrap Table Treegrid -->
    <link rel="stylesheet" href="../bootstrap/jquery-treegrid-master/css/jquery.treegrid.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="../chat/css/style.css" rel="stylesheet" id="bootstrap-css">
    <script src="../chat/js/chat.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="../css/stylechat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>


</head>
<body id="fondo">
    <style>
        .modal-dialog {
            width: 400px;
            margin: 30px auto;
        }
    </style>
    <!-- Logo Vista y Boton Cerrar Sesión -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                <img id="img-principal" src="../img/pantalla4.png" width="75%">
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
									<input class="nav-item" type="image" onClick="parent.location='../vistas/brief.php'" src="../img/btnbrief_blanco.png" onMouseOver="this.src='../img/btnbrief_amarillo.png'" onMouseOut="this.src='../img/btnbrief_blanco.png'" style="height: 35px;">
									<input class="nav-item" type="image" onClick="parent.location='../vistas/proyectos_clientes.php'" src="../img/btnproyectos_amarillo.png" onMouseOver="this.src='../img/btnproyectos_amarillo.png'" onMouseOut="this.src='../img/btnproyectos_amarillo.png'" style="height: 35px;">
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

    <!-- Tabla -->
    <div class="container mt-3 mb-3">
        <table class="table table-striped table-dark tree">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Inicio</th>
                <th scope="col">Salida</th>
                <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                <th scope="col"><ion-icon name="chatbox-outline" size="large"></ion-icon></th>
            </tr>
            </thead>

        </table>
        <div class="row">
            <div class="col-4">
                <div class="justify-content-center">
                    <div class="div_izquierda">
                        <table class="table table-striped table-dark tree">
                            <tbody class="tbody_coments">
                            <!-- Fila 1 -->
                            <?php
                            $proyecto_buscar = $subject;
                            $mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
                            //$mysqli = new mysqli('localhost','root','password','ezqualof_follower');
                            $sql = $mysqli -> query("SELECT idOdt, proyecto, fechaSolicitud, fechaEntrega FROM odts WHERE proyecto = '$proyecto_buscar'");
                            //$sql_piezas=$mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezas ");

                            //$resultado=mysqli_query($con,$sql);
                            $num_projects = mysqli_num_rows($sql);
                            $cont1 = 1;
                            while($columnas=mysqli_fetch_array($sql)) {
                                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                                echo "<td>$columnas[proyecto]</td>";
                                echo '<td></td>';
                                echo "</tr>";

                                $var2 = $cont1 + 1;
                                $nom_proy = $columnas[proyecto];
                                $sql_piezas=$mysqli -> query("SELECT piezas.nombre, piezas.fechaInicio, piezas.fechaSalida FROM piezas inner join odts on piezas.idPieza = odts.id AND odts.proyecto = '$nom_proy' AND piezas.nombre = '$pieza_recibida'");
                                while($piezas=mysqli_fetch_array($sql_piezas)) {
                                    // if($contador2 == 2){
                                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                                    echo "<td>$piezas[nombre]</td>";
                                    echo "<td></td>";
                                    echo "</tr>";

                                    $nom_piezas = $piezas[nombre];
                                    $var3 = $var2 + 1;
                                    $sql_caracteristicas = $mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezas WHERE nombre = '$nom_piezas'");
                                    while($piezas2=mysqli_fetch_array($sql_caracteristicas)) {
                                        // if($contador2 == 2){
                                        //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                                        echo "<td>Caracteristicas:</td><td>$piezas2[caracteristicas]</td>";
                                        echo "</tr>";

                                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                                        echo "<td>Medidas:</td><td>$piezas2[medidas]</td>";
                                        echo "</tr>";

                                    }
                                    $var2 = $var3 + 1;
                                }
                                $cont1 = $var2 + 1;
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="div_derecha">
                    <div class="container chat">
                        <div class="wrapper" >
                            <section class="chat-area">
                                <header>
                                    <?php
                                    include_once "../bd/conect_db.php";
                                    //$proyecto_buscar = "Pauta Digital1";
                                    $query = $mysqli->query("SELECT DISTINCT ejecutivaCuenta FROM odts WHERE proyecto = '$proyecto_buscar'");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        $user_chat = $valores[ejecutivaCuenta];
                                    }
                                    
                                    $query2 = $mysqli->query("SELECT DISTINCT nombre FROM usuarios WHERE usuario = '$user_chat'");
                                    while ($valores2 = mysqli_fetch_array($query2)) {
                                        $user_chat_ejecutiva = $valores2[nombre];
                                    }
                                    
                                    $query3 = $mysqli->query("SELECT DISTINCT nombre FROM usuarios WHERE usuario = '$userlogin'");
                                    while ($valores3 = mysqli_fetch_array($query3)) {
                                        $user_name = $valores3[nombre];
                                    }
                                    
                                    ?>
                                    <img src="../chat/userpics/user3.jpg" alt="">
                                    <div class="details">
                                        <span><?php echo $user_chat_ejecutiva?></span>
                                        <span style="color: black;">-----------------------------------------</span>
                                        <button type="button" style="float: right;" class="btn btn-primary" id="publicar">Publicar</button>
                                    </div>
                                </header>
                                <div class="chat-box">
                                </div>
                                <form action="#" class="typing-area">
                                    <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $user_name; ?>" hidden>
                                    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_chat; ?>" hidden>
                                    <input type="text" class="name_project" name="name_project" value="<?php echo $subject; ?>" hidden>
                                    <input type="text" class="name_pieza" name="name_pieza" value="<?php echo $pieza_recibida; ?>" hidden>
                                    <input type="text" name="message" class="input-field" id="mensaje" placeholder="Escribe aqui tu mensaje...">
                                    <input type="button" class="btn_send" id="GuardarChat" style="background-image:url(../img/telegram.png); background-size:50px 50px; background-repeat:no-repeat; height:46px; width:50px; background-position:center;"></input>
                                    
                                </form>
                                <input type="text" class="" name="mensajes" id="mensajes" hidden>
                                <input type="text" class="" name="correoCliente" id="correoCliente" value="<?php echo $user_chat; ?>" hidden>
                                <input type="text" class="" name="correoejecutiva" id="correoEjecutiva" value="<?php echo $userlogin; ?>" hidden>
                                <input type="text" class="" name="nombreProyecto" id="nombreProyecto" value="<?php echo $proyecto_buscar; ?>" hidden>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Tabla -->
    <script src="javascript/users.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Fin Tabla -->

    <!-- Footer -->
    <footer class="position-sticky">
        <image src="../img/pantalla2_.png" class="img-footer">
    </footer>
    <!-- Fin Footer -->


    <script>
    $( document ).ready(function() {
        var miArray = new Array()
        $("#GuardarChat").click(function(){
            mensaje = $('#mensaje').val();
            miArray.push(mensaje);
            $("#mensajes").val(miArray);
            //alert(miArray);
        });
    });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#publicar').click(function() {
                mensajesObt = $('#mensajes').val(); 
                //correoCliente = $('#correoCliente').val();
                //correoEjecutiva = $('#correoEjecutiva').val();
                correoCliente = "enrique.correa@ezqualo.com";
                correoEjecutiva = "ivan.salazar@ezqualo.com";
                nombreProyecto = $('#nombreProyecto').val(); 
                
                cadena="mensajes=" + mensajesObt + 
                        "&correoCuenta=" + correoEjecutiva +
                        "&correoCliente=" + correoCliente +
                        "&nombreProyecto=" + nombreProyecto;
               
                //alert(cadena);

                ejecutarAjax();

                function ejecutarAjax(){

                        //url:'../modulos/select_marca_busqueda.php',
                        
                        $.ajax({
                                data: cadena,
                                url:'../vistas/php/notificacionChat.php',
                                type:  'post',
                                success:  function (response) {
                                    //alert("Funciona"); 
                                    location.reload();
                                }
                        });

                }
            });
        });
    </script>

    <script>
        const form = document.querySelector(".typing-area"),
        //incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".input-field"),
        sendBtn = form.querySelector(".btn_send"),
        chatBox = document.querySelector(".chat-box");

        form.onsubmit = (e)=>{
            e.preventDefault();
        }

        sendBtn.onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../bd/save_messages.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        inputField.value = "";
                        scrollToBottom();
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }

        setInterval(() =>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../bd/get_chat.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
            //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //xhr.send("incoming_id="+incoming_id);
        }, 500);
    </script>

    <!-- JQuery -->
    <script src="../jquery/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Bootstrap Table JS -->
    <script type="text/javascript" src="../bootstrap/jquery-treegrid-master/js/jquery.treegrid.js"></script>
    <script type="text/javascript">
        $('.tree').treegrid();
    </script>

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

