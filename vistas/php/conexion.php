

<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="ezqualof_adminfollower";
			$password="3zqu4l0++";
			$bd="ezqualof_follower";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			$conexion->query("SET NAMES 'utf8'");

			return $conexion;
		}

 ?>
