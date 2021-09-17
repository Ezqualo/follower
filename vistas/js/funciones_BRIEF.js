

function actualizaBRIEF(){

	var id=$('#id_edit_BRIEF').val();
	var fechaFinal=$('#fechaSalida_edit_BRIEF').val();
    var fechaAnterior=$('#fechaAnt_BRIEF').val();

	var     cadena= "id=" + id +
			"&fechaF=" + fechaFinal +
            "&fechaAnterior=" + fechaAnterior;
	$.ajax({
		type:"POST",
		url:"php/actualizaBRIEF.php",
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
	
function actualizaBRIEFPieza(){

    //alertify.success("Actualizado con exito");
    //alert("Actualizado con exito");

    var id=$('#id_edit_BRIEFpieza').val();
    var id_brief=$('#id_edit_brief').val();
    var nombre=$('#name_edit_BRIEFpieza').val();
    var caracteristicas=$('#caracteristicas_edit_BRIEFpieza').val();
    var medidas=$('#medidas_edit_BRIEFpieza').val();
    var fechaSalida=$('#fechaSalida_edit_BRIEFpieza').val();
    var fechaAnterior=$('#fecha_anterior_piezabrief').val();

    cadena= "id=" + id +
            "&id_brief=" + id_brief +
            "&nombre=" + nombre + 
            "&caracteristicas=" + caracteristicas +
            "&medidas=" + medidas +
            "&fechaSalida=" + fechaSalida +
            "&fechaAnterior=" + fechaAnterior;

    $.ajax({
        type:"POST",
        url:"php/actualizaBRIEFPieza.php",
        data:cadena,
        success:function(r){
            
            if(r==1){					
                
                location.reload();
                alertify.success("Actualizado con exito");
                //alert("todo okey");
            }else{
                //alert("falla en sql");
                alertify.error("Fallo el servidor :(");
            }
        }
    });

}
