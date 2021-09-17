<?php 
    require_once "conexion.php";
    $conexion=conexion();
    $equipo = $_POST['equipo'];
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $puesto=$_POST['puesto'];
    $estatus=$_POST['estatus'];
    $correo=$_POST['correo'];
    $correoAlt=$_POST['correoalt'];
    $redes=$_POST['redes'];
    $tel=$_POST['tel'];
    $telalt=$_POST['telalt'];
    $direccion=$_POST['direccion'];
    $direccion2=$_POST['direccionAlt'];
    $vigencia=$_POST['vigencia'];
    $vacaciones=$_POST['vacaciones'];
    $vacacionesUsadas=$_POST['vacacionesUsadas'];
    $tipo=$_POST['tipo'];
    $alergias=$_POST['alergias'];
    $medicamentos=$_POST['medicamentos'];
    $padecimientos=$_POST['padecimientos'];
    $txt=",";
    $txtA=",";
    $txtB=",";

    if(empty($vigencia)){ $vigencia="2000-01-01";}
    
    $folder = '../../img/ezqualo/';
    if(!file_exists($folder)){
        mkdir($folder, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
    }

    if($_FILES["foto1"]){
        if($_FILES["foto1"]["name"]) {
            // Nombres de archivos de temporales
            $n1 = $_FILES["foto1"]["name"]; 
            $ruta = $_FILES["foto1"]["tmp_name"]; 
            $tam_archivo = $_FILES["foto1"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$n1);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $n1 = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$n1)) {	
                    $txt=$txt."foto1='".$n1."',";
                }
                closedir($dir);
            }
        }
    }
    if($_FILES["foto2"]){
        if($_FILES["foto2"]["name"]) {
            // Nombres de archivos de temporales
            $n2 = $_FILES["foto2"]["name"]; 
            $ruta = $_FILES["foto2"]["tmp_name"]; 
            $tam_archivo = $_FILES["foto2"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$n2);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $n2 = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$n2)) {	
                    $txt=$txt."foto2='".$n2."',";
                }
                closedir($dir);
            }
        }
    }

    if($_FILES["foto3"]){
        if($_FILES["foto3"]["name"]) {
            // Nombres de archivos de temporales
            $n3 = $_FILES["foto3"]["name"]; 
            $ruta = $_FILES["foto3"]["tmp_name"]; 
            $tam_archivo = $_FILES["foto3"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$n3);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $n3 = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$n3)) {	
                    $txt=$txt."foto3='".$n3."',";
                }
                closedir($dir);
            }
        }
    }
    if(!empty($_FILES["archivo"])){
        if($_FILES["archivo"]["name"]) {
            // Nombres de archivos de temporales
            $n = $_FILES["archivo"]["name"]; 
            $ruta = $_FILES["archivo"]["tmp_name"]; 
            $tam_archivo = $_FILES["archivo"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$n);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $n = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$n)) {	
                    $txt=$txt."archivos='".$n."',";
                }
                closedir($dir);
            }
        }
    }
    if(!empty($_FILES["fotoDir"])){
        if($_FILES["fotoDir"]["name"]) {
            // Nombres de archivos de temporales
            $nA = $_FILES["fotoDir"]["name"]; 
            $ruta = $_FILES["fotoDir"]["tmp_name"]; 
            $tam_archivo = $_FILES["fotoDir"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$nA);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $nA = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$nA)) {	
                    $txtA=$txtA."fotoDireccion='".$nA."',";
                }
                closedir($dir);
            }
        }
    }
    if(!empty($_FILES["fotoDirAlt"])){
        if($_FILES["fotoDirAlt"]["name"]) {
            // Nombres de archivos de temporales
            $nB = $_FILES["fotoDirAlt"]["name"]; 
            $ruta = $_FILES["fotoDirAlt"]["tmp_name"]; 
            $tam_archivo = $_FILES["fotoDirAlt"]["size"];
            //anexar hora de creacion para evitar errores.
            $aux1 = explode('.',$nB);
            $aux2=array_pop($aux1);
            $aux1 = implode('.',$aux1);
            $nB = $aux1."-".time().".".$aux2;
            
            if($tam_archivo > 5242880){
            }
            else{
                $dir=opendir($folder);
                if(move_uploaded_file($ruta,$folder.'/'.$nB)) {	
                    $txtB=$txtB."fotoDireccionAlt='".$nB."',";
                }
                closedir($dir);
            }
        }
    }
    $txt=substr($txt, 0, -1);
    $txtA=substr($txtA, 0, -1);
    $txtB=substr($txtB, 0, -1);
    
    if($equipo == "arte"){
        $sql="UPDATE equipoArte SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo', redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion', direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas',tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    }elseif($equipo == "ilustracion"){
        $sql="UPDATE equipoIlustracion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion', direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "copy"){
        $sql="UPDATE equipoCopyCorreccion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion', direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "estrategia"){
        $sql="UPDATE equipoEstrategia SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "administracion"){
        $sql="UPDATE equipoAdministracion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "postProduccion"){
        $sql="UPDATE equipoPostProduccion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt  $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "programacion"){
        $sql="UPDATE equipoProgramacion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";

    } elseif($equipo == "cuentas"){       
        $sql="UPDATE equipoCuentas SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";
    
    } elseif($equipo == "direccion"){       
        $sql="UPDATE equipoDireccion SET nombre='$nombre', apellido='$apellido', puesto='$puesto', correo='$correo',redesSociales='$redes', correoAlterno='$correoAlt', telefono='$tel',telefonoAlterno='$telalt', direccion='$direccion',direccionAlterna='$direccion2', vigencia='$vigencia', vacaciones='$vacaciones', diasUsados='$vacacionesUsadas', tipoSangre='$tipo',alergias='$alergias', medicamentos='$medicamentos', padecimientos='$padecimientos', estatus='$estatus' $txt $txtA $txtB WHERE id='$id'";
    }
    else{
        $sql="";
    }
    //echo $sql;
    echo $result=mysqli_query($conexion,$sql);

 ?>


