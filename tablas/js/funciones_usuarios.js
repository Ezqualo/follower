

function agregardatos(usuario,genero,nombre,password,idRol,estatus){

	cadena="usuario=" + usuario + 
			"&genero=" + genero +
			"&nombre=" + nombre +
			"&password=" + password +
			"&idRol=" + idRol +
			"&estatus=" + estatus;

	$.ajax({
		type:"POST",
		url:"php/save_usuario.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Agregado con exito");
				location.reload();
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function actualizaDatos(){

	id=$('#idusuario').val();
	usuario=$('#usuariou').val();
	genero=$('#generou').val();
	nombre=$('#nombreu').val();
	password=$('#passwordu').val();
	Rol=$('#idRolu').val();
    estatus = "En Linea";
            
    if(Rol == "Administrador"){
        idRol = 1;
    }else if(Rol == "Cuentas"){
        idRol = 2;
    }else if(Rol == "Cliente"){
        idRol = 3;
    }
            
	cadena= "id=" + id +
			"&usuario=" + usuario + 
			"&genero=" + genero + 
			"&nombre=" + nombre +
			"&password=" + password +
			"&idRol=" + idRol + 
			"&estatus=" + estatus;

	$.ajax({
		type:"POST",
		url:"php/actualizar_usuario.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				//$('#tabla').load('componentes/tabla.php');
				location.reload();
				alertify.success("Actualizado con exito");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este usuario?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminar_usuario.php",
			data:cadena,
			success:function(r){
				if(r==1){
					//$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
					location.reload();
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	}
