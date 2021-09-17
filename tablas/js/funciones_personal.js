//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO CUENTAS

function agregar_cuentas(nombre, puesto, correo, estatus, equipo){

	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosCuentas(){

	id=$('#idcuentas').val();
	nombre=$('#name_cuentas_u').val();
	puesto=$('#puesto_cuentas_u').val();
	correo=$('#correo_cuentas_u').val();
	estatus=$('#estatus_cuentas_u').val();
    equipo = "cuentas";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoCuentas(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosCuentas(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosCuentas(id){
    equipo = "cuentas";
	cadena="id=" + id +
            "&equipo=" + equipo;

		$.ajax({
			type:"POST",
			url:"php/baja_personal.php",
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

//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO DIRECCION


function preguntarSiNoDireccion(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosDireccion(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosDireccion(id){
    equipo = "direccion";
	cadena="id=" + id +
            "&equipo=" + equipo;

		$.ajax({
			type:"POST",
			url:"php/baja_personal.php",
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



//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO ARTE

function agregar_arte(nombre, puesto, correo, estatus, equipo){

	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosArte(){

	id=$('#idarte').val();
	nombre=$('#name_arte_u').val();
	puesto=$('#puesto_arte_u').val();
	correo=$('#correo_arte_u').val();
	estatus=$('#estatus_arte_u').val();
    equipo = "arte";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoArte(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosArte(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosArte(id){
    equipo = "arte";
	cadena="id=" + id +
            "&equipo=" + equipo;

		$.ajax({
			type:"POST",
			url:"php/baja_personal.php",
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





    //FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO ILUSTRACION

function agregar_ilustracion(nombre, puesto, correo, estatus, equipo){

	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosIlustracion(){

	id=$('#idilustracion').val();
	nombre=$('#name_ilustracion_u').val();
	puesto=$('#puesto_ilustracion_u').val();
	correo=$('#correo_ilustracion_u').val();
	estatus=$('#estatus_ilustracion_u').val();
    equipo = "ilustracion";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoIlustracion(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosIlustacion(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosIlustacion(id){
    equipo = "ilustracion";
	cadena="id=" + id +
            "&equipo=" + equipo;

		$.ajax({
			type:"POST",
			url:"php/baja_personal.php",
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


    
    //FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO copy

function agregar_copy(nombre, puesto, correo, estatus, equipo){

	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosCopy(){

	id=$('#idcopy').val();
	nombre=$('#name_copy_u').val();
	puesto=$('#puesto_copy_u').val();
	correo=$('#correo_copy_u').val();
	estatus=$('#estatus_copy_u').val();
    equipo = "copy";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoCopy(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosCopy(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosCopy(id){
    equipo = "copy";
	cadena="id=" + id +
            "&equipo=" + equipo;

		$.ajax({
			type:"POST",
			url:"php/baja_personal.php",
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



//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO Estrategia

function agregar_estrategia(nombre, puesto, correo, estatus, equipo){
	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosEstrategia(){

	id=$('#idestrategia').val();
	nombre=$('#name_estrategia_u').val();
	puesto=$('#puesto_estrategia_u').val();
	correo=$('#correo_estrategia_u').val();
	estatus=$('#estatus_estrategia_u').val();
    equipo = "estrategia";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoEstrategia(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosEstrategia(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosEstrategia(id){
    equipo = "estrategia";
	cadena="id=" + id +
            "&equipo=" + equipo;

    $.ajax({
        type:"POST",
        url:"php/baja_personal.php",
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



//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO Administracion

function agregar_administracion(nombre, puesto, correo, estatus, equipo){
	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosAdministracion(){

	id=$('#idadministracion').val();
	nombre=$('#name_administracion_u').val();
	puesto=$('#puesto_administracion_u').val();
	correo=$('#correo_administracion_u').val();
	estatus=$('#estatus_administracion_u').val();
    equipo = "administracion";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoAdministracion(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosAdministracion(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosAdministracion(id){
    equipo = "administracion";
	cadena="id=" + id +
            "&equipo=" + equipo;

    $.ajax({
        type:"POST",
        url:"php/baja_personal.php",
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







//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO POST

function agregar_post(nombre, puesto, correo, estatus, equipo){
	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosPost(){

	id=$('#idpost').val();
	nombre=$('#name_post_u').val();
	puesto=$('#puesto_post_u').val();
	correo=$('#correo_post_u').val();
	estatus=$('#estatus_post_u').val();
    equipo = "postProduccion";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoPost(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosPost(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosPost(id){
    equipo = "postProduccion";
	cadena="id=" + id +
            "&equipo=" + equipo;

    $.ajax({
        type:"POST",
        url:"php/baja_personal.php",
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





//FUNCIONES PARA AGREGAR, EDITAR Y ELIMINAR PERSONAL DEL EQUIPO programacion

function agregar_programacion(nombre, puesto, correo, estatus, equipo){
	cadena="nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/agregar_personal.php",
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

function actualizaDatosProgramacion(){

	id=$('#idprogramacion').val();
	nombre=$('#name_programacion_u').val();
	puesto=$('#puesto_programacion_u').val();
	correo=$('#correo_programacion_u').val();
	estatus=$('#estatus_programacion_u').val();
    equipo = "programacion";
            
	cadena="id=" + id +
            "&nombre=" + nombre + 
			"&puesto=" + puesto +
			"&correo=" + correo +
			"&estatus=" + estatus +
			"&equipo=" + equipo;

	$.ajax({
		type:"POST",
		url:"php/editar_personal.php",
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

function preguntarSiNoProgramacion(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de dar de Baja a esta persona?', 
					function(){ eliminarDatosProgramacion(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatosProgramacion(id){
    equipo = "programacion";
	cadena="id=" + id +
            "&equipo=" + equipo;

    $.ajax({
        type:"POST",
        url:"php/baja_personal.php",
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



