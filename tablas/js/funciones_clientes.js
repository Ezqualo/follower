

function agregardatos(nombre,empresa,marca,direccion,puesto,mail,mailalt,telefono,whatsapp,ejecutivas){

	cadena="nombre=" + nombre + 
			"&empresa=" + empresa +
			"&marca=" + marca +
			"&direccion=" + direccion +
			"&puesto=" + puesto +
			"&mail=" + mail +
			"&mailalt=" + mailalt +
            "&telefono=" + telefono +
			"&whatsapp=" + whatsapp +
			"&ejecutivas=" + ejecutivas;

	$.ajax({
		type:"POST",
		url:"php/save_cliente.php",
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

	id = $('#id_cliente').val();
    nombre = $('#nombreu').val();
    empresa = $('#empresau').val();
	marca = $('#marcau').val();
	direccion = $('#direccionu').val();
    puesto = $('#puestou').val();
    mail = $('#mailu').val();
    mailalt = $('#mailaltu').val();
    telefono = $('#telefonou').val();
    whatsapp = $('#whatsappu').val();
    ejecutivas = $('#ejecutivasu').val();
    //alert(ejecutivas);     
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&empresa=" + empresa +
			"&marca=" + marca +
			"&direccion=" + direccion +
			"&puesto=" + puesto +
			"&mail=" + mail +
			"&mailalt=" + mailalt +
            "&telefono=" + telefono +
			"&whatsapp=" + whatsapp +
			"&ejecutivas=" + ejecutivas;

	$.ajax({
		type:"POST",
		url:"php/actualizar_cliente.php",
		data:cadena,
		success:function(r){
			if(r==1){
				location.reload();
				alertify.success("Actualizado con exito");
			}else{
				alertify.error("Fallo el servidor ");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este cliente?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(idCliente){

	cadena="idCliente=" + idCliente;

		$.ajax({
			type:"POST",
			url:"php/eliminar_cliente.php",
			data:cadena,
			success:function(r){
				if(r==1){
					alertify.success("Eliminado con exito!");
					location.reload();
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	}