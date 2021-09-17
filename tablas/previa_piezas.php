<?php
  // Create database connection
  $db = mysqli_connect("localhost", "ezqualof_adminfollower", "3zqu4l0++", "ezqualof_follower");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO previaPiezas (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM previaPiezas");
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

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

    	<!-- Estilo CSS -->
	<link rel="stylesheet" href="../css/estilo.css">

	<!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">

  <!-- DataTables Bootstrap -->
  <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.24/css/dataTables.bootstrap.min.css">
    
  <!-- DataTables Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../css/custom-tabla.css">

  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body id="fondo">
    <!-- Logo Vista y Boton Cerrar Sesión -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center">
				<img id="img-principal" src="../img/pantalla4.png" width="100%">
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
        include('../vistas/modulos/navbar.php');
    ?>
    <!-- Menu principal -->
	
	<!-- Tabla Previa Piezas -->
    <div class="container">
    	<div class="row">
            <div class="col-md-2">
            <table class="table table-dark">
            	  <thead>
                <tr>
                  <th scope="col">nombre</th>
                </tr>
              	  </thead>
              <tbody>
                <tr>
	           <td>Proyecto1</td>
                </tr>
    		<tr>
    		   <td>pieza 1</td>
    		</tr>
 		<tr>
 		   <td><ion-icon name="chatboxes" size="large" style="color: #febe10;"></ion-icon><ion-icon name="arrow-dropright" style="color: #febe10;"></ion-icon></td>
    		</tr>
    		<tr>
    		   <td>archivo</td>
    		</tr>
              </tbody>
            </table>
            </div>
            
            <div class="col-md-8">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">brief</th>
                  <th scope="col"><ion-icon name="calendar" size="large"></ion-icon></th>
                  <th scope="col"><ion-icon name="chatboxes" size="large"></ion-icon></th>
                  <th scope="col"><ion-icon name="square-outline" size="large"></ion-icon></th>
                </tr>
              </thead>
            </table>
            	<div class="container">
            	  <div class="row">
            	    <div class="col-md-4">
            	      <div id="content">
			  <?php
			    while ($row = mysqli_fetch_array($result)) {
			      echo "<div id='img_div'>";
			      	echo "<img src='images/".$row['image']."' >";
			      	echo "<p>".$row['image_text']."</p>";
			      echo "</div>";
			    }
			  ?>
			  <form method="POST" action="index.php" enctype="multipart/form-data">
			  	<input type="hidden" name="size" value="1000000">
			  	  <div>
			  	    <img src="../img/btnportada.png" alt="previa-piezas" width="300" height="300" style="border-style: solid; border-color: #febe10; border-width: 12px;">
			  	  </div>
			  	  <div>
			  	  </div>
			  	  <div style="padding-top: 32px;">
			  	     <button align="center" class="btn text-center" type="submit" name="upload">SUBIR</button>
			  	  </div>
			  </form>
			</div>
              	      <!--<img src="../img/btnportada.png" alt="previa-piezas" width="300" height="300" style="border-style: solid; border-color: #febe10; border-width: 12px;"> -->
        	    </div>
                  </div>
                <div class="col-md-4" style="color: #ffffff;">
                  <span>Inicio</span>
                  <span>FechaInicio</span>
                  <span>Salida</span>
                  <span>FechaSalida</span>
                  <span>Hrs</span>
                  <span>Rec</span>
                  <span>Cambios</span>
               </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Tabla Previa Piezas -->

<!-- Footer -->
<footer>
    <image src="../img/pantalla2_.png" class="img-footer sticky-bottom">
</footer>
<!-- Footer -->

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

</body>
</html>
?>
