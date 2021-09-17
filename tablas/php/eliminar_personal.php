<?php 
	require_once "conexion.php";
	$conexion=conexion();
    $equipo = $_POST['equipo'];
    
    if($equipo == "arte"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoArte where id='$id'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($equipo == "ilustracion"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoIlustracion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($equipo == "copy"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoCopyCorreccion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "estrategia"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoEstrategia where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "administracion"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoAdministracion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "postProduccion"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoPostProduccion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "programacion"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoProgramacion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    } elseif($equipo == "cuentas"){
        
        $id=$_POST['id'];
        $sql="DELETE from equipoCuentas where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    
    } elseif($equipo == "direccion"){
            
        $id=$_POST['id'];
        $sql="DELETE from equipoDireccion where id='$id'";
        echo $result=mysqli_query($conexion,$sql);
        
    }
 ?>

