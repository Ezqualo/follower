$('#formLogin').submit(function(e) {
	e.preventDefault();
	var usuario = $.trim($("#usuario").val());
	var password = $.trim($("#password").val());

	//Validacion
	if (usuario.length == "" || password == "") {
		Swal.fire({
			type:'warning',
			title:'Ingresa un usuario y contraseña',
		});
		return false;
	}else{
		$.ajax({
			url:"bd/login.php",
			type:"POST",
			datatype: "json",
			data: {usuario:usuario, password:password},
			success:function(data){
				if(data == "null"){
					Swal.fire({
						type:'error',
						title:'Usuario y/o contraseña incorrectos',
					});
				}else{
					Swal.fire({
						type:'success',
						title:'Bienvenido',
						background:'#febe10',
						confirmButtonColor:'#000000',
						confirmButtonText:'Ingresar'
					}).then((result) => {
						if(result.value){
							window.location.href = "vistas/inicio.php";
						}
					})
				}
			}
		});
	}
});

