<?php 

    session_start();
    if ($_SESSION["s_usuario"] === null) {
        header("Location: ../index.php");
    }
    $userlogin = $_SESSION["s_usuario"];

	require_once "conexion.php";
	$conexion=conexion();
    $equipo = $_POST['depa'];
    $registro=$_POST['reg'];
    date_default_timezone_set('America/Mexico_City');  
    $hora = date('H:i:s', time());  
    $fecha1 = date('d')."-".date('m')."-".date('y');
    $fecha = $fecha1 . " " . $hora;
    if($equipo == "arte"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoArte where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }

    } elseif($equipo == "ilustracion"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoIlustracion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }

    } elseif($equipo == "copy"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoCopyCorreccion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    } elseif($equipo == "estrategia"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoEstrategia where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    } elseif($equipo == "administracion"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoAdministracion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    } elseif($equipo == "postProduccion"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoPostProduccion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    } elseif($equipo == "programacion"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoProgramacion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    } elseif($equipo == "cuentas"){
        
        $id=$_POST['id'];
        $sql="DELETE FROM equipoCuentas where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    
    } elseif($equipo == "direccion"){
            
        $id=$_POST['id'];
        $sql="DELETE FROM equipoDireccion where id='$id'";
        if (mysqli_query($conexion,$sql)){
            $nombre=$_POST['nombre'];
            $sql="INSERT INTO historial (personal,departamento, responsable, fecha, registro) VALUES ('$nombre','Arte','$userlogin','$fecha','$registro')";
            echo $result=mysqli_query($conexion,$sql);
        }
        
    }
 ?>


