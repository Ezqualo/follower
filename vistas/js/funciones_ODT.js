

function actualizaODT(){

	var id=$('#id_edit_ODT').val();
	var fechaFinal=$('#fechaSalida_edit_ODT').val();
    var fechaAnterior=$('#fechaAnterior_ODT').val();

	var     cadena= "id=" + id +
			"&fechaF=" + fechaFinal +
            "&fechaAnt=" + fechaAnterior;
	$.ajax({
		type:"POST",
		url:"php/actualizaODT.php",
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
	
function actualizaODTPieza(){

    //alertify.success("Actualizado con exito");
    //alert("Actualizado con exito");

    var id=$('#id_edit_pieza').val();
    var id_odt=$('#id_edit_odt').val();
    var nombre=$('#name_edit_pieza').val();
    var caracteristicas=$('#caracteristicas_edit_pieza').val();
    var medidas=$('#medidas_edit_pieza').val();
    var fechaSalida=$('#fechaSalida_edit_pieza').val();
    var fechaAnterior=$('#fechaAnterior').val();

    cadena= "id=" + id +
            "&id_odt=" + id_odt +
            "&nombre=" + nombre + 
            "&caracteristicas=" + caracteristicas +
            "&medidas=" + medidas +
            "&fechaSalida=" + fechaSalida +
            "&fechaAnt=" + fechaAnterior;

    $.ajax({
        type:"POST",
        url:"php/actualizaODTPieza.php",
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

	
