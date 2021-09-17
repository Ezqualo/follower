

function agregardatos(nombre, apellido, email, telefono, area, persona, proyecto, pieza, fechaAnterior){

	cadena="nombre=" + nombre + 
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono +
			"&area=" + area +
			"&persona=" + persona +
			"&proyecto=" + proyecto +
			"&pieza=" + pieza +
			"&fechaAnterior=" + fechaAnterior;
			
	console.log(cadena);

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
		//console.log(r);
			if(r==1){
				//$('#tabla').load('componentes/tabla.php');
				//$('#buscador').load('componentes/buscador.php');
				
				
				alertify.success("Agregado con exito");
				location.reload();
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function actualizaDatos(){

	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	apellido=$('#apellidou').val();
	email=$('#emailu').val();
	telefono=$('#telefonou').val();
	area=$('#areau').val();
	persona=$('#persona_enc_u').val();
	proyecto=$('#proyectou').val();
	pieza=$('#piezau').val();
	fechaAnterior=$('#fecha_Ant_ComODT').val();

	cadena= "id=" + id +
			"&nombre=" + nombre + 
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono + 
			"&area=" + area +
			"&persona=" + persona +
			"&proyecto=" + proyecto +
			"&pieza=" + pieza +
			"&fechaAnterior=" + fechaAnterior;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
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
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
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

	function agregarevento(comentario, color_event, dia_event, coment_asig, proyectoe, piezae){

		cadena="comentario=" + comentario + 
				"&color_event=" + color_event +
				"&dia_event=" + dia_event +
				"&coment_asig=" + coment_asig +
				"&proyectoe=" + proyectoe +
				"&piezae=" + piezae;
		//alert(cadena);
		$.ajax({
			type:"POST",
			url:"php/agregar_evento.php",
			data:cadena,
			success:function(r){
				if(r==1){
					location.reload();
					alertify.success("Agregado con exito");
				}else{
					alertify.error("Fallo el servidor");
				}
			}
		});
	
	}



	function actualizarDatosEvento(){

		id=$('#idevento').val();
		comentario=$('#comentario_u').val();
		dia=$('#dia_event_u').val();
		color=$('#color_event_u').val();
		coment_asig=$('#coment_asig_u').val();
		motivo=$('#motivo_u').val();
		proyecto=$('#proyectoe_u').val();
		pieza=$('#piezae_u').val();
		
		//alert(motivo);

		cadena= "id=" + id +
				"&comentario=" + comentario + 
				"&dia=" + dia +
				"&color=" + color +
				"&coment_asig=" + coment_asig + 
				"&motivo=" + motivo + 
				"&proyecto=" + proyecto +
				"&pieza=" + pieza;
	
		$.ajax({
			type:"POST",
			url:"php/editar_evento.php",
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
	
	
	
	
	function actualizadatosPieza(){

		//alertify.success("Actualizado con exito");
		//alert("Actualizado con exito");
		id=$('#idu').val();
		nombre=$('#nameu').val();
		caracteristicas=$('#caracteristicasu').val();
		medidas=$('#medidasu').val();
		fechaInicio=$('#fechaIniciou').val();
		fechaSalida=$('#fechaSalidau').val();
		fechaAnterior=$('#fechaAnt_PiezaOdt').val();

		nombreTabla="piezas";

		cadena= "id=" + id +
				"&nombre=" + nombre + 
				"&caracteristicas=" + caracteristicas +
				"&medidas=" + medidas +
				"&fechaInicio=" + fechaInicio + 
				"&fechaSalida=" + fechaSalida +
				"&nombreTabla=" + nombreTabla +
				"&fechaAnterior=" + fechaAnterior;
	
		//alert(cadena);
		$.ajax({
			type:"POST",
			url:"php/actualizaDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){					
					alertify.success("Actualizado con exito");
					location.reload();
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	
	}
	
	function preguntarSiNoPieza(id){
		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
						function(){ eliminarDatosPieza(id) }
					, function(){ alertify.error('Se cancelo')});
	}

	function eliminarDatosPieza(id){

		nombreTabla="piezas";
		cadena="id=" + id +
				"&nombreTabla=" + nombreTabla;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
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
	
	
	
	
	function actualizaDatosEventoPieza(){

		id=$('#ideventop').val();
		comentario=$('#comentario_up').val();
		dia=$('#dia_event_up').val();
		color=$('#color_event_up').val();
		coment_asig=$('#coment_asig_up').val();
		motivo=$('#motivo_up').val();
		proyecto=$('#proyectoe_up').val();
		pieza=$('#piezae_up').val();
		
		//alert(motivo);

		cadena= "id=" + id +
				"&comentario=" + comentario + 
				"&dia=" + dia +
				"&color=" + color +
				"&coment_asig=" + coment_asig + 
				"&motivo=" + motivo + 
				"&proyecto=" + proyecto +
				"&pieza=" + pieza;
	
		$.ajax({
			type:"POST",
			url:"php/editar_evento.php",
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

	function preguntarSiNoPiezaBrief(id){
		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
						function(){ eliminarDatosPiezaBrief(id) }
					, function(){ alertify.error('Se cancelo')});
	}

	function eliminarDatosPiezaBrief(id){

		nombreTabla="piezasBrief";
		cadena="id=" + id +
				"&nombreTabla=" + nombreTabla;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
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

	
	function actualizadatosPiezaBrief(){

		//alertify.success("Actualizado con exito");
		//alert("Actualizado con exito");
		id=$('#idu').val();
		nombre=$('#nameu').val();
		caracteristicas=$('#caracteristicasu').val();
		medidas=$('#medidasu').val();
		fechaInicio=$('#fechaIniciou').val();
		fechaSalida=$('#fechaSalidau').val();
		fechaAnterior=$('#fechaAnt_PiezaBrief').val();
		nombreTabla="piezasBrief";

		cadena= "id=" + id +
				"&nombre=" + nombre + 
				"&caracteristicas=" + caracteristicas +
				"&medidas=" + medidas +
				"&fechaInicio=" + fechaInicio + 
				"&fechaSalida=" + fechaSalida +
				"&nombreTabla=" + nombreTabla +
				"&fechaAnterior=" + fechaAnterior;
	
		//alert(cadena);
		$.ajax({
			type:"POST",
			url:"php/actualizaDatos.php",
			data:cadena,
			success:function(r){
				
				if(r==1){					
					alertify.success("Actualizado con exito");
					location.reload();
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

