<?php 
session_start();
if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

////////////////////////////actualizacion


if($tabla == "odt"){
    //echo "tabla odt";
    $subject = $_GET['nom_proy'];
    $subject2 = $_GET['nom_pieza'];
    $id = $_GET['id'];
    $Nombre_Proyecto = $id . '-' . $subject . '-ODT';
    $Nombre_Pieza = $id . '-' . $subject2 . '-ODT';
    //echo " " . $Nombre_Proyecto;
} else{
    //echo "tabla brief";
    $subject = $_GET['nom_proy'];
    $subject2 = $_GET['nom_pieza'];
    $id = $_GET['id'];
    $Nombre_Proyecto = $id . '-' . $subject . '-BRIEF';
    $Nombre_Pieza = $id . '-' . $subject2 . '-BRIEF';
    //echo " " . $Nombre_Proyecto;
}
////////////////////////////actualizacion

//echo "INICIA CODIGO DE UN SOLO MES :::::: " . $subject;
if(empty($subject2) == false){
    //echo "Busco proyecto y pieza";
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM comentarios where id='$idp' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
        }else{
            $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
        }
    }else{
        $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
    }
}else{
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM comentarios where id='$idp' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
        }else{
            $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
        }
    }else{
        $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
    }
}

$idSemcoment = 1;
$result=mysqli_query($mysqli,$sql);
while($ver=mysqli_fetch_row($result)){

    $datos=$ver[0]."||".
        $ver[1]."||".
        $ver[2]."||".
        $ver[3]."||".
        $ver[4]."||".
        $ver[5]."||".
        $ver[6];

    $semaforocomentario = $ver[9];
    ?>

    <tr class="tt-wrapper">
        <?php

        //echo "FECHA $ver[2] ";
        $lista_dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
        //$lista_dias = array(0 => "Sun", 1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat");
        $clave_dia = array_search($dia_semana, $lista_dias);
        $n = $clave_dia;
        $fecha_ini_coment = $ver[2];
        $fecha_fin_coment = $ver[3];
        
        $fecha_inicial_p = substr($fecha_ini_coment, 5,5);
        //echo "****fecha_inicial: " . $fecha_ini_coment;

        $fecha_cal_fin = substr($fecha_fin_coment, 8, 2);
        $fecha_cal_fin2 = substr($fecha_fin_coment, 5, 5);
        
        $fecha_cal_ini = substr($fecha_ini_coment, 8, 2);
        $fecha_cal_ini2 = substr($fecha_ini_coment, 5, 5);

        $mes_cal_ini = substr($fecha_ini_coment, 5, 2);
        $mes_cal_fin = substr($fecha_fin_coment, 5, 2);
        $mes = substr($fecha_ini_coment, 5, 2);

        $year3 = substr($fecha_ini_coment, 0, 4);
        $mes3 = substr($fecha_ini_coment, 5, 2);
        $dia3 = substr($fecha_ini_coment, 8, 2);
        $year4 = substr($fecha_fin_coment, 0, 4);
        $mes4 = substr($fecha_fin_coment, 5, 2);
        $dia4 = substr($fecha_fin_coment, 8, 2);
        //calculo timestam de las dos fechas
        $timestamp3 = mktime(0,0,0,$mes3,$dia3,$year3);
        $timestamp4 = mktime(4,12,0,$mes4,$dia4,$year4);
        //resto a una fecha la otra
        $segundos_diferencia2 = $timestamp3 - $timestamp4;
        //echo $segundos_diferencia;
        //convierto segundos en días
        $dias_diferencia2 = $segundos_diferencia2 / (60 * 60 * 24);
        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia2 = abs($dias_diferencia2);
        //quito los decimales a los días de diferencia
        $dias_diferencia2 = floor($dias_diferencia2);
        $dias_contados2 = $dias_diferencia2;  
        //echo " Dias---- " . $dias_contados2;
	//echo(utf8_encode($datos));
        if ($useridRol == 1 || $useridRol == 2){
        ?>

        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')">
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        } else{
        ?> 
        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')" disabled="true">
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" disabled="true">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        }
        
        echo utf8_encode('<td class="">'.$ver[1].'</p><small>'.$ver[5].'</small></td>');
        if($mes1 == $mes2){//CONDICION PARA CUANDO EL PERIODO SEA DENTRO DEL MISMO MES
            $cont = $dia1;
            while($cont <= $dia2){
                if($n == 0 || $n == 6){ // CONDICION PARA SABER SI ES FINDE SEMANA 
                    echo '<td name="'.$n.'" id="'.$cont.'"></td>';
                    $n = $n + 1;
                    if($n == 7){
                        $n = 0;
                    }
                }else {
                    if ($fecha_cal_ini == $cont){
                        $contador_dias = $fecha_cal_ini;
                        while($contador_dias < $fecha_cal_fin){
                            if(empty($subject2) == false){ // CONDICION CUANDO EL PROYECTO ESTA DENTRO DEL MISMO MES Y ES UNA PIEZA
                                $sql_comentarios = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[1]' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'");
                                //$sql_comentarios2 = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[1]' AND proyecto = '$Nombre_Proyecto'");
                                while($coment_encontrado = mysqli_fetch_array($sql_comentarios)){
                                    $color = "$coment_encontrado[color]";
                                    if(empty($coment_encontrado[motivo] == false)){
                                        $tooltip = $coment_encontrado[comentario] . " Motivo: " . $coment_encontrado[motivo];
                                    }else{
                                        $tooltip = $coment_encontrado[comentario];
                                    }

                                    $datos =$coment_encontrado[0]."||".
                                            $coment_encontrado[1]."||".
                                            $coment_encontrado[2]."||".
                                            $coment_encontrado[3];
                                    //echo " contador= ". $cont . "comentario" . $coment_encontrado[dia];
                                    if($cont == $coment_encontrado[dia]){
                                        //echo "ENTRE A LA CONDICION";
                                        //echo '<td class="tt-gplus" id="'.$cont.'" style="background-color: '.$color.'"> <span class="">' . $coment_encontrado[comentario] . '</span> </td>';
                                        ?>
                                        <td class="tt-gplus" id="<?php echo $cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditarevento" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span style="color: #0017FF;" class=""><?php echo utf8_encode($tooltip) ?></span> </td>
                                        <?php
                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }
                                        $cont = $cont + 1;
                                        
                                        if($cont == $fecha_cal_fin){
                                            echo '<td class="tt-gplus" id="'.$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span> </td>';
                                            $n = $n + 1;
                                            if ($n == 7) {
                                                $n = 0;
                                            }    
                                            $var_aux = 1; // SOLUCION 
                                            $cont = $cont + 1;
                                            break;  
                                        }
                                    }
                                }
                                if($var_aux == 1){ //SOLUCION DE CELDAS COLOREADAS DE MAS
                                    $var_aux = 2;
                                    break;
                                } else {
                                    if ($n == 0 || $n == 6) {
                                        echo '<td name="fines" id="'.$cont.'"></td>';
                                    }else{
                                        if ($useridRol == 1 || $useridRol == 2){
                                            $fecha_Ant = $ver[10];
                                            $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                            if($cont < 10){
                                                $aux_dia = "0" . $cont;
                                            }else{
                                                $aux_dia = $cont;
                                            }
                                            
                                            //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                            if($fechaAnteriorOdt == $aux_dia){
                                               
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>'; 
                                                
                                            }else{
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                            } 

                                            //echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                        } else{
                                            $fecha_Ant = $ver[10];
                                            $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                            if($cont < 10){
                                                $aux_dia = "0" . $cont;
                                            }else{
                                                $aux_dia = $cont;
                                            }
                                            //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                            if($fechaAnteriorOdt == $finalizar_ciclo){
                                                
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>';   
                                                //echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                            }else{
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="" onclick=borrar(this) ></td>';
                                            }
                                        }
                                        //echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                    }
                                    //echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                    $n = $n + 1;
                                    if ($n == 7) {
                                        $n = 0;
                                    }

                                    $contador_dias = $contador_dias + 1;
                                    $cont = $cont + 1;
                                    if($cont == $fecha_cal_fin){
                                        echo '<td class="tt-gplus" id="'.$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span> </td>';
                                        
                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }

                                        $cont = $cont + 1;
                                        break;
                                    }
                                }

                            }else{ // CONDICION CUANDO EL PROYECTO ESTA DENTRO DEL MISMO MES Y ES UNA PROYECTO
                                $sql_comentarios2 = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[1]' AND proyecto = '$Nombre_Proyecto'");
                                while($coment_encontrado = mysqli_fetch_array($sql_comentarios2)){
                                    $color = "$coment_encontrado[color]";
                                    if(empty($coment_encontrado[motivo] == false)){
                                        $tooltip = $coment_encontrado[comentario] . " Motivo: " . $coment_encontrado[motivo];
                                    }else{
                                        $tooltip = $coment_encontrado[comentario];
                                    }

                                    $datos =$coment_encontrado[0]."||".
                                            $coment_encontrado[1]."||".
                                            $coment_encontrado[2]."||".
                                            $coment_encontrado[3];
                                    //echo " contador= ". $cont . "comentario" . $coment_encontrado[dia];
                                    if($cont == $coment_encontrado[dia]){
                                        ?>
                                        <td class="tt-gplus" id="<?php echo $cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditarevento" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span> </td>
                                        <?php
                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }
                                        $cont = $cont + 1;
                                        if($cont == $fecha_cal_fin){
                                            echo '<td class="tt-gplus" id="'.$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span> </td>';
                                            $n = $n + 1;
                                            if ($n == 7) {
                                                $n = 0;
                                            }
                                            $var_aux = 1;
                                            $cont = $cont + 1;
                                            break;
                                        }
                                    }
                                    //$cont = $cont + 1;
                                    
                                }
                                if($var_aux == 1){ //SOLUCION DE CELDAS COLOREADAS DE MAS
                                    $var_aux = 2;
                                    break;
                                } else {
                                    
                                    if ($n == 0 || $n == 6) {
                                        echo '<td name="fines" id="'.$cont.'"></td>';
                                    }else{
                                        if ($useridRol == 1 || $useridRol == 2){
                                            $fecha_Ant = $ver[10];
                                            $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                            if($cont < 10){
                                                $aux_dia = "0" . $cont;
                                            }else{
                                                $aux_dia = $cont;
                                            }
                                            
                                            //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                            if($fechaAnteriorOdt == $aux_dia){
                                               
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>'; 
                                                
                                            }else{
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                            } 

                                            //echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                        } else{
                                            /*$fecha_Ant = $ver[10];
                                            $fechaAnteriorOdt = substr($fecha_Ant, 8, 2);
                                            if($cont < 10){
                                                $aux_dia = "0" . $cont;
                                            }else{
                                                $aux_dia = $cont;
                                            }*/
                                            //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                            if($fechaAnteriorOdt == $finalizar_ciclo){
                                                
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>';   
                                                //echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                            }else{
                                                echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="" onclick=borrar(this) ></td>';
                                            }
                                        }
                                        //echo '<td class="tt-gplus" id="'.$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this) ></td>';
                                    }

                                    $n = $n + 1;
                                    if ($n == 7) {
                                        $n = 0;
                                    }
                                    $contador_dias = $contador_dias + 1;
                                    $cont = $cont + 1;
                                    if($cont == $fecha_cal_fin){
                                        echo '<td class="tt-gplus" id="'.$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span> </td>';
                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }
                                        
                                        $cont = $cont + 1;
                                        break;
                                    }
                                }
                                
                            }
                        }
                        $cont = $cont - 1;
                                                                        
                    }else{
                        echo '<td id="'.$cont.'"></td>';
                        $n = $n + 1;
                        if ($n == 7) {
                            $n = 0;
                        }
                    }

                }
                $cont = $cont + 1;
            }
        }
        if ($useridRol == 1 || $useridRol == 2){
        $co1=$ver[0];
	//codigo para semaforo por medio de radio buttons
				echo '<td> 
					
					<div class="radio-item">';
					    if( $semaforocomentario=="#FFC500" ){

					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="InicioMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#FFC500">';
					    }else{
					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="InicioMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#FFC500">';
					    }
					    echo '<label id="iniciolabel" for="InicioMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#1CB707"){
					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="EnviadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#1CB707">';
					    }else{
					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="EnviadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#1CB707">';
					    }

					    echo '<label id="enviadolabel" for="EnviadoMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					if($semaforocomentario=="#FF0C00"){
					    echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="PausadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#FF0C00">';
					}else{
					    echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="PausadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#FF0C00">';
					}
					
					echo '<label id="pausadolabel" for="PausadoMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#6900D1"){
					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="CerradoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#6900D1">';
					    }else{
					        echo '<input onclick="act_comentario('.$co1.',value)" type="radio" id="CerradoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#6900D1">';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoMes'.$idSemcoment.'"></label>
					</div>
					

				    </td>';
	}
        else{
        	echo '<td> 
					
					<div class="radio-item">';
					    if( $semaforocomentario=="#FFC500" ){

					        echo '<input  type="radio" id="InicioMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#FFC500" disabled>';
					    }else{
					        echo '<input  type="radio" id="InicioMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#FFC500" disabled >';
					    }
					    echo '<label id="iniciolabel" for="InicioMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#1CB707"){
					        echo '<input type="radio" id="EnviadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#1CB707"disabled >';
					    }else{
					        echo '<input type="radio" id="EnviadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#1CB707" disabled>';
					    }

					    echo '<label id="enviadolabel" for="EnviadoMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					if($semaforocomentario=="#FF0C00"){
					    echo '<input type="radio" id="PausadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#FF0C00" disabled>';
					}else{
					    echo '<input type="radio" id="PausadoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#FF0C00" disabled>';
					}
					
					echo '<label id="pausadolabel" for="PausadoMes'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#6900D1"){
					        echo '<input type="radio" id="CerradoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" checked value="#6900D1"disabled >';
					    }else{
					        echo '<input type="radio" id="CerradoMes'.$idSemcoment.'" name="droneMes'.$idSemcoment.'" value="#6900D1" disabled>';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoMes'.$idSemcoment.'"></label>
					</div>
					

				    </td>';
        }
        
        ?>

    </tr>
    <?php
    $idSemcoment = $idSemcoment + 1;
}// TERMINA WHILE PRINCIPAL 

?>
