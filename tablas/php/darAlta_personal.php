<?php 
	require_once "conexion.php";
	$conexion=conexion();
    $equipo = $_POST['depa'];
    
    if($equipo == "arte"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoArte SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($equipo == "ilustracion"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoIlustracion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($equipo == "copy"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoCopyCorreccion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "estrategia"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoEstrategia SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "administracion"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoAdministracion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "postProduccion"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoPostProduccion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "programacion"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoProgramacion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "cuentas"){
        
        $id=$_POST['id'];
        $sql="UPDATE equipoCuentas SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    
    } elseif($equipo == "direccion"){
            
        $id=$_POST['id'];
        $sql="UPDATE equipoDireccion SET estatus='-' where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    }
 ?>


