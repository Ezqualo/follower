function preguntarSiNoProveedor(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este cliente?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(idProveedor){

	cadena="idProveedor=" + idProveedor;

		$.ajax({
			type:"POST",
			url:"php/eliminar_proveedor.php",
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