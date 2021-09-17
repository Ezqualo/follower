<?php
session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];
$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');

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

</head>

<body>

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
<?php
include('modulos/navbar.php');
?>
<!-- Menu principal -->

<!-- Tabla -->
<div class="container-fluid mt-3 mb-3">
    <h2 class="text-center"><span class="badge">CONSULTA BRIEF</span></h2>
    <div class="row">
        <table class="table table-striped table-dark tree">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col">Fecha de Solicitud</th>
                <th scope="col">Contexto</th>
                <th scope="col">Objetivo</th>
                <th scope="col">Publico objetivo</th>
                <th scope="col">Necesidad</th>
                <th scope="col">Promesa u oferta</th>
                <th scope="col">Propuesta de Valor</th>
                <th scope="col">Justificación del beneficio</th>
                <th scope="col">Competencia</th>
                <th scope="col">Entregables</th>
                <th scope="col">Medios</th>
                <th scope="col">Presupuesto</th>
                <th scope="col">Observaciones</th>
            </tr>
            </thead>
            <tbody>
            <!-- Fila 1 -->
            <?php
            $con=mysqli_connect('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
            $sql=$mysqli -> query("SELECT id, fechaEntrega, fechaSalida, nombre, contexto, objetivo, publicObjetivo, necesidad, promesa, propuesta, justificacion, competencia, entregables, medios, presupuesto, observaciones, archivo FROM brief WHERE ejecutivaCuenta = '$userlogin'");

            $num_projects = mysqli_num_rows($sql);
            $cont1 = 1;
            $add_pieza = 1;
            while($columnas=mysqli_fetch_array($sql)) {
                echo '<tr class="treegrid-' . $cont1 . ' " style="font-weight: 800;">';
                echo "<td>$columnas[nombre]</td>";
                echo '<td><a href="" data-toggle="modal" id="' . $columnas[nombre] . '" class="add_pieza"><ion-icon name="add-circle-outline" size="large" style="color: #febe10;"></ion-icon></a></td>';
                echo "<td>$columnas[fechaEntrega]</td>";
                echo "<td>$columnas[fechaSalida]</td>";
                echo '<td><a href="../tablas/tabla_de_tiempos.php?nom_proy=' . $columnas[nombre] . '" class="class_coment" style="color: orange; font-size: 25px;" >;</a></td>';
                echo '<td><a href="../vistas/comentarios.php?nom_proy=' . $columnas[nombre] . '"style="color: orange; font-size: 20px;">Chat</a></td>';
                echo '<td></td>';
                echo "</tr>";

                $var2 = $cont1 + 1;
                $nom_proy = $columnas[proyecto];
                $sql_piezas=$mysqli -> query("SELECT piezas.nombre, piezas.fechaInicio, piezas.fechaSalida FROM piezas inner join odts on piezas.idPieza = odts.id AND odts.proyecto = '$nom_proy'");
                while($piezas=mysqli_fetch_array($sql_piezas)) {
                    // if($contador2 == 2){
                    //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                    echo '<tr class="treegrid-' . $var2 . ' treegrid-parent-' . $cont1 . '">';
                    echo "<td>$piezas[nombre]</td>";
                    echo "<td></td>";
                    echo "<td>$piezas[fechaInicio]</td>";
                    echo "<td>$piezas[fechaSalida]</td>";
                    echo '<td><a href="../tablas/tabla_de_tiempos.php?nom_proy='.$nom_proy.'&nom_pieza='.$piezas[nombre].'" class="class_coment" style="color: orange; font-size: 25px;">;</a></td>';
                    echo '<td><a href="../vistas/comentarios.php?nom_proy='.$nom_proy.'&nom_pieza='.$piezas[nombre].'" style="color: orange; font-size: 20px;">Chat</a></td>';
                    echo '<td></td>';
                    echo "</tr>";

                    $nom_piezas = $piezas[nombre];
                    $var3 = $var2 + 1;
                    $sql_caracteristicas = $mysqli -> query("SELECT id, nombre, caracteristicas, medidas, fechaInicio, fechaSalida FROM piezas WHERE nombre = '$nom_piezas'");
                    while($piezas2=mysqli_fetch_array($sql_caracteristicas)) {
                        // if($contador2 == 2){
                        //echo '<tr class="treegrid-'.$contador2.' treegrid-parent-'.$contador3.'"><td>Node 1-1</td><td>Additional info</td></tr>';
                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo "<td>Caracteristicas:</td><td>$piezas2[caracteristicas]</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";

                        echo '<tr class="treegrid-'.$var3.' treegrid-parent-'.$var2.'">';
                        echo "<td>Medidas:</td><td>$piezas2[medidas]</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
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
<!-- Fin Tabla -->

<!-- Footer -->
<footer class="position-sticky">
    <image src="../img/pantalla2_.png" class="img-footer">
</footer>
<!-- Fin Footer -->

<!-- obtener id del proyecto -->
<script>
    var botones = document.getElementsByClassName('add_pieza');
    for(var i = 0; i < botones.length; i++){
        botones[i].addEventListener('click', capturar);
    }
    function capturar(){
        console.log(this.id);
        var nombre_proyecto = this.id;
        //alert(nombre_proyecto);
        //document.cookie = "cookie_odt="+ encodeURIComponent( "" );
        history.pushState(null, "", "?project="+nombre_proyecto+"");
        //document.cookie = "cookie_odt="+ encodeURIComponent( nombre_proyecto );
        $("#nom_proyecto").val(nombre_proyecto);
        //location.href = document.getElementById("exampleModal");
        //location.reload();
        CargarModal();
    }
    function CargarModal(){
        $( document ).ready(function() {
            $('#exampleModal').modal('toggle')
        });
    }
</script>



<!-- obtener nombre del proyecto con class_coment
<script type="text/javascript">
    function Cargar(){
        $("table tbody tr").click(function() {
            var total = $(this).find("td:eq(0)").text();
            alert(total);
            $.ajax({
                type: "POST",
                url:"../vistas/tabla_tiempos.php",
                data:{total:total},
                success: function(datos){
                    $('#contenido').html(datos);
                }
            });
        });
    }
</script>-->


<!-- Modal Formulario Proyectos -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir piezas</h5>
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
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="caracteristicas" class="col-form-label">Caracteristicas:</label>
                                <input type="text" class="form-control" id="caracteristicas" name="caracteristicas">
                            </div>
                            <div class="form-group">
                                <label for="medidas" class="col-form-label">Medidas:</label>
                                <input type="text" class="form-control" id="medidas" name="medidas">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" ng-app="myApp" ng-controller="MyController">
                                <label for="fechaInicio" class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control"  id="fechaInicio" name="fechaInicio" value="dd-mm-yyyy" min="{{ startDate | date:'yyyy-MM-dd' }}" max="{{ maxDate() | date:'yyyy-MM-dd' }}">
                            </div>
                            <div class="form-group">
                                <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                                <input type="date" class="form-control"  id="fechaSalida" name="fechaSalida" value="dd-mm-yyyy">
                            </div>
                            <div class="form-group" hidden>
                                <label for="nom_proyecto" class="col-form-label"></label>
                                <input type="text" class="form-control"  id="nom_proyecto" name="nom_proyecto" class="nom_proyecto">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Añadir Pieza">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_pieza" onclick="location.reload()">Cerrar</button>
                            <?php
                                if (isset($_POST['submit'])){
                                    include ('../bd/save_brief.php');
                                }
                            ?>
                        </div>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-primary">Añadir Pieza</button>-->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Asignar rango a las fechas de piezas -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $('.add_pieza').on('click', function (e){
            e.preventDefault();
            //alert("hola");
            $('#name').focusout(function() {
                //var proyecto_modal = $('#nom_proyecto').val();
                fechas();

                function fechas() {
                    <?php
                    //$url = $_COOKIE["cookie_odt"];
                    //$url = $_SERVER['QUERY_STRING'];
                    $url_act = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                    $url = $_GET['project'];
                    $variable_url = $url;
                    $sql_odts = $mysqli -> query("SELECT proyecto, fechaSolicitud, fechaEntrega FROM odts WHERE proyecto = '$variable_url'");
                    while($datos = mysqli_fetch_array($sql_odts)) {
                        $lista_odts[] = $datos[proyecto];
                        $fec_ini_odt = $datos[fechaSolicitud];
                        $fec_fin_odt = $datos[fechaEntrega];
                    }
                    ?>

                    var all_odts = <?php echo json_encode($lista_odts);?>;
                    var fech_inicio = <?php echo json_encode($fec_ini_odt);?>;
                    var fech_final = <?php echo json_encode($fec_fin_odt);?>;
                    var url = <?php echo json_encode($url_act);?>;
                    //var odt_ini = fech_inicio.slice(0, -9);
                    //var odt_fin = fech_final.slice(0, -9);
                    //alert(url);
                    /*document.getElementById("fechaSalida").min = "2021-05-10";
                    document.getElementById("fechaSalida").min = "2021-05-10";
                    document.getElementById("fechaSalida").max = "2021-05-15";
                    document.getElementById("fechaInicio").min = "2021-05-10";
                    document.getElementById("fechaInicio").max = "2021-05-15";*/
                }
            });

        })
    })

</script>


<script type="text/javascript">
    Cookies.remove('nombre');
</script>

<!-- Modal Formulario Proyectos -->
<!-- JQuery -->
<script src="../jquery/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="../popper/popper.min.js"></script>

<!-- Sweet Alert 2 JS -->
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- DataTables JS Custom -->
<script src="../datatables/custom.js"></script>

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
