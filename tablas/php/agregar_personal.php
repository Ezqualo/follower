
<?php 
    require_once "conexion.php";
    $conexion=conexion();
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
    $equipo = $_POST['equipo'];
    $folder = '../../img/ezqualo/';
    if(!file_exists($folder)){ 
        mkdir($folder, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
    }
    if(empty($vigencia)){ $vigencia="2000-01-01";}
    
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
                }
                closedir($dir);
            }
        }
    }
    if($_FILES["fotoDir"]){
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

                }
                closedir($dir);
            }
        }
    }
    if($_FILES["fotoDirAlt"]){
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

                }
                closedir($dir);
            }
        }
    }

    if($equipo == "arte"){
        $sql="INSERT INTO equipoArte (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion', '$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    }elseif($equipo == "ilustracion"){
        $sql="INSERT INTO equipoIlustracion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion', '$direccion2', '$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    } elseif($equipo == "copy"){
        $sql="INSERT INTO equipoCopyCorreccion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones,diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion', '$direccion2', '$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    } elseif($equipo == "estrategia"){
        $sql="INSERT INTO equipoEstrategia (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion', '$direccion2', '$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    } elseif($equipo == "administracion"){
        $sql="INSERT INTO equipoAdministracion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion','$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    } elseif($equipo == "postProduccion"){
        $sql="INSERT INTO equipoPostProduccion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion','$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";

    } elseif($equipo == "programacion"){
        $sql="INSERT INTO equipoProgramacion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion','$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";
    
    } elseif($equipo == "cuentas"){
        $sql="INSERT INTO equipoCuentas (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus,redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion','$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";
    
    } elseif($equipo == "direccion"){
        $sql="INSERT INTO equipoDireccion (nombre, apellido, puesto, correo, correoAlterno, telefono, telefonoAlterno, direccion,direccionAlterna, vigencia, vacaciones, diasUsados, tipoSangre, alergias, medicamentos, padecimientos, archivos, foto1, foto2, foto3, estatus, redesSociales,fotoDireccion, fotoDireccionAlt) 
        values ('$nombre','$apellido','$puesto','$correo','$correoAlt', '$tel','$telalt','$direccion','$direccion2','$vigencia','$vacaciones','$vacacionesUsadas','$tipo','$alergias','$medicamentos','$padecimientos','$n','$n1','$n2','$n3','$estatus','$redes','$nA','$nB')";
    }
    else{
        $sql="";
    }
    //echo $sql;
    echo $result=mysqli_query($conexion,$sql);
	

 ?> 
 

