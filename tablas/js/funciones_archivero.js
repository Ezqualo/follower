//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO CUENTAS



function darAlta(id,depa){
            
	cadena="id=" + id +
            "&depa=" + depa;

    //alert("darAlta=>"+cadena);
	$.ajax({
		type:"POST",
		url:"php/darAlta_personal.php",
		data:cadena,
		success:function(r){
            //console.log(r);
			if(r==1){
				alertify.success("Registro Dado de Alta con exito");
                location.reload();
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id,depa,reg){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de Eliminar definitivamente a esta persona?', 
					function(){ eliminarDatos(id,depa,reg) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id,depa,reg){
    d=reg.split('||');
    var json = JSON.stringify(d);
	cadena="id=" + id +
			"&nombre="+d[1]+
            "&depa=" + depa+
            "&reg="+json;

        alert(cadena);
        
		$.ajax({
			type:"POST",
			url:"php/eliminar_a_historial.php",
			data:cadena,
			success:function(r){
				console.log(r);
				alert(r);
				if(r==1){
					alertify.success("Eliminado con exito!");
					location.reload();
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
        
	}


